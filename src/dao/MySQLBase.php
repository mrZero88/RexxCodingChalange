<?php

namespace dao;

use mysqli;

abstract class MySQLBase
{
    protected ?mysqli $conn = null;

    private string $servername = "localhost";
    private string $username = "root";
    private string $password = "Waitangels999";
    private string $dbname = "bookings";

    /**
     * @return void
     */
    protected function connect(): void
    {
        if ($this->conn === null || is_resource($this->conn) === false) {
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
            if ($this->conn->connect_error) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
    }

    /**
     * @return void
     */
    protected function disconnect(): void
    {
        if ($this->conn != null && is_resource($this->conn) === true) {
            $this->conn->close();
        }
    }
}