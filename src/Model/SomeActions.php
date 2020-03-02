<?php

namespace App\Model;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class SomeActions
{
    private $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function doSomething()
    {
        echo 'doSomething';
    }

    public function sendEmail()
    {
        echo 'sendEmail';

        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            ->subject('Time for Symfony Mailer!')
            ->text('Sending emails is fun again!')
            ->html('<p>See Twig integration for better HTML integration!</p>');
        $this->mailer->send($email);
    }

}
