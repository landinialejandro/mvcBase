<?php
use app\libraries\Database;
class Member {
    protected $db;
    public function __construct() {
        $this->db = new Database;
    }
}
