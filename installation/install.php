<?php

class install{

    private $input;
    
    public function __contruct($ho, $na, $us, $pw){
        $this->input['dbhost'] = $ho;
        $this->input['dbname'] =  $na;
        $this->input['dbuser'] = $us;
        $this->input['dbpassw'] =  $pw;
    }
    
    public function validate_input(){
        $valid = true;
        foreach($input as $in){
            if(empty($in))
                $valid = false;
        }
        return $valid;
    }
    
    public function validata_database(){
        $valid
        $errors;
        $db_link = mysql_connect($this->input['dbhost'], $this->input['dbuser'], $this->input['dbpassw']);
        if($db_link){
            $db_select = mysql_select_db($this->input['dbname'], $db_link);
            if($db_select){
                $valid = true;
            }
            else{
                $valid = false;
                $error['select'] = true;
            }
        }
        else{
            $valid = false;
            $error['connect'] = true;
        }
        if($valid)
            return true;
        else
            return $errors;
    }
}


?>
