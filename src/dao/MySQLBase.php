<?php

namespace app\dao;

use mysqli;
use app\Config;

abstract class MySQLBase
{
    protected ?mysqli $conn = null;

    /**
     * @return void
     */
    protected function connect(): void
    {
        if ($this->conn === null || is_resource($this->conn) === false) {
            $this->conn = new mysqli(Config::$servername, Config::$username, Config::$password, Config::$dbname);
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
        if ($this->conn != null && is_resource($this->conn) === true) $this->conn->close();
    }
}