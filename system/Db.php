<?php
namespace system;
use config\DbConfig;
use mysqli;

class Db {
    public $connection; // vernutsya
    
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
        var_dump($data);
        var_dump($table);
        $qKeys ='';
        $qValues = '';
        foreach ($data as $key => $value){
            $qKeys .= $key.',';
            $qValues .= '"'. $this->connection->real_escape_string($value) .'"' .',';
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


// function __destruct() {
//     $this->connection->close();
// }
}


// $obj = new DB('localhost','root','','artur');
// SELECT
// $sel = $obj->select("SELECT *  FROM market");
// var_dump($sel);

// INSERT
/* $data = [
'title' => 'Ford',
 'description' => 'Lovely old american car',
 'count' => 1000,
 'price' => 7000
];
$insert = $obj->insert('market',  $data);
var_dump($insert); */

// DELETE
// $delete = $obj->delete('market', 'id = 131');   
// var_dump($delete);


// UPDATE 
// $data2 = [
//     'title' => 'Another',
//     'description' => 'Another car',
//     'count' => 300,
//     'price' => 1001
// ];
// $update = $obj->update('market', $data2, "id = 131");
// var_dump($update);


// TRUNCATE TABLE 
// $truncate = $obj->truncate('market');
// var_dump($truncate);