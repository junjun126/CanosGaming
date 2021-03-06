<?php
class Games {
    public $id = -1;
    public $name;
    public $cost;
    
    
    
    
    public static function loadFromID($id) {       
        $records = getResultFromSQL('SELECT * FROM games WHERE id = ?', [$id]);
        
        if (count($records) == 0) {
            return null;
        }
        
        $record = $records[0];
        $u = new Games();
        
        $u->id = $record['id'];
        $u->name = $record['name'];
        $u->cost = $record['cost'];
        
        return $u;
    }
    
    public static function loadFromGame($name) {
        $records = getResultFromSQL('SELECT * FROM games WHERE game = ?', [$name]);
        
        if (count($records) == 0) {
            return null;
        }
        
        $record = $records[0];
        $u = new Games();
        
        
        $u->id = $record['id'];
        $u->name = $record['name'];
        $u->cost = $record['cost'];
        
        
        return $u;
    }
    
    public function save() {
        if ($this->id == -1) {
            $sql = "INSERT INTO `games` (`id`, `name`, `cost`) VALUES (NULL, ?, ?);";
            
            getResultFromSQL($sql, [$this->name, $this->cost]);
        }
    }
    
    /*
    public function validatePassword($password) {
        return ($password == $this->password);
    }
    */
}
?>