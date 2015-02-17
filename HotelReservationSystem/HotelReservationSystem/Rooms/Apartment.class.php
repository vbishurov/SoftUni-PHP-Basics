<?php
namespace HotelReservationSystem\Rooms;

use HotelReservationSystem\Room;
use HotelReservationSystem\Enums\RoomType;

class Apartment extends Room
{
    function __construct(
        $roomNumber,
        $price,
        $reservations = [])
    {
        parent::__construct(
            $reservations,
            $price,
            RoomType::Diamond,
            $roomNumber,
            4,
            ["TV", "air-conditioner", "refrigerator", "mini-bar", "bathtub", "kitchen box", "free Wi-Fi"],
            true,
            true);
    }
} 