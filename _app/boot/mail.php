<?php

require __DIR__ . "./../support/PHPMailer/Exception.php";
require __DIR__ . "./../support/PHPMailer/PHPMailer.php";
require __DIR__ . "./../support/PHPMailer/POP3.php";
require __DIR__ . "./../support/PHPMailer/SMTP.php";
include_once __DIR__ . "/config.php";
include_once __DIR__ . "/helpers.php";


//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;




class Email
{

    private $PHPMailer;
    private $Data;
    private $Message;


    public function __construct()
    {
        $this->PHPMailer = new PHPMailer(true);
        $this->Data = new \stdClass;
        $this->Message = new \stdClass;

        $this->PHPMailer->isSMTP();
        $this->PHPMailer->setLanguage(CONF_MAIL_OPTION_LANG);
        $this->PHPMailer->SMTPAuth = CONF_MAIL_OPTION_AUTH;
        $this->PHPMailer->SMTPSecure = CONF_MAIL_OPTION_SECURE;
        $this->PHPMailer->CharSet = CONF_MAIL_OPTION_CHARSET;

        /**
         * Auth
         */

        $this->PHPMailer->Host = CONF_MAIL_HOST;
        $this->PHPMailer->Port = CONF_MAIL_PORT;
        $this->PHPMailer->Username = CONF_MAIL_USER;
        $this->PHPMailer->Password = CONF_MAIL_PASS;
    }

    /**
     * @param string $subject
     * @param string $body
     * @param string $recipient
     * @param string $recipientName
     * @return Email
     */
    public function bootstrap(string $subject, string $body, string $recipient, string $recipientName): Email
    {
        $this->Data->subject = $subject;
        $this->Data->body = $body;
        $this->Data->recipient_email = $recipient;
        $this->Data->recipient_name = $recipientName;
        return $this;
    }

    public function send(string $from = CONF_MAIL_SENDER['address'], string $fromName = CONF_MAIL_SENDER["name"]): bool
    {
        if (empty($this->Data)) {
            $this->Message->Error = "Erro ao enviar o e-mail para confirmação do código! Verifique os dados e tente novamente.";
            return false;
        }
        if (!is_email($this->Data->recipient_email)) {
            $this->Message->Warning = "O e-mail de destinatário não é válido";
            return false;
        }

        if (!is_email($from)) {
            $this->Message->Warning = "O e-mail de remetente não é válido";
            return false;
        }

        try {
            
            
            $this->PHPMailer->Subject = $this->Data->subject;
            $this->PHPMailer->msgHTML($this->Data->body);
            $this->PHPMailer->addAddress($this->Data->recipient_email, $this->Data->recipient_name);
            $this->PHPMailer->setFrom($from, $fromName);

            $this->PHPMailer->send();
            $this->Message->Sucess = "E-mail de confirmação enviado com sucesso!";
            return true;
        } catch (Exception $exception) {

            $this->Message->Error = $exception->getMessage();
            return false;
        }
    }

    public function getMessage()
    {
        foreach ($this->Message as $Message) {
            return $Message;
        }
    }
}


