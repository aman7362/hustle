<?php  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
    $secretKey = "6LewelUqAAAAAJSf305VBgP-Dxux7y5oWOgZSmnt";  
    $captcha = $_POST['g-recaptcha-response'];  

    // Verify the CAPTCHA  
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");  
    $responseKeys = json_decode($response, true);  

    if(intval($responseKeys["success"]) !== 1) {  
        echo "Please complete the CAPTCHA.";  
    } else {  
        echo "Thank you for your submission!";  
        // Process the form (e.g., save to database, send an email, etc.)  
    }  
} else {  
    echo "Invalid request.";  
}  
?>