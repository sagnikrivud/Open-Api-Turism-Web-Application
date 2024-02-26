<?php
defined('BASEPATH') OR exit('No direct script access allowed');

function generateOtpNumber()
{
  return rand(100000, 999999);
}
