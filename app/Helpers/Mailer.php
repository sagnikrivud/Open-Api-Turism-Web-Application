<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function sendMailer($sendTo, $subject, $content) {
  $email = \Config\Services::email();
  $email->setTo($sendTo);
  $email->setFrom(env('MAIL_FROM'), env('MAIL_NAME'));
  $email->setSubject($subject);
  $email->setMessage($content);
  if ($email->send()) {
    return true;
  } else {
    return $email->printDebugger();
  }
}
