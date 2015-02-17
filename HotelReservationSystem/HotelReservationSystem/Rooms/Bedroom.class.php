<?php
namespace HotelReservationSystem\Rooms;

use HotelReservationSystem\Room;
use HotelReservationSystem\Enums\RoomType;

class Bedroom extends Room
{
    function __construct(
        $roomNumber,
        $price,
        $reservations = [])
    {
        parent::__construct($reservations,
            $price,
            RoomType::Gold,
            $roomNumber,
            2,
            ["TV", "air-conditioner", "refrigerator", "mini-bar", "bathtub"],
            true,
            true);
    }
} 