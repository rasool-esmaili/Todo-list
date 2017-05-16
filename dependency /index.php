<?php


class Mailer
{
private $transport;

public function __construct($transport)
{
    $this->transport = $transport;}

// ...
}


class NewsletterManager
{
    private $mailer;

    public function __construct(\Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    // ...
}

