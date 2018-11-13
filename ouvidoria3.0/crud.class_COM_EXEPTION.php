<?php

require 'validacao.class.php';
require 'ConDB.class.php';

class Crud extends ConDB {

    private $query;

    public function prepExec($prep, $exec) {
        $this->query = $this->getConn()->prepare($prep);
        $this->query->execute($exec);
    }

    public function Insert($post, $table) {
        $fields = null;
        $values = null;


        foreach ($post as $campo => $valor) {
            $fields .= $campo . "=?,";
            $values .= $valor . ",";
        }
        $prep = substr($fields, 0, strlen($fields) - 1);
        $exec = substr($values, 0, strlen($values) - 1);

        $exec = explode(',',$exec);
        
        try {
            $this->prepExec('INSERT INTO ' . $table . ' ' . $prep . '',$exec);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
        return $this->query;
    }

    public function update($table, $prep, $exec) {
        try {
            $this->prepExec(' UPDATE ' . $table . ' SET ' . $prep . '', $exec);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
        return $this->query;
    }

    public function delete($table, $prep, $exec) {
        try {
            $this->prepExec('DELETE FROM ' . $table . ' ' . $prep . ' ', $exec);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
    }

    public function select($fields, $table, $prep, $exec) {
        try {
            $this->prepExec(' SELECT ' . $fields . ' FROM ' . $table . ' ' . $prep . '', $exec);
        } catch (PDOException $e) {
            echo $e->getCode();
            echo $e->getMessage();
        }
        return $this->query;
    }

}
