<?php

require_once 'variables.php';

class DataBase {
    
    public ?\PDO $database = null;

    public function dbConnect(): \PDO 
    {
        if ($this->database === null) {
            $this->database = new \PDO(
                sprintf('mysql:host=%s;dbname=%s;charset=utf8', MYSQL_HOST, MYSQL_NAME),
            MYSQL_USER,
            MYSQL_PASSWORD
        );
        $this->database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = file_get_contents(__DIR__ ."/create_base.sql");
        if ($sql !== false)
            $this->database->exec($sql);
        else
            throw new \Exception("Error Cannot read Sql file.");
        }

        return $this->database;
    }
}