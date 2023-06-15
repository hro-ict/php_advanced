<?php

namespace Mail_namespace;

interface Mail_interface
{
    public function send_mail($to,$subject, $msg);
}

class Mail implements Mail_interface
{
    public function send_mail($to,$subject, $msg)
    {
        mail($to, $subject, $msg);
    }
}

?>
