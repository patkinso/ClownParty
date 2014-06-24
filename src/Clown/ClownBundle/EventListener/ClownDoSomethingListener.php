<?php

namespace Clown\ClownBundle\EventListener;

 use Doctrine\ORM\Event\LifecycleEventArgs;
 use Clown\ClownBundle\Entity\Clown;
 use Monolog\Logger;
// use Symfony\Component\HttpFoundation\Response;
// use Symfony\Component\HttpKernel\View\HttpViewInterface;

class ClownDoSomethingListener
{

    private $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public function postPersist(LifecycleEventArgs $args)
    {

        $this->logger->info('Your crappy listener went off!');

        // // You get the exception object from the received event
        // $exception = $event->getException();
        // $message = sprintf(
        //     'My Error says: %s with code: %s also: butts',
        //     $exception->getMessage(),
        //     $exception->getCode()
        // );

        // // Customize your response object to display the exception details
        // $response = new Response();
        // $response->setContent($message);

        // // HttpExceptionInterface is a special type of exception that
        // // holds status code and header details
        // if ($exception instanceof HttpExceptionInterface) {
        //     $response->setStatusCode($exception->getStatusCode());
        //     $response->headers->replace($exception->getHeaders());
        // } else {
        //     $response->setStatusCode(500);
        // }

        // // Send the modified response object to the event
        // $event->setResponse($response);
    }
}

