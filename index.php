<html lang="en">

<head>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="./Includes/index.css" rel="stylesheet">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>

<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <div class="fadeIn first">
                <img src="./IMG/logo.jpg" id="icon" alt="User Icon" />
            </div>
            <!-- Login Form -->
            <form action="login_verwerk.php" method="POST" class="form_big">
                <input type="text" class="input fadeIn second" name="inputUsername" id="inputUsername" value=""
                    autocomplete="username" placeholder="Gebruikersnaam..."><br>
                <input type="password" class="input fadeIn third" name="inputPassword" id="inputPassword" value=""
                    autocomplete="current-password" placeholder="Wachtwoord..."><br>
                <input type="submit" class="input fadeIn fourth" id="submit" value="Login" name="submit">
            </form>
        </div>
</body>

</html>