<?php 
if($_POST["message"]){
    
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = array('secret' => '6Ld3BlMUAAAAAMGxeLnYSbt9_lzjadk2K3Y5yUzI', 'response' => $_POST["g-recaptcha-response"]);
    $options = array(
            'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        )
    );
    $context  = stream_context_create($options);
    $result = file_get_contents($url, false, $context);
    if($result['success']){
        var_dump($result);

        $to      = 'sebastien.diaz@gmail.com';
        $subject = '[Buisson Diaz Conseil] ';
        $message = $_POST["message"].' '.$_POST["email"]." ECHO ".var_dump($result);
        $headers = 'From: webmaster@buissondiaz.com' . "\r\n" .
            'Reply-To: webmaster@buissondiaz.com' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();
        $ret = mail($to, $subject, $message, $headers);
        $ret2 = mail('contact@buissondiaz.com', $subject, $message, $headers);
        echo 'Thanks for your message.';
        if (!$ret) {
            print_r(error_get_last());
        }
        if (!$ret2) {
            print_r(error_get_last());
        }
    }else {
        echo 'There is a captcha error. Please retry your message and regenerate a new one.';
    }
} else {
    echo 'Your message is empty';
}





//
?> 
