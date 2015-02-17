<?php

namespace HotelReservationSystem\Interfaces;

interface iReservable
{
    function addReservation($reservation);

    function removeReservation($reservation);
} 