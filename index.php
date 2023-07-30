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
        redirect("localhost");
    }

    if ("/search" === $route) {
        $employeeName = htmlspecialchars($_REQUEST["employeeName"]);
        $eventName = htmlspecialchars($_REQUEST["eventName"]);
        $eventDate = htmlspecialchars($_REQUEST["eventDate"]);

        $_SESSION["bookings"] = $bookingsController->searchBookings($employeeName, $eventName, $eventDate);
        $_SESSION["totalParticipationFees"] = $bookingsController->sumParticipationFees($_SESSION["bookings"]);
        $_SESSION["employeeName"] = $employeeName;
        $_SESSION["eventName"] = $eventName;
        $_SESSION["eventDate"] = $eventDate;

        redirect("localhost");
    }
} else {
    echo include("src/views/homeview.php");
}

function redirect(string $to): void
{
    $baseUrl = $_SERVER['SERVER_NAME'];
    header(header: "Location: http://$to:8080");
}
