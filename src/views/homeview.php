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
                <?php include("bookingimport.php") ?>
                <?php include("bookingfilters.php") ?>
                <li class="list-group-item">
                    <button type="submit" form="search_form" class="btn btn-primary" style="float:right">Search
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="row" style="margin-top: 15px">
        <div class="col-md-12">
            <?php include("bookingstable.php") ?>
        </div>
    </div>
</div>
</body>
</html>