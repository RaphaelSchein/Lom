<?php

use Ytake\Lom\Access;
use Ytake\Lom\Meta\AllArgsConstructor;

/**
 * Class DataAnnotation
 * @AllArgsConstructor(access=Access::LEVEL_PUBLIC)
 */
class AllArgsConstructorAnnotation
{
    /** @var string $message */
    protected $message;
    
    /**
     *
     */
    public function __construct($message)
    {
        $this->message = $message;
    }
}