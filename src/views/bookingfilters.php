<li class="list-group-item">
    <form id="search_form" name="search_form" action="/search" method="post"
          enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Employee Name</span>
                    </div>
                    <input name="employeeName" type="text" class="form-control"
                           aria-label="Employee Name"
                           aria-describedby="basic-addon1" value="<?php echo $_SESSION["employeeName"] ?? ''; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Event Name</span>
                    </div>
                    <input name="eventName" type="text" class="form-control" aria-label="Event Name"
                           aria-describedby="basic-addon1" value="<?php echo $_SESSION["eventName"] ?? ''; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Event Date</span>
                    </div>
                    <input name="eventDate" type="date" class="form-control" aria-label="Event Date"
                           aria-describedby="basic-addon1" value="<?php echo $_SESSION["eventDate"] ?? ''; ?>">
                </div>
            </div>
        </div>
    </form>
</li>