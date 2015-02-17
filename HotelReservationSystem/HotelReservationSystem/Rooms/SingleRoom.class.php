<?php

namespace HotelReservationSystem\Rooms;

use HotelReservationSystem\Room;
use HotelReservationSystem\Enums\RoomType;

class SingleRoom extends Room
{
    function __construct(
        $roomNumber,
        $price,
        $reservations = [])
    {
        parent::__construct($reservations,
            $price,
            RoomType::Standard,
            $roomNumber,
            1,
            ["TV", "air-conditioner"],
            false,
            true);
    }
}