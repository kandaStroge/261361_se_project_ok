<!DOCTYPE html>
<html lang="en">
<html>
<header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>OK System</title>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/signin.css" rel="stylesheet">
    <style>
        @import url(http://fonts.googleapis.com/css?family=Roboto);
        body {
            background: url("img/login_blur.png");
        }
    </style>
</heder>

<body class="text-center">
    <div class="contianer alert-light form-signin">
        <form action="checkLogin.php" method="post">
            <p class="mt-5 mb-3 text-muted"></p>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="text" value="580610001" id="sid" name="user" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword"  class="sr-only">Password</label>
            <input type="password" value="ggez" id="pass" name="pass" class="form-control" placeholder="Password" required>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <a href="https://mango.cpe.eng.cmu.ac.th/login/index.php" class="btn btn-sm btn-success btn-block">Sign in with moodle</a>
            <p class="mt-5 mb-3 text-muted"></p>
        </form>
    </div>
</body>
</html>