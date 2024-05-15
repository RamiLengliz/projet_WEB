<?php

require_once 'connect.php';

// for sending mails
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

class absenceCon
{

    private $tab_name;

    public function __construct($tab_name)
    {
        $this->tab_name = $tab_name;
    }

    public function getAbsence($id)
    {
        $sql = "SELECT * FROM $this->tab_name WHERE id = $id";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->execute();
            $voyage = $query->fetch();
            return $voyage;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    public function listAbsences()
    {
        $sql = "SELECT * FROM $this->tab_name";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function listAbsencesById($id)
    {
        $sql = "SELECT * FROM $this->tab_name WHERE $id = id_student";

        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addAbsence($absence)
    {
        $sql = "INSERT INTO $this->tab_name(name, id_student, date_hour, id_teacher) VALUES (:name, :id_student, :date_hour, :id_teacher)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(
                [
                    'name' => $absence->getName(),
                    'id_student' => $absence->getIdStudent(),
                    'date_hour' => $absence->getDateHour(),
                    'id_teacher' => $absence->getIdTeacher(),
                ]
            );
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateAbsence($absence, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare("UPDATE $this->tab_name SET name = :name, id_student = :id_student, date_hour = :date_hour, id_teacher = :id_teacher WHERE id = :id");
            $query->execute([
                'id' => $id,
                'name' => $absence->getName(),
                'id_student' => $absence->getIdStudent(),
                'date_hour' => $absence->getDateHour(),
                'id_teacher' => $absence->getIdTeacher()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
            echo ($e);
        }
    }

    function deleteAbsence($id)
    {
        $sql = "DELETE FROM $this->tab_name WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function getBilletExist($id)
    {
        $sql = "SELECT * FROM billet WHERE id_abs = :id_abs";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_abs', $id);
            $query->execute();
            $voyage = $query->fetch();

            // Check if $voyage has any data
            if ($voyage) {
                return true; // Return true if record exists
            } else {
                return false; // Return false if record does not exist
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function generateAbs($abs_var)
    {

        #$reservationC = new reservationCon("reservation");

        echo '<div class="row">';

        foreach ($abs_var as $abs) {



            $billet_ex = $this->getBilletExist($abs['id']);

            echo '<div class="col-lg-4 col-md-6">';
            echo '<div class="category-box">';
            echo '<div class="category-title">';
            echo '<div class="category-img">';
            //echo '<img src="' . $event['image'] . '" alt="">';
            echo '<img src="" alt="">';
            echo '</div>';
            echo '<h5>' . $abs['name'] . '</h5>';
            //echo '<h7 style="color: #ac3973;">&nbsp; ' . $abs['id_student'] . '</h7>';
            echo '<h7>&nbsp;&nbsp;' . $abs['date_hour'] . '</h7>';
            echo '</div>';
            echo '<div class="cat-count">';
            if ($billet_ex) {
                echo '<span></span>';
            }
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }

        echo '</div>';
    }

    public function send_absence_email($email, $name, $date)
    {
        $Username =  'cashogo.tn@gmail.com';
        $Password = 'sznc taqr oqzc lpjk';
        $mail_sender = new MailSender($Username, $Password);

        $email_to_send_to = $email;

        $subject = "$name is abscent";
        $msg = "The student with the following name $name is marked absent at $date.";

        $mail_send_res = $mail_sender->send_normal_mail($email_to_send_to, $subject, $msg);

        if ($mail_send_res == "mail sent") {

            header('loacation: ../View/absence/index.php');
        } else {
            return "error : " . $mail_send_res;
        }
    }

    public function get_email_by_user_id($id)
    {

        $db = config::getConnexion();

        $sql = "SELECT * FROM user WHERE id = :id";
        try {
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($result) {
                return $result['email'];
            } else {
                return "error";
            }
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}

class MailSender
{
    private $user_name, $password, $email_to_send_to, $subject, $msg;

    public function __construct($user_name, $password)
    {
        $this->user_name = $user_name;
        $this->password = $password;
    }

    public function set_user_name($val)
    {
        $this->user_name = $val;
    }

    public function get_user_name()
    {
        return $this->user_name;
    }

    public function set_password($val)
    {
        $this->password = $val;
    }

    public function get_password()
    {
        return $this->password;
    }

    public function set_email_to_send_to($val)
    {
        $this->email_to_send_to = $val;
    }

    public function get_email_to_send_to()
    {
        return $this->email_to_send_to;
    }

    public function set_subject($val)
    {
        $this->subject = $val;
    }

    public function get_subject()
    {
        return $this->subject;
    }

    public function set_msg($val)
    {
        $this->msg = $val;
    }

    public function get_msg()
    {
        return $this->msg;
    }

    public function generatePasswordResetMessage($recipientName, $resetCode, $appName)
    {
        $passwordResetMessage = "Dear $recipientName,\n\n" .
            "You've requested to reset your password for your $appName account. Please use the following code to reset your password:\n\n" .
            "Password Reset Code: $resetCode\n\n" .
            "If you didn't request this reset, please ignore this message.\n\n" .
            "Thank you,\nThe $appName Team";


        return $passwordResetMessage;
    }

    public function generatePasswordResetMessage0($recipientName, $resetCode, $appName)
    {

        // Read HTML content from file
        $htmlContent = file_get_contents(__DIR__ . '/email_template.html');

        // Replace placeholders with actual values
        $htmlContent = str_replace('{recipientName}', $recipientName, $htmlContent);
        $htmlContent = str_replace('{appName}', $appName, $htmlContent);
        $htmlContent = str_replace('{resetCode}', $resetCode, $htmlContent);

        echo "dff : " . __DIR__ . " ff";

        return $htmlContent;
    }

    public function generateAccountVerifyMessage($recipientName, $verificationCode, $appName)
    {
        $verificationMessage = "Dear $recipientName,\n\n" .
            "Thank you for signing up with $appName. To verify your account, please use the following verification code:\n\n" .
            "Verification Code: $verificationCode\n\n" .
            "If you didn't sign up for $appName, please disregard this message.\n\n" .
            "Thank you,\nThe $appName Team";

        return $verificationMessage;
    }

    public function send_normal_mail($email_to_send_to, $email_subject, $email_msg)
    {

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username =  $this->get_user_name(); # 'cashogo.tn@gmail.com';
            $mail->Password = $this->get_password(); # 'sznc taqr oqzc lpjk';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom($mail->Username);

            $mail->addAddress($email_to_send_to);

            $mail->isHTML(true);
            $mail->Subject = $email_subject;
            $mail->Body    = $email_msg;

            $mail->send();
            #echo 'Message has been sent';
            return "mail sent";
        } catch (Exception $e) {
            #echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return "$mail->ErrorInfo";
        }
    }

    
}

?>