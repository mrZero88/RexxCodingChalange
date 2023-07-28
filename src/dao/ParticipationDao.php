<?php

namespace dao;

use Exception;
use models\Participation;

class ParticipationDao extends MySQLBase
{
    /**
     * @param int $id
     * @param float $fee
     * @param int $employeeId
     * @param int $eventId
     * @return Participation|null
     */
    public function fetchOrInsertParticipation(int $id, float $fee, int $employeeId, int $eventId): ?Participation
    {
        $participation = $this->fetchParticipation($id);
        return !empty($participation) ? $participation : $this->insertParticipation($id, $fee, $employeeId, $eventId);
    }

    /**
     * @param int $id
     * @return Participation|null
     */
    private function fetchParticipation(int $id): ?Participation
    {
        $this->connect();

        $participation = null;
        $stmt = $this->conn->prepare("SELECT * FROM participations WHERE id = ? limit 1");
        $stmt->bind_param("i", $id);

        try {
            $stmt->execute();
            $rows = $stmt->get_result();
            foreach ($rows as $row) {
                $participation = new Participation($row["id"], $row["fee"], $row["employee_id"], $row["event_id"]);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $this->disconnect();
        }

        return $participation;
    }

    /**
     * @param int $id
     * @param float $fee
     * @param int $employeeId
     * @param int $eventId
     * @return Participation|null
     */
    private function insertParticipation(int $id, float $fee, int $employeeId, int $eventId): ?Participation
    {
        $this->connect();

        $participation = null;
        $stmt = $this->conn->prepare("INSERT INTO participations (id, fee, employee_id, event_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("idii", $id, $fee, $employeeId, $eventId);

        try {
            $stmt->execute();
            $participation = $this->fetchParticipation($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $this->disconnect();
        }

        return $participation;
    }
}