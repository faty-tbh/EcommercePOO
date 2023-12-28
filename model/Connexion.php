<?php

class Connexion{
    //on peut declarer ces 4 premiers lignes private
    public $servername = '127.0.0.1';
    public $username = 'root';
    public $password ='';
    public $database ='sunny';
    public $con;

    public function __construct(){
        $this->con = new mysqli ($this-> servername, $this->username,$this->password, $this->database);

        if(mysqli_connect_error()){
            trigger_error("Failed to connect MYSQL: ".mysqli_connect_error());
            
            
        }
        else{
            return $this->con;
            
            
        }
    }

    public function getConnexion(){
        if($this->con==null){
             new Connexion();
             
        }
             return $this->con;
             
        }
       
        
    }

   




?>