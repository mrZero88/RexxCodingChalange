<?php

namespace app\controllers;

use app\dao\BookingDao;
use app\dao\EventDao;
use app\dao\EmployeeDao;
use app\dao\ParticipationDao;

class BookingsController
{
    /**
     * @return void
     */
    public function importBookings(): void
    {
        $jsonBookings = file_get_contents('data/bookings.json');
        $jsonBookingsData = json_decode($jsonBookings, true);
        $this->insertIntoDatabase($jsonBookingsData);
    }

    /**
     * @param string $employeeName
     * @param string $eventName
     * @param string $eventDate
     * @return array
     */
    public function searchBookings(string $employeeName, string $eventName, string $eventDate): array
    {
        $bookingsDao = new BookingDao();
        return $bookingsDao->fetchBookingsFilteredBy($employeeName, $eventName, $eventDate);
    }

    /**
     * @param array $bookings
     * @return float
     */
    public function sumParticipationFees(array $bookings): float
    {
        $sum = 0.0;
        foreach ($bookings as $booking) {
            $sum += $booking->getParticipationFee();
        }
        return $sum;
    }

    /**
     * @param array $json_bookings_data
     * @return void
     */
    private function insertIntoDatabase(array $json_bookings_data): void
    {
        foreach ($json_bookings_data as $item) {
            $participationId = $item['participation_id'];
            $participationFee = (float)$item['participation_fee'];

            $employeeName = $item['employee_name'];
            $employeeMail = $item['employee_mail'];

            $eventId = $item['event_id'];
            $eventName = $item['event_name'];
            $eventDate = $item['event_date'];

            $eventId = $this->fetchOrInsertEvent($eventId, $eventName, $eventDate);
            $employeeId = $this->fetchOrInsertEmployee($employeeMail, $employeeName);
            $this->insertParticipation($participationId, $participationFee, $employeeId, $eventId);
        }
    }

    /**
     * Fetches or inserts an event and returns its id.
     *
     * @param int $eventId
     * @param string $eventName
     * @param string $eventDate
     * @return int
     */
    private function fetchOrInsertEvent(int $eventId, string $eventName, string $eventDate): int
    {
        $eventDao = new EventDao();
        $event = $eventDao->fetchOrInsertEvent($eventId, $eventName, $eventDate);
        return $event?->getId() ?? 0;
    }

    /**
     * @param string $employeeMail
     * @param string $employeeName
     * @return int
     */
    private function fetchOrInsertEmployee(string $employeeMail, string $employeeName): int
    {
        $eventDao = new EmployeeDao();
        $employee = $eventDao->fetchOrInsertEmployee($employeeMail, $employeeName);
        return $employee?->getId() ?? 0;
    }

    /**
     * @param int $participationId
     * @param float $participationFee
     * @param int $employeeId
     * @param float $eventId
     * @return void
     */
    private function insertParticipation(int $participationId, float $participationFee, int $employeeId, float $eventId): void
    {
        $participationDao = new ParticipationDao();
        if (!empty($employeeId) && !empty($eventId)) {
            $participationDao->fetchOrInsertParticipation($participationId, $participationFee, $employeeId, $eventId);
        }
    }
}