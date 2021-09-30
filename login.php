<?php

require('config.php');
require_once(TEMPLATES . '/header.php');

session_start();

if (isset($_POST['username'])) {
    // removes backslashes
    $username = stripslashes($_REQUEST['username']);
    $password = stripslashes($_REQUEST['password']);
    //escapes special characters in a string
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    //Checking is user existing in the database or not
    $query = "SELECT * FROM `user` WHERE user_name='$username' and user_password='" . md5($password) . "'";
    $result = mysqli_query($conn, $query);

    $rows = mysqli_num_rows($result);
    $row = $result->fetch_assoc();
    if ($rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['clubid'] = $row['club_id'];
        // Redirect user to index.php
        header("Location: index.php");
    } else {
?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Błąd logowania, spróbuj ponownie! </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
<?php
    }
}

?>

<div class="login-header box-shadow">
    <div class="container-fluid d-flex justify-content-between align-items-center">
        <div class="brand-logo">
            <a href="login.php">
                <img src="src/images/dziod2.png" alt="">
            </a>
        </div>
    </div>
</div>
<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-lg-7">
                <img src="vendors/images/login-page-img.png" alt="">
            </div>
            <div class="col-md-6 col-lg-5">
                <div class="login-box bg-white box-shadow border-radius-10">
                    <div class="login-title">
                        <h2 class="text-center text-primary">Zaloguj się do swojego klubu!</h2>
                    </div>
                    <form action="" method="POST" name="login">
                        <div class="input-group custom">
                            <input type="text" class="form-control form-control-lg" name="username" placeholder="Nazwa użytkownika">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                            </div>
                        </div>
                        <div class="input-group custom">
                            <input type="password" class="form-control form-control-lg" name="password" placeholder="**********">
                            <div class="input-group-append custom">
                                <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                            </div>
                        </div>
                        <!-- <div class="row pb-30">
                            <div class="col-6">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label" for="customCheck1">Pamiętaj</label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="forgot-password"><a href="forgot-password.html">Zapomniałeś hasła?</a></div>
                            </div>
                        </div> -->
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="input-group mb-0">


                                    <input class="btn btn-primary btn-lg btn-block" type="submit" value="Zaloguj się">

                                    <!-- <a class="btn btn-primary btn-lg btn-block" href="index.html">Zaloguj się</a> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once(TEMPLATES . '/footer.php'); ?>