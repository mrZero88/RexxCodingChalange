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
                    <input class="btn btn-primary"
                           type="file" name="events_import_file"
                           accept="application/JSON">
                    <button type="button" class="btn btn-primary" style="float:right">Import Bookings</button>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Employee Name</span>
                                </div>
                                <input name="employee_name" type="text" class="form-control" aria-label="Employee Name"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Event Name</span>
                                </div>
                                <input name="event_name" type="text" class="form-control" aria-label="Event Name"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Date</span>
                                </div>
                                <input name="event_date" type="date" class="form-control" aria-label="Event Date"
                                       aria-describedby="basic-addon1">
                            </div>
                        </div>
                    </div>
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
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>