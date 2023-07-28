<?php

namespace models;

class Booking
{
    public function __construct(private int $participationId, private string $employeeName, private string $eventName, private string $eventDate, private string $participationFee)
    {
    }

    /**
     * @return int
     */
    public function getParticipationId(): int
    {
        return $this->participationId;
    }

    /**
     * @param int $participationId
     */
    public function setParticipationId(int $participationId): void
    {
        $this->participationId = $participationId;
    }

    /**
     * @return string
     */
    public function getEmployeeName(): string
    {
        return $this->employeeName;
    }

    /**
     * @param string $employeeName
     */
    public function setEmployeeName(string $employeeName): void
    {
        $this->employeeName = $employeeName;
    }

    /**
     * @return string
     */
    public function getEventName(): string
    {
        return $this->eventName;
    }

    /**
     * @param string $eventName
     */
    public function setEventName(string $eventName): void
    {
        $this->eventName = $eventName;
    }

    /**
     * @return string
     */
    public function getEventDate(): string
    {
        return $this->eventDate;
    }

    /**
     * @param string $eventDate
     */
    public function setEventDate(string $eventDate): void
    {
        $this->eventDate = $eventDate;
    }

    /**
     * @return string
     */
    public function getParticipationFee(): string
    {
        return $this->participationFee;
    }

    /**
     * @param string $participationFee
     */
    public function setParticipationFee(string $participationFee): void
    {
        $this->participationFee = $participationFee;
    }
}