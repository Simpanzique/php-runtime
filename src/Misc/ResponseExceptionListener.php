<?php

namespace App\Misc;

use App\Misc\RedirectResponseException;
use App\Misc\ResponseException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;

class ResponseExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();
        if ($exception instanceof ResponseException) {
            $event->setResponse($exception->getResponse());
        }
    }
}