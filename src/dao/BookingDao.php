<?php

namespace dao;

use Exception;
use models\Booking;
use models\Event;

class BookingDao extends MySQLBase
{
    /**
     * @param string $employeeName
     * @param string $eventName
     * @param string $date
     * @return array
     */
    public function fetchBookingsFilteredBy(string $employeeName, string $eventName, string $date): array
    {
        $this->connect();

        $bookings = [];
        $stmt = $this->conn->prepare(
            "select p.id    as 'participationId',
                        e.name  as 'employeeName',
                        e2.name as 'eventName',
                        e2.date as 'eventDate',
                        p.fee   as 'participationFee'
                   from participations p
                        join employees e on p.employee_id = e.id
                        join events e2 on p.event_id = e2.id
                    where if(? = '', true, e.name = ?)
                        and if(? = '', true, e2.name = ?)
                        and if(? = '', true, e2.date = ?)"
        );

        $stmt->bind_param("ssssss", $employeeName, $employeeName, $eventName, $eventName, $date, $date);

        try {
            $stmt->execute();
            $rows = $stmt->get_result();
            foreach ($rows as $row) {
                $bookings[] = new Booking($row["participationId"], $row["employeeName"], $row["eventName"], $row["eventDate"], $row["participationFee"]);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $this->disconnect();
        }

        return $bookings;
    }
}