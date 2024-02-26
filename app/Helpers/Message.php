<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Twilio\Rest\Client;

function smsNotification($to, $message) {
  $config = get_twilio_config(); // Define a function to retrieve Twilio config
  $twilio = new Client($config['account_sid'], $config['auth_token']);
  
  $twilio->messages->create(
      $to,
      [
          'from' => $config['twilio_number'],
          'body' => $message,
      ]
  );
}
