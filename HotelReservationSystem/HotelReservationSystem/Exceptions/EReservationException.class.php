<?php
namespace HotelReservationSystem\Exceptions;

class EReservationException extends \Exception
{
    function __construct($message, $code = null)
    {
        parent::__construct($message, $code);
    }
}