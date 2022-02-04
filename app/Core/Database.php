<?php

class Database
{
    private string $db_type = "mysql";
    private string $db_host = "localhost";
    private string $db_name = "car_rental";
    private string $db_user = "root";
    private string $db_password = "";
    private $connection;

    public function dbConnect()
    {
        $this->connection = null;
        try {
            $string = $this->db_type . ":host=" . $this->db_host . ";dbname=" . $this->db_name . ";";
            $this->connection = new PDO($string, $this->db_user, $this->db_password);
        } catch (\PDOException $e) {
            die("Connection Failed") . $e->getMessage();
        }

        return $this->connection;
    }

    public function read($sql, $data = [])
    {
        $db = $this->dbConnect();
        $stmt = $db->prepare($sql);

        if (count($data) === 0) {
            $stmt = $db->query($sql);
        } else {
            return $stmt->execute($data);
        }

        if ($stmt) {
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($data) && count($data) > 0) {
                return $data;
            }

            return false;
        } else {
            return false;
        }
    }

    public function write($sql, $data = [])
    {
        $db = $this->dbConnect();
        $stmt = $db->prepare($sql);

        // if (count($data) === 0) {
        //     $stmt = $db->query($sql);
        // }
    }
}