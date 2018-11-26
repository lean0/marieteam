<?php

class Database
{
    protected $dbh;
    public function __construct() {

        $this->dbh = new PDO('mysql:host=localhost;dbname=marieteam', 'root', '');
    }
    public function connection(){
        return $this->dbh;
    }

}
