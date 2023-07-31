<?php

namespace app\dao;

use Exception;
use app\models\Employee;

class EmployeeDao extends MySQLBase
{
    /**
     * @param string $email
     * @param string $name
     * @return Employee|null
     */
    public function fetchOrInsertEmployee(string $email, string $name): ?Employee
    {
        $employee = $this->fetchEmployeeByEmail($email);
        return !empty($employee) ? $employee : $this->insertEmployee($email, $name);
    }

    /**
     * @param int $id
     * @return Employee|null
     */
    private function fetchEmployee(int $id): ?Employee
    {
        $this->connect();

        $employee = null;
        $stmt = $this->conn->prepare("SELECT * FROM employees WHERE id = ? limit 1");
        $stmt->bind_param("i", $id);

        try {
            $stmt->execute();
            $rows = $stmt->get_result();
            foreach ($rows as $row) {
                $employee = new Employee($row["id"], $row["email"], $row["name"]);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $this->disconnect();
        }

        return $employee;
    }

    /**
     * @param string $email
     * @return Employee|null
     */
    private function fetchEmployeeByEmail(string $email): ?Employee
    {
        $this->connect();

        $employee = null;
        $stmt = $this->conn->prepare("SELECT * FROM employees WHERE email = ? limit 1");
        $stmt->bind_param("s", $email);

        try {
            $stmt->execute();
            $rows = $stmt->get_result();
            foreach ($rows as $row) {
                $employee = new Employee($row["id"], $row["email"], $row["name"]);
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        } finally {
            $this->disconnect();
        }

        return $employee;
    }

    private function insertEmployee(string $email, string $name): Employee
    {
        $this->connect();

        $employee = null;
        $stmt = $this->conn->prepare("INSERT INTO employees (email, name) VALUES (?, ?)");
        $stmt->bind_param("ss", $email, $name);

        try {
            $stmt->execute();
            $id = $stmt->insert_id;
            $employee = $this->fetchEmployee($id);
        } catch (\Exception $e) {
            echo $e->getMessage();
        } finally {
            $this->disconnect();
        }

        return $employee;
    }
}