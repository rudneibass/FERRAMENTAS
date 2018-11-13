<?php
header("Content-Type: text/html; charset=utf-8", true);
 abstract class ConDB {

    private static $pdo;
    private $exeptions;
    private $exeption = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
    private function setConn() {
        return
                is_null(self::$pdo) ?
                self::$pdo = new PDO('mysql:host=localhost;dbname=site_municipal', 'root','',$this->exeption): 
                #PDO('pgsql:host=localhost;dbname=banco', 'postgres','1t4rg3t',$this->exeption):
                self::$pdo;
    }

    public function getConn() {
        return $this->setConn();
    }

}

#$pdo = new ConDB();
#$pdo ->getConn();