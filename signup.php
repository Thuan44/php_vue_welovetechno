<?php
include_once './admin/pdo.php';
include_once './admin/functions.php';
?>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // if the request method used is POST
    $name = verifyInput($_POST['name']);
    $email = verifyInput($_POST['email']);
    $password = verifyInput($_POST['password']);
    $isSuccess =  true;

    if (empty($name)) {
        $nameError = "Please enter your name";
        $isSuccess = false;
    }
    if (!isEmail($email)) { // If $email is not valid
        $emailError = "The email address is invalid";
        $isSuccess = false;
    }

    signUp($name, $email, $password);
}

@$name = $_POST['name'];
@$email = $_POST['email'];
@$password = $_POST['password'];

$nameError = $emailError = $passwordError = $passwordCheckError = "";
$isSuccess = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Become a Dev</title>
    <link rel="stylesheet" href="https://bootswatch.com/4/lux/bootstrap.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <h1 class="rounded border p-2 m-4 text-center text-white bg-primary text-uppercase">We already <span class="text-warning">♥︎</span> you!</h1>

    <div class="heading">
        <h2 class="text-center mb-3 mt-5">Sign up</h2>
    </div>

    <div class="container shadow-sm rounded" style="max-width: 600px;">

        <div class="row justify-content-center border rounded p-5 mb-5">
            <div class="col-lg-10 col-lg-offset-1">
                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" id="signup-form" method="POST" role="form">

                    <div class="row">
                        <!-- Name -->
                        <div class="col-md-12">
                            <label for="name">Your name*</label>
                            <input type="text" id="name" name="name" class="form-control" value="">
                            <p class="comments text-danger"><?php echo $nameError; ?></p>
                        </div>

                        <!-- Email -->
                        <div class="col-md-12">
                            <label for="email">Email*</label>
                            <input type="text" id="email" name="email" class="form-control" value="">
                            <p class="comments text-danger"><?php echo $emailError; ?></p>
                        </div>

                        <!-- Address -->
                        <div class="col-md-12">
                            <label for="email">Address</label>
                            <input type="text" id="address" name="address" class="form-control" value="">
                            <p class="comments text-danger"><?php echo $addressError; ?></p>
                        </div>

                        <!-- Password-->
                        <div class="col-md-12">
                            <label for="password">Choose a password*</label>
                            <input type="password" id="password" name="password" class="form-control" value="">
                            <p class="comments"><?php echo $passwordError; ?></p>
                        </div>

                        <!-- Required info -->
                        <div class="col-md-12">
                            <p class="font-italic">*These fields are required</p>
                        </div>

                        <!-- Submit -->
                        <div class="col-md-12">
                            <input type="submit" class="btn btn-primary p-2 w-100" value="Create account">
                        </div>


                    </div>

                </form>

                <a href="login.php" class="text-center d-block" style="color: #979797"><small>Back to login</small></a>

            </div>
        </div>

    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"></script>
</body>

</html>