<?php
class CreateModel {

    private $connection;


    public function __construct() {

        $this->connection = new Database();
    }

    public function CreateClassesFiles() {
        $this->connection->query("SHOW tables FROM " . DB_NAME);
        $loop = $this->connection->resultSet();
        return $loop;
    }
}
