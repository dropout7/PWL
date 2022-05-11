<?php
session_start();

if (!empty($_SESSION['username'])) {
    header('location:index.php');
} else {
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign in</title>
</head>

<body>
    <div class="box">
        <br>
        <div>
            <h3>LOGIN</h3>

        </div>
        <form action="pros_login.php" method="post">
            <div class="group">
                <label>Username</label>
                <input name="username" id="username" type="text" minlength="3" required>
                <span class="highlight"></span>
                <span class="bar"></span>
            </div>
            <div class="group">
                <label>Password</label>
                <input name="password" id="username" type="password" minlength="4" required>
                <span class="highlight"></span>
                <span class="bar"></span>

            </div>
            <button id="buttonlogintoregister" class="login" type="submit" name="login"><b>Login</b></button>
        </form>
        <div id="footer-box">
            <p class="footer-text"><img src="" width="200"> &copy; <a target=" _blank">M Bagus S</a> <a style="" target="_blank">PWL</a></p>
        </div>
    </div>
</body>

</html>