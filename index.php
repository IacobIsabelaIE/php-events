<?php
    session_start();
?>
<html>
<head>
    <title>Title</title>
    <!--    <link rel="stylesheet" href="css/sign-up.css">-->
</head>
<body>

<form action="signup.php" method="post" class="form_class" novalidate>

    <div>
        <h1>Sign up!</h1>
        <div class="login_div">
            <input type="text" name="nutilizator" placeholder="Nume utilizator">
        </div>

        <div class="login_div">
            <input type="text" name="nume" placeholder="Nume">
        </div>

        <div class="login_div">
            <input type="text" name="prenume" placeholder="Prenume">
        </div>

        <div class="login_div">
            <input type="email" name="email" placeholder="E-mail">
        </div>

        <div class="login_div">
            <input type="password" name="passwd" placeholder="Parola">

        </div>


    </div>

    <div>
        <button type="submit" name="submit" class="button_login"> Sign up</button>
    </div>

    <div class="login_div">
        <a href="indexLogin.php"> Already have an account? </a>
    </div>
</form>


</body>


</html>



