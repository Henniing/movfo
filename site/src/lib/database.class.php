<?php

class database_instance {
    
    public $db;
    private $query;
    
    public function __construct(){
        $this->connect(__DB_HOST, __DB_USER, __DB_PASSW, __DB_NAME);
    }
    
    private function connect($host, $user, $pass, $name){
        $this->db = mysql_connect($host, $user, $pass);
        mysql_select_db($name, $this->db);
    }
    
    function fetch($sql) {
        $this->query=mysql_unbuffered_query($sql,$this->db); // Perform query here
    }
 
    //! An accessor
    /**
    * Returns an associative array of a query row
    * @return mixed
    */
    function getRow () {
        if ( $row=mysql_fetch_array($this->query,MYSQL_ASSOC) )
            return $row;
        else
            return false;
    }
}

?>
