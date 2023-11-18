<?php
    
    require_once "stripe-php-master/init.php";
    
    $stripedetails = array(
        "publishabelkey" => "pk_test_51NFo0jDw3VpjhUMYyoDzH70Mmmi5p7KMLUfgaHF4xnHDz15Y3KYT74Ti9VsWmZyiKYhg7NGjLkuHQC7jq64pGa0Z00xi9QZZe8",
        "secretkey" => "sk_test_51NFo0jDw3VpjhUMYZdgxSWKlfLjqaZLbPHIsBIT3llmcQunCd2oQ9bILgr9TcVxEasfztAvhxYrC8bhL0ZjU2gLt00rb3EwF4r"
    );

    \Stripe\Stripe::setApiKey($stripedetails["secretkey"]);