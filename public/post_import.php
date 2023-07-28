<?php

require_once __DIR__ . '/../vendor/autoload.php';

if (isset($_POST['importFile'])) {
    $bookingsController = new \controllers\BookingsController();
    $bookingsController->importBookings();
}