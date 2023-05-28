<?php

namespace App\Errors;

class CustomException
{
    private $severity = 0;

    private $message = "Unknown Exception";

    private $filename = 'Unknown File';

    private $lineno = 0;

    public function __construct(int $severity, string $message, string $filename, int $lineno, )
    {
        $this->severity = $severity;
        $this->message = $message;
        $this->filename = $filename;
        $this->lineno = $lineno;

        $this->error_handler($this->severity, $this->message, $this->filename, $this->lineno, );
    }


    public function error_handler(int $severity, string $message, string $filename, int $lineno, )
    {
        //TODO: Implement error handling 
        $this->message($severity, $message, $filename, $lineno, );
    } 
   final public static function message(int $severity, string $message, string $filename, int $lineno, )
   {

       $continuum = 'Unknown if code can continue';
       switch ($severity) {
           case 0:
               $continuum = 'Unknown if code can continue';
               break;
           case 1:
               $continuum = 'Code cannot continue';
               break;
           case 2:
               $continuum = 'Code can continue width errors';
               break;
           case 3:
               $continuum = 'Code can continue width warnings';
               break;
           case 4:
               $continuum = 'Code can continue width details';
               break;
           case 5:
               $continuum = 'Code can continue normally';
               break;
           case 6:
               $continuum = 'This is not an Exception';
               break;
       }

       print_r("New Exception handled by CustomException on $filename, line $lineno with message '$message'. \n $continuum.");

   }
}

new CustomException(1, "Lady", basename($_SERVER['PHP_SELF']), __LINE__, );