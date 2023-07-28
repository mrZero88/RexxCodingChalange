<?php

namespace dao;

use Exception;
use models\Event;

class EventDao extends MySQLBase
{
    /**
     * @param int $id
     * @param string $name
     * @param string $date
     * @return Event|null
     */
    public function fetchOrInsertEvent(int $id, string $name, string $date): ?Event
    {
        $event = $this->fetchEvent($id);
        return !empty($event) ? $event : $this->insertEvent($id, $name, $date);
    }

    /**
     * @param int $id
     * @return Event|null
     */
    private function fetchEvent(int $id): ?Event
    {
        $this->connect();

        $event = null;
        $stmt = $this->conn->prepare("SELECT * FROM events WHERE id = ? limit 1");
        $stmt->bind_param("i", $id);

        try {
            $stmt->execute();
            $rows = $stmt->get_result();
            foreach ($rows as $row) {
                $event = new Event($row["id"], $row["name"], $row["date"]);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $this->disconnect();
        }

        return $event;
    }

    /**
     * @param int $id
     * @param string $name
     * @param string $date
     * @return Event|null
     */
    private function insertEvent(int $id, string $name, string $date): ?Event
    {
        $this->connect();

        $event = null;
        $stmt = $this->conn->prepare("INSERT INTO events (id, name, date) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $id, $name, $date);

        try {
            $stmt->execute();
            $event = $this->fetchEvent($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $this->disconnect();
        }

        return $event;
    }
}