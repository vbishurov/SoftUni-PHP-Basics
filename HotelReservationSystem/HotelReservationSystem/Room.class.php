<?php

namespace HotelReservationSystem;

use HotelReservationSystem\Interfaces\iReservable;

abstract class Room implements iReservable
{
    private $reservations;
    private $roomType;
    private $hasRestroom;
    private $hasBalcony;
    private $bedCount;
    private $roomNumber;
    private $extras;
    private $price;

    function __construct(
        $reservations,
        $price,
        $roomType,
        $roomNumber,
        $bedCount,
        $extras = [],
        $hasBalcony = false,
        $hasRestroom = false)
    {
        $this->setReservations($reservations);
        $this->setBedCount($bedCount);
        $this->setExtras($extras);
        $this->setHasBalcony($hasBalcony);
        $this->setHasRestroom($hasRestroom);
        $this->setPrice($price);
        $this->setRoomType($roomType);
        $this->setRoomNumber($roomNumber);
    }

    private function setReservations($reservations)
    {
        $this->reservations = $reservations;
    }

    function addReservation($reservation)
    {
        $arr = $this->getReservations();
        $arr[] = $reservation;
        $this->setReservations($arr);
    }

    public function getReservations()
    {
        return $this->reservations;
    }

    function removeReservation($reservation)
    {
        $this->setReservations(array_diff($this->getReservations(), array($reservation)));
    }

    function __toString()
    {
        $roomStr =
            "<strong>Room:</strong> " . $this->getRoomNumber() . "<br>\r\n" .
            " <strong>type:</strong> " . $this->getRoomType() . "<br>\r\n" .
            " <strong>Beds:</strong> " . $this->getBedCount() . "<br>\r\n" .
            " <strong>has balcony:</strong> " . ($this->getHasBalcony() ? "yes" : "no") . "<br>\r\n" .
            " <strong>has restroom:</strong>  " . ($this->getHasRestroom() ? "yes" : "no") . "<br>\r\n" .
            " <strong>extras:</strong> " . implode(', ', $this->getExtras()) . "<br>\r\n" .
            " <strong>Price:</strong> " . $this->getPrice() . "<br>\r\n" .
            "<strong>Reservations:</strong> " . implode(', ', $this->getReservations());

        return $roomStr;
    }

    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;
    }

    public function getRoomType()
    {
        return $this->roomType;
    }

    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;
    }

    public function getBedCount()
    {
        return $this->bedCount;
    }

    public function setBedCount($bedCount)
    {
        $this->bedCount = $bedCount;
    }

    public function getHasBalcony()
    {
        return $this->hasBalcony;
    }

    public function setHasBalcony($hasBalcony)
    {
        $this->hasBalcony = $hasBalcony;
    }

    public function getHasRestroom()
    {
        return $this->hasRestroom;
    }

    public function setHasRestroom($hasRestroom)
    {
        $this->hasRestroom = $hasRestroom;
    }

    public function getExtras()
    {
        return $this->extras;
    }

    public function setExtras($extras)
    {
        $this->extras = $extras;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}