<html>
<head>
    
    <title>TEST</title>
<!--    <link rel="stylesheet" href="css/login.css">-->

</head>

<body>
<form action="login.php" method="post" class="form_class">

    <div>
        <h1>LOGIN</h1>

        <div class="login_div">
            <input type="text" name="login_name" placeholder="Nume utilizator" class="input">

        </div>

        <div class="login_div">
            <input type="email" name="login_email" placeholder="E-mail" class="input">

        </div>

        <div class="login_div">
            <input type="password" name="login_passwd" placeholder="Parola" class="input">

        </div>

        <button type="submit" name="submit" class="button_login">LOGIN</button>

        <div class="login_div">
                        <a href="index.php"> Create an account</a> <br>

        </div>
    </div>

</form>
</body>
</html>