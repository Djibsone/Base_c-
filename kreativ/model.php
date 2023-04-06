<?php

class Model {

    private function conn() {
        require './utils/config.php';
        $db = new PDO('mysql:host='.$DB_HOST.'; dbname='.$DB_NAME.'', $DB_USER, $DB_PASS);
        return $db;
    }

    //add
    public function add($table, $field, $values, $data) {
        $db = $this -> conn('localhost', 'kreativ', 'djibril', 'tamou');
        $query = $db -> prepare('INSERT INTO '.$table.'('.$field.') VALUES('.$values.')');
        $query -> execute($data);
    }

    //update
    public function update($table, $field, $values, $data, $id) {
        $db = $this -> conn('localhost', 'kreativ', 'djibril', 'tamou');
        $query = $db -> prepare('UPDATE '.$table.' SET '.$field.' = '.$values.' WHERE id='.$id.'');
        $query -> execute($data);
    }

    //read
    public function read($table) {
        $db = $this -> conn('localhost', 'kreativ', 'djibril', 'tamou');
        $query = $db -> query('SELECT * FROM '.$table.'');
        //$query -> fetch();
        return json_encode($query->fetch());
    }

    //delete
    public function delete($table, $values, $data) {
        $db = $this -> conn('localhost', 'kreativ', 'djibril', 'tamou');
        $query = $db -> prepare('DELETE FROM '.$table.' WHERE id='.$values.'');
        $query -> execute($data);
    }


    
}

?>