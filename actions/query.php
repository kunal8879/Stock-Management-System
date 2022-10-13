<?php
session_start();
require_once '../db_connect.php';
$lab_no = $_SESSION['lab_no'];
$uname = $_SESSION['username'];

$pc_id=$_GET['pc_id'];
$pc_query=$_GET['pc_query'];
$pc_name = $_GET['pc_name'];


    use PHPMailer\PHPMailer\PHPMailer;


        $email = 'gammingworld18@gmail.com';
        $subject = 'Problem in Lab No. '.$lab_no;
        $body = $pc_query.' in Pc No. '.$pc_id.
        '<br>Pc ID:'.$pc_name;

        require_once "PHPMailer/PHPMailer.php";
        require_once "PHPMailer/SMTP.php";
        require_once "PHPMailer/Exception.php";

        $mail = new PHPMailer();

        //SMTP Settings
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPAuth = true;
        $mail->Username = "usertrial40@gmail.com";
        $mail->Password = 'iwojbyhntzextloo'; 
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl";

        //Email Settings
        $mail->isHTML(true);
        $mail->setFrom($email, $uname);
        $mail->addAddress("usertrial40@gmail.com"); 
        $mail->Subject = ("From:$uname ($subject)");
        $mail->Body = $body;

        if ($mail->send()) {
            
            header("Location: http://localhost/stock-Management-System/actions/display_lab.php?lab_no=$lab_no");
        } else {
            $status = "failed";
            $response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
        }

        exit(json_encode(array("status" => $status, "response" => $response)));

?>
