<?php

require_once __DIR__ . '/vendor/autoload.php';

if (isset($_REQUEST["action"])) {

    $bookingsController = new \controllers\BookingsController();

    if ("import" === $_REQUEST["action"]) {
        $bookingsController->importBookings();

        echo include("src/views/homeview.php");
    }

    if ("search" === $_REQUEST["action"]) {
        $employeeName = htmlspecialchars($_REQUEST['employeeName']);
        $eventName = htmlspecialchars($_REQUEST['eventName']);
        $eventDate = htmlspecialchars($_REQUEST['eventDate']);

        $bookings = $bookingsController->searchBookings($employeeName, $eventName, $eventDate);
        $totalParticipationFees = $bookingsController->sumParticipationFees($bookings);
        echo include("src/views/homeview.php");
    }
}