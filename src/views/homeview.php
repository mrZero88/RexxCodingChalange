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
                    <form id="import_form" name="import_form" action="../router.php?route=import" method="post">
                        <!-- <input class="btn btn-secondary"
                               type="file" name="importFile"
                               id="events_import_file"
                               accept="application/JSON"> -->
                        <button name="import_events" form="import_form" type="submit" class="btn btn-primary"
                                style="float:right">
                            Import Bookings
                        </button>
                    </form>
                </li>
                <li class="list-group-item">
                    <form id="search_form" name="search_form" action="../router.php?route=search" method="post"
                          enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Employee Name</span>
                                    </div>
                                    <input name="employeeName" type="text" class="form-control"
                                           aria-label="Employee Name"
                                           aria-describedby="basic-addon1" value="<?php echo $employeeName ?? ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Event Name</span>
                                    </div>
                                    <input name="eventName" type="text" class="form-control" aria-label="Event Name"
                                           aria-describedby="basic-addon1" value="<?php echo $eventName ?? ''; ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1">Date</span>
                                    </div>
                                    <input name="eventDate" type="date" class="form-control" aria-label="Event Date"
                                           aria-describedby="basic-addon1" value="<?php echo $eventDate ?? ''; ?>">
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
                <?php foreach ($bookings ?? [] as $booking): ?>
                    <tr>
                        <th scope="row"><?php echo $booking->getParticipationId() ?></th>
                        <td><?php echo $booking->getEmployeeName() ?></td>
                        <td><?php echo $booking->getEventName() ?></td>
                        <td><?php echo $booking->getEventDate() ?></td>
                        <td><?php echo $booking->getParticipationFee() ?></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <th scope="row"></th>
                    <td>Total</td>
                    <td></td>
                    <td></td>
                    <td><?php echo $totalParticipationFees ?? 0.0 ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>