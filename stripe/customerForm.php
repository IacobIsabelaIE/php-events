<html>
<head>
    
    <title>Cumpara bilet</title>
 

</head>

<body>
<form action="checkout.php" method="post" class="form_class">
    
    <div>
        <h1>Cumpara bilet</h1>
        
        <div class="login_div">
            <input type="text" name="login_name" placeholder="Nume" class="input">
        
        </div>
        
        <div class="login_div">
            <input type="text" name="login_name" placeholder="Prenume " class="input">
        
        </div>
        
        <div class="login_div">
            <input type="text" name="login_name" placeholder="Nume eveniment" class="input">
        
        </div>

        <div class="login_div">
            <input type="text" name="login_name" placeholder="Pret eveniment" class="input">

        </div>
        
        <div class="login_div">
            <input type="email" name="login_email" placeholder="E-mail" class="input">
        
        </div>
        
        <div class="login_div">
            <input type="text" name="login_nr" placeholder="Numar de telefon" class="input">
        
        </div>
        
        <button type="submit" name="submit" class="button_login">Check out</button>
        
        
    </div>
    
    <script>
        src = "https://checkout.stripe.com/checkout.js" class = "stripe_button"
        data_key= "pk_test_51NFo0jDw3VpjhUMYyoDzH70Mmmi5p7KMLUfgaHF4xnHDz15Y3KYT74Ti9VsWmZyiKYhg7NGjLkuHQC7jq64pGa0Z00xi9QZZe8"
        data_amount = 100;
        
        
    </script>

</form>
</body>
</html>