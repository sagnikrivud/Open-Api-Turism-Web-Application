<?php

namespace App\Commands;
use CodeIgniter\CLI\BaseCommand;
helper('mailer');

class Setup extends BaseCommand {
    protected $group       = 'check';
    protected $name        = 'setup';
    protected $description = 'Check setup process';

    public function run(array $params)
    {
        $sendTo  = 'developersagnikd@gmail.com';
        $subject = 'New deployment';
        $content = 'Application new deploy by'.env('MAIL_FROM');
        sendMailer($sendTo, $subject, $content);
        $this->showMessage();
    }

    private function showMessage()
    {
      echo 'Setup completed successfully!';
    }
}