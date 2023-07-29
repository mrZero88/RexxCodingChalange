<?php
require_once __DIR__ . "/vendor/autoload.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>RexxCodeChallenge</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<div class="container" style="padding-top: 15px">
    <div class="row">
        <div class="col-md-12">
            <h1>Bookings XYZ</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <ul class="list-group">
                <li class="list-group-item">
                    <form id="import_form" name="import_form" action="../index.php?route=import" method="post">
                        <!-- <input class="btn btn-secondary"
                               type="file" name="importFile"
                               id="events_import_file"
                               accept="application/JSON">-->
                        <button name="import_events" form="import_form" type="submit" class="btn btn-primary"
                                style="float:right">
                            Import Bookings
                        </button>
                    </form>
                </li>
                <li class="list-group-item">
                    <form id="search_form" name="search_form" action="router.php?route=search" method="post"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Employee Name</span>
                                    </div>
                                    <input name="employeeName" type="text" class="form-control"
                                           aria-label="Employee Name"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Event Name</span>
                                    </div>
                                    <input name="eventName" type="text" class="form-control" aria-label="Event Name"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Date</span>
                                    </div>
                                    <input name="eventDate" type="date" class="form-control" aria-label="Event Date"
                                           aria-describedby="basic-addon1">
                                </div>
                            </div>
                        </div>
                    </form>
                </li>
                <li class="list-group-item">
                    <button type="submit" form="search_form" class="btn btn-primary" style="float:right">Search
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="row" style="margin-top: 15px">
        <div class="col-md-12">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Employee Name</th>
                    <th scope="col">Event Name</th>
                    <th scope="col">Event Date</th>
                    <th scope="col">Event Fee</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>