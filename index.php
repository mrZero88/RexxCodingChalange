<?php
require_once __DIR__ . "/vendor/autoload.php";
ini_set('session.save_path', realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/domains/account/session'));
session_start();

use controllers\BookingsController;

if (isset($_SERVER['PATH_INFO'])) {

    $route = $_SERVER['PATH_INFO'];

    $bookingsController = new BookingsController();

    if ("/import" === $route) {
        $bookingsController->importBookings();
    }

    if ("/search" === $route) {
        $employeeName = htmlspecialchars($_REQUEST["employeeName"]);
        $eventName = htmlspecialchars($_REQUEST["eventName"]);
        $eventDate = htmlspecialchars($_REQUEST["eventDate"]);

        $bookings = $bookingsController->searchBookings($employeeName, $eventName, $eventDate);
        $totalParticipationFees = $bookingsController->sumParticipationFees($bookings);
        $_SESSION["bookings"] = $bookings;
        $_SESSION["totalParticipationFees"] = $totalParticipationFees;
    }
}

echo include("src/views/homeview.php");