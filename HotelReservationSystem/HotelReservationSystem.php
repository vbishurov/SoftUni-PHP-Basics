<?php
date_default_timezone_set('America/Los_Angeles');
function __autoload($className)
{
    $path = "/$className" . ".class.php";
    require_once($path);
}
use HotelReservationSystem\Guest;
use HotelReservationSystem\Rooms\SingleRoom;
use HotelReservationSystem\Reservation;
use HotelReservationSystem\Logic\BookingManager;
use HotelReservationSystem\Rooms\Apartment;
use HotelReservationSystem\Rooms\Bedroom;

$room = new SingleRoom(1408, 99);
$guest = new Guest("Svetlin", "Nakov", 8003224277);
$startDate = strtotime("24.10.2014");
$endDate = strtotime("26.10.2014");
$reservation = new Reservation($startDate, $endDate, $guest);
BookingManager::bookRoom($room, $reservation);

$room1 = new SingleRoom(rand(0, 300), rand(0, 300));
$room2 = new Bedroom(rand(0, 300), rand(0, 550));
$room3 = new Apartment(rand(0, 300), rand(0, 1000));
$room4 = new SingleRoom(rand(0, 300), rand(0, 300));
$room5 = new Bedroom(rand(0, 300), rand(0, 550));
$room6 = new Apartment(rand(0, 300), rand(0, 1000));
$room7 = new SingleRoom(rand(0, 300), rand(0, 300));
$room8 = new Bedroom(rand(0, 300), rand(0, 550));
$room9 = new Apartment(rand(0, 300), rand(0, 1000));

$guest1 = new Guest("Pesho", "Peshev", rand(1000000000, 9999999999));
$startDate1 = strtotime("17.10.2014");
$endDate1 = strtotime("18.10.2014");
$reservation1 = new Reservation($startDate1, $endDate1, $guest1);

$guest2 = new Guest("Ivan", "Pavlov", rand(1000000000, 9999999999));
$startDate2 = strtotime("17.10.2014");
$endDate2 = strtotime("19.10.2014");
$reservation2 = new Reservation($startDate2, $endDate2, $guest2);

$guest3 = new Guest("Georgi", "Iliev", rand(1000000000, 9999999999));
$startDate3 = strtotime("18.10.2014");
$endDate3 = strtotime("19.10.2014");
$reservation3 = new Reservation($startDate3, $endDate3, $guest3);

$guest4 = new Guest("Gancho", "Draganov", rand(1000000000, 9999999999));
$startDate4 = strtotime("24.10.2014");
$endDate4 = strtotime("26.10.2014");
$reservation4 = new Reservation($startDate4, $endDate4, $guest4);

BookingManager::bookRoom($room1, $reservation1);
BookingManager::bookRoom($room1, $reservation4);
BookingManager::bookRoom($room2, $reservation2);
BookingManager::bookRoom($room3, $reservation3);
BookingManager::bookRoom($room5, $reservation4);
BookingManager::bookRoom($room8, $reservation2);

//BookingManager::bookRoom($room1,$reservation2);

$arr = [$room1, $room2, $room3, $room4, $room5, $room6, $room7, $room8, $room9];

echo "<br>\r\n<strong>Rooms with price less than or equal to 250:</strong><br>\r\n<br>\r\n";
array_filter($arr, function ($r) {
    if ($r->getPrice() <= 250) {
        echo $r . "<br>\r\n\r\n<br>\r\n\r\n";
    }
});

echo "<br>\r\n<strong>Rooms with balcony:</strong><br>\r\n<br>\r\n";
array_filter($arr, function ($r) {
    if ($r->getHasBalcony()) {
        echo $r . "<br>\r\n\r\n<br>\r\n\r\n";
    }
});

echo "<br>\r\n<strong>Room numbers of rooms with bathtub:</strong><br>\r\n<br>\r\n";
array_filter($arr, function ($r) {
    if (in_array("bathtub",$r->getExtras())) {
        echo $r . "<br>\r\n\r\n<br>\r\n\r\n";
        return $r->getRoomNumber();
    }
});