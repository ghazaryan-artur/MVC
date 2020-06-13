<?php
namespace system;
use config\DbConfig;
use mysqli;

class Db {
    private $connection;   
    function __construct(){
        $this->connection = new \Mysqli(DbConfig::HOST, DbConfig::USERNAME, DbConfig::PASSWORD, DbConfig::DBNAME);
        if ($this->connection->connect_errno) {
            printf("Не удалось подключиться: %s\n", $this->connection->connect_error());
            exit();
        }
      
    }

    public function select($query, $all = true){        
        $data = $this->connection->query($query);
        if($data->num_rows > 0){
            if($all){
                while ($row = $data->fetch_assoc()) {
                    $result[] = $row;
                }
                return $result;
            } else {
                return $data->fetch_assoc();
            } 
        } else {
            return false;
        }
    }

    public function insert($table, $data){
        $qKeys ='';
        $qValues = '';
        foreach ($data as $key => $value){
            $qKeys .= $key.',';
            $qValues .= '"'. str_replace(['\\', "'", '"'], ['\\\\', "\'", '\"'], $email) .'"' .',';
        }
        $qKeys = substr($qKeys,0,-1);
        $qValues = substr($qValues,0,-1);
        $result = $this->connection->query("INSERT INTO $table ($qKeys) VALUES ($qValues)");
        return $result;
    }
    

    public function delete($from, $where = "1"){
        return $this->connection->query("DELETE FROM $from WHERE $where");
    }

    public function update($table, $data, $where = "1"){
        $toSet = '';
        foreach ($data as $key => $value){
            $toSet .= "$key = '$value', "; 
        }
        $toSet = substr($toSet,0,-2);
        return $this->connection->query("UPDATE $table SET $toSet WHERE $where");
    }

    public function truncate($table){
        $result = $this->connection->query("TRUNCATE TABLE $table");
        return $result;
    }


    function __destruct() {
        $this->connection->close();
    }
}