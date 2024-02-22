<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Twilio\Rest\Client;

function sendMailer($sendTo, $subject, $content) {
  $email = \Config\Services::email();
  $email->setTo($sendTo);
  $email->setFrom('your_email@example.com', 'Your Name');
  $email->setSubject($subject);
  $email->setMessage($content);
  if ($email->send()) {
    return true;
  } else {
    return $email->printDebugger();
  }
}