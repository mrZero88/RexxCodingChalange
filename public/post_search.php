<?php

require_once("../controllers/BookingsController.php");

var_dump("SEARCH");

if (isset($_POST['events_import_file'])) {
    $bookingsController = new controllers\BookingsController();

}