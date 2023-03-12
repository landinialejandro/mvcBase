<?php
class Member {
    protected $db;
    public function __construct() {
        $this->db = new Database;
    }
}
