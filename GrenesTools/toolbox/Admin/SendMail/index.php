<?php
$mailer = new SendMail();

$mailer->add_recipient("","support@sostrenegrene.com");
//$mailer->add_recipient("Support","soren.pedersen@sostrenegrene.com");
$mailer->message("Toolbox","Toolbox_Report this is a test mail from toolbox");
$mailer->send();
?>