<?php
session_start();

?>

<?php 

# LOGIN ================
function login($userEmail, $userPassword) {
    global $connection; 

    $query = "SELECT * FROM users WHERE user_email = '$userEmail' AND user_password = '$userPassword' LIMIT 1";
    $result = $connection->prepare($query);
    $result->execute();
    $data = $result->fetch();

    if($data) {
        $_SESSION['user_name'] = $data['user_name']; 
        $_SESSION['user_email'] = $data['user_email']; 
        $_SESSION['user_password'] = $data['user_password']; 
        $_SESSION['user_role'] = $data['user_role']; 
        $_SESSION['user_id'] = $data['user_id']; 

        // Admin
        if($_SESSION['user_role'] == 5) {
            header ('Location: admin/index.php');
        }
        // Visitor
        if($_SESSION['user_role'] == 1) {
            header ('Location: index.php');
        }
    } else {
        session_destroy();
    }
}

// Form security 
function isEmail($var) {
    return filter_var($var, FILTER_VALIDATE_EMAIL); // Check if email is valid, returns a boolean
}

function verifyInput($var) {
    $var = trim($var); // Remove white spaces and line breaks
    $var = stripslashes($var); // Remove backslashes
    $var = htmlspecialchars($var);
    return $var;
}

// Create account
function signUp($userName, $userEmail, $userPassword) {
    global $connection;
    
    $query = "INSERT INTO users (user_name, user_email, user_password) VALUES (:userName, :userEmail, :userPassword)";
    $result = $connection->prepare($query);
    $result->execute(array( 
        ':userName' => $userName,
        ':userEmail' => $userEmail,
        ':userPassword' => $userPassword
    ));
}