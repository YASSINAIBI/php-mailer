<script src='https://cdn.jsdelivr.net/npm/sweetalert2@9'></script>

<?php
include_once 'database/db.php';
$db_handle = new DBController();
?>

<?php
// Include require phpmailer files;
    require 'phpMailer/Exception.php';
    require 'phpMailer/PHPMailer.php';
    require 'phpMailer/SMTP.php';
// Define name space;
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
     
?>
<?php

if(isset($_POST['make_order'])) {
    $errors = [];

    $first_name = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
    $last_name = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
    $phone_number = filter_var($_POST['phone_number'], FILTER_SANITIZE_NUMBER_FLOAT);
    $place = filter_var($_POST['place'], FILTER_SANITIZE_STRING);
    
    if(!filter_var($_POST['first_name'], FILTER_SANITIZE_STRING)) {
        array_push($errors, "invalid firstname");
    }
    if(!filter_var($_POST['last_name'], FILTER_SANITIZE_STRING)) {
        array_push($errors, "invalid lastname");
    }
    if(!filter_var($_POST['phone_number'], FILTER_SANITIZE_NUMBER_FLOAT)) {
        array_push($errors, "invalid phone_number");
    }
    if(!filter_var($_POST['place'], FILTER_SANITIZE_STRING)) {
        array_push($errors, "invalid place");
    }

    if (preg_match('/[A-Za-z]/', $_POST['phone_number'])) {
        array_push($errors, "invalid phone_number");
    }

    if(empty($errors)) {
        $sql = $db_handle->user_command($first_name, $last_name, $phone_number, $place);

    if($sql) {

    // Create instance of phpmailer
        $mail = new PHPMailer();
    // Set mailer to  use smtp
        $mail->isSMTP();
    // define smtp host
        $mail->Host = "smtp.gmail.com";
    // enable smtp authentication
        $mail->SMTPAuth = "true";
    // set type of encryption (ssl/tls)
        $mail->SMTPSecure = "ssl";
    // set port to connect stmp
        $mail->Port = "465";
    // set gmail user name
        $mail->Username = "aibiyassin8@gmail.com";
    // set gmail password
        $mail->Password = "mot de pass";
    // set email subject
        $mail->Subject = "fast food commmad: ". $first_name . " " . $last_name;
    // Set sender email
        $mail->setFrom("aibiyassin8@gmail.com");
    // enable HTML
        $mail->isHTML(true);
    // Attachement
        // $mail->addAttachment('');
    // Email body
        $mail->Body = "<h1 style='color:green'>Commande detail</h1> <br> <h2>firstName: $first_name</h2> <br> <h2>last_name: $last_name</h2> <br> <h2>phone_number: $phone_number</h2> <br> <h2>place: $place</h2>";
    // add recipient
        $mail->addAddress("aibiyassin8@gmail.com");
    // Finally Send email
        if($mail->send()) {
            echo "<html>
            <body>
                <meta http-equiv='REFRESH'>
                <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'success',
                    title: 'your order are succesfully send',
                    showConfirmButton: false,
                    timer: 3000
                  })
                </script>
            </body>
            </html>";
        }
        else {
            echo "<html>
            <body>
                <meta http-equiv='REFRESH'>
                <script>
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'system error',
                    showConfirmButton: false,
                    timer: 3000
                  })
                </script>
            </body>
            </html>";
        }
    // Closing smpt connection
        $mail->smtpClose();

    }
}
}