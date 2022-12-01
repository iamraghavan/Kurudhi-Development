<?php 
require_once './vendor/swiftmailer/swiftmailer/lib/swift_required.php';
class DemoClass
{
    
    protected $db;

    function __construct()
    {
        $this->db = DB();
    }

    /**
     * register new user
     *
     * @param $username
     * @param $email
     * @param $password
     *
     * @return bool
     */
    public function Register($username, $email, $password)
    {
        $username = mysqli_real_escape_string($this->db, $username);
        $email = mysqli_real_escape_string($this->db, $email);
        $password = mysqli_real_escape_string($this->db, $password);
        $password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 11]);
        $email_activation_key = md5($email . $username);

        $query = "INSERT INTO `tbl_user`(username, email, password, email_activation_key)
                  VALUES ('$username', '$email', '$password', '$email_activation_key')";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }

        // send email
        $this->sendEmail('Verify Your Email Address', $email, $username, $email_activation_key);

        return TRUE;
    }

    /**
     * send activation email with swiftmailer
     *
     * @param $subject
     * @param $to
     * @param $name
     * @param $email_activation_key
     */
    public function sendEmail($subject, $to, $name, $email_activation_key)
    {
        $smtp_server = 'smtp.gmail.com';
        $username = 'raghavanofficials@gmail.com';
        $password = '';
        $port = '587';
        $encryption = 'TSL';
        

        // create account verification link
        $link = 'http://' . $_SERVER['SERVER_NAME'] . '/activation.php?key=' . $email_activation_key;

        // get the html email content
        $html_content = file_get_contents('email/email_verification.html');
        $html_content = preg_replace('/{link}/', $link, $html_content);

        // get plain email content
        $plain_text = file_get_contents('email/email_verification.txt');
        $plain_text = preg_replace('/{link}/', $link, $plain_text);
        
        $message = (new Swift_Message())
        ->setSubject($subject)
        ->setFrom(['noreplay@kurudhi.com' => 'Kurudhi'])
        ->setTo([$to => $name])
        ->setBody($html_content, 'text/html')// add html content
        ->addPart($plain_text, 'text/plain'); // Add plain text

        
        $transport = (new Swift_SmtpTransport('smtp.gmail.com', 587))
            ->setUsername($username)
            ->setPassword($password);

        $mailer = (new Swift_Mailer($transport));

        $mailer->send($message);

        
    }

    /**
     * check if email already exists
     *
     * @param $email
     *
     * @return bool
     */
    public function isEmail($email)
    {
        $email = mysqli_real_escape_string($this->db, $email);
        $query = "SELECT `email` FROM `tbl_user` WHERE `email` = '$email'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        if (mysqli_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


    /**
     * get user ID by using activation key
     *
     * @param $email_activation_key
     *
     * @return string
     */
    public function getUserID($email_activation_key)
    {
        $email_activation_key = mysqli_real_escape_string($this->db, $email_activation_key);
        $query = "SELECT id FROM `tbl_user` WHERE `email_activation_key` = '$email_activation_key'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        $data = '';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $row['id'];
            }
        }

        return $data;
    }

    /**
     * get user ID by using email address
     *
     * @param $email
     *
     * @return string
     */
    public function getUserIDByEmail($email)
    {
        $email = mysqli_real_escape_string($this->db, $email);
        $query = "SELECT id FROM `tbl_user` WHERE `email` = '$email'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        $data = '';
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $row['id'];
            }
        }

        return $data;
    }

    /**
     * activate account
     *
     * @param $id
     *
     * @return bool
     */
    public function activateAccount($id)
    {
        $query = "UPDATE `tbl_user` SET status = 1, email_activation_key = '' WHERE id = '$id'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }

        return TRUE;
    }

    /**
     * check is password is valid
     *
     * @param $email
     * @param $password
     *
     * @return bool
     */
    public function isValidPassword($email, $password)
    {
        $email = mysqli_real_escape_string($this->db, $email);
        $password = mysqli_real_escape_string($this->db, $password);

        if ($this->isEmail($email)) {
            $enc_password = $this->findPasswordByEmail($email);
            if (password_verify($password, $enc_password)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }

    }

    /**
     * find out password by email
     *
     * @param $email
     *
     * @return string
     */
    function findPasswordByEmail($email)
    {
        $query = "SELECT password FROM `tbl_user` WHERE `email`='$email'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        $data = '';
        if (mysqli_num_rows($result) > 0) {
            while ($r = mysqli_fetch_assoc($result)) {
                $data = $r['password'];
            }
        }

        return $data;
    }

    /**
     * checkout if account is active
     *
     * @param $email
     *
     * @return bool
     */
    public function isActive($email)
    {
        $email = mysqli_real_escape_string($this->db, $email);
        $query = "SELECT `id` FROM `tbl_user` WHERE `email` = '$email' AND status = 1";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        if (mysqli_num_rows($result) > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * get user details
     *
     * @param $id
     *
     * @return array|null
     */
    public function UserDetails($id)
    {
        $id = mysqli_real_escape_string($this->db, $id);
        $query = "SELECT `username`, `email`  FROM `tbl_user` WHERE `id` = '$id'";
        if (!$result = mysqli_query($this->db, $query)) {
            exit(mysqli_error($this->db));
        }
        $data = [];
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data = $row;
            }
        }

        return $data;
    }

}


?>