<?php
include_once './admin/pdo.php';
include_once './admin/functions.php';
?>

<?php 
if (isset($_POST)) {
    login(@$_POST['user_email'], @$_POST['user_password']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>We Love Techno</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <h1 class="rounded border p-2 m-4 text-center text-white bg-primary text-uppercase">We <span class="text-warning">♥︎</span> Techno. Do <span class="text-warning">you</span> ?</h1>


    <!-- FORM -->
    <div class="container d-flex flex-column justify-content-center align-items-center mt-5">

        <h2 class="text-center mb-3">Login</h2>

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">

            <input class="input-group input-login mb-2" type="email" name="user_email" placeholder="Your email" value="admin@gmail.com" required>
            <input class="input-group input-login mb-2" type="password" name="user_password" placeholder="Your Pasword" value="admin" required>
            <input class="btn btn-primary btn-sm w-100" type="submit" name="submit" value="Login">

        </form>

        <small class="mt-2">Don't have an account yet ?</small>
        <a href="signup.php">Sign up</a>
        <div class="small-divider"></div>
        <a href="#"><small>Forgot your password ?</small></a>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>