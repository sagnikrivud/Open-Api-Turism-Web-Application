<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Twilio\Rest\Client;
use App\Models\MessageLog;

function smsNotification($to, $message, $purpose = 'Otp') {
  $config = get_twilio_config(); // Define a function to retrieve Twilio config
  $twilio = new Client($config['account_sid'], $config['auth_token']);
  
  $twilio->messages->create(
      $to,
      [
          'from' => $config['twilio_number'],
          'body' => $message,
      ]
  );
  $log = new MessageLog();
  $data['receiver'] = $to;
  $data['text_message'] = $message;
  $data['purposes'] = $purpose;
  $log->insert($data);
}
