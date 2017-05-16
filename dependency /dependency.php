<?php

use Symfony\Component\DependencyInjection\ContainerBuilder;

$container = new ContainerBuilder();
$container
        ->register('mailer', 'Mailer')
        ->addArgument('%mailer.transport%');
$container
    ->register('newsletter_manager', 'NewsletterManager')
    ->addArgument(new Reference('mailer'));
