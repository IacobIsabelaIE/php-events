<?php
    
    use stripe\Charge;
    
    include("config.php");
    
    $token = $_POST["stripeToken"];
    $contact_name = $_POST["c_name"];
    $token_card_type = $_POST["stripeTokenType"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $amount = $_POST["amount"];
    $desc = $_POST["product_name"];
    
    $charge = Charge::create([
        'amount' => str_replace(",", "", $amount),
        'description' => $desc,
        'currency' => 'lei',
        'source' => $token,
    ]);
    
    if($charge){
        header("Location: success.php?amount=$amount");
    }

    
