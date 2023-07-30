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
    <?php foreach ($_SESSION["bookings"] ?? [] as $booking): ?>
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
        <td><?php echo $_SESSION["totalParticipationFees"] ?? 0.0 ?></td>
    </tr>
    </tbody>
</table>