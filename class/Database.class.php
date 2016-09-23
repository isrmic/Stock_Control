<?php


namespace conexions\mysql\Con;

use PDO;
use stdClass;

class Conexion{

    private $HOST;
    private $DB;
    private $USER;
    private $Pass;
    private $BD;
    private $link = null;
    private $iniData;



    public function __construct($HOST = "localhost", $DB = null, $User = null, $Password = null, $BD = "mysql"){
        $this->HOST = $HOST;
        $this->DB = $DB;
        $this->USER = $User;
        $this->Password = $Password;
        $this->BD = $BD;
        $this->iniData = parse_ini_file(__DIR__ . "\..\Database\Database.ini");
        try
        {
            //$this->link = new PDO( ''.$this->BD.':host='.$this->HOST.';dbname='.$this->DB.'', $this->USER, $this->Password );
            $this->link = new PDO( ''.$this->iniData["Driver"].':host='.$this->iniData["HOST"].':3306;dbname='.$this->iniData["Database"].'', $this->iniData["User"], $this->iniData["Password"] );
        }
        catch ( PDOException $e )
        {
            echo 'Erro ao conectar com o '. $this->BD .': ' . $e->getMessage();
        }

        return $this->link == true;
    }

    public function getLink(){
        return $this->link;
    }

    public function Conn(){




          try
          {
              //$this->link = new PDO( ''.$this->BD.':host='.$this->HOST.';dbname='.$this->DB.'', $this->USER, $this->Password );
              $this->link = new PDO( ''.$this->iniData["Driver"].':host='.$this->iniData["HOST"].':3306;dbname='.$this->iniData["Database"].'', $this->iniData["User"], $this->iniData["Password"] );
          }
          catch ( PDOException $e )
          {
              echo 'Erro ao conectar com o '. $this->BD .': ' . $e->getMessage();
          }

          return $this->link == true;

    }

    public function Query($query){
        if(!empty($query))
            return $this->link->query($query);
        else
            return false;
    }

    public function manipule($param, $param2, $param3){


        $stmt = $this->link->prepare($param);
        $stmt->bindParam($param2, $param3);
        $stmt->Execute();


        return $stmt;
    }

    public function prepare($param){
        return $this->link->prepare($param);
    }

    public function insert($param, $param2){

        $prepare = $this->prepare($param);

        if(is_array($param2)){
            for($j = 1; $j<count($param2); $j++){
                foreach($param2 as $key => $value){
                    $prepare->bindParam($j, $param2[$key]);
                }
            }
        }

        return $prepare->Execute();
    }

    public function prepar($sql){

        $stmt = $this->link->prepare($sql);

        return new DB($stmt);
    }

    public function All(){

       $stmt = $this->link->prepare("SELECT * FROM Users");
       $stmt->Execute();
       return $stmt->fetchAll();
    }

    public static function look(){
        $self = $this;
        return $self->All();
    }

}

use conexions\mysql\Con\Conexion as Con;
class DB{

    protected $stmt;
    protected $bind;

    public function __construct($param){
      $this->stmt = $param;
    }

    public function insert($param, $param2 = null){

        if(is_array($param)){

            $count = 1;
            foreach($param as $key => $value):
                $this->bind = $this->stmt->bindParam($count, $param[$key]);
                $count++;
            endforeach;

        }else {
            $this->bind = $this->stmt->bindParam(1, $param, $param2);
        }



        return $this->bind;
    }



    public function exec($exec = null){
        return $this->stmt->Execute();
    }

    public function rowsafeted(){
        return $this->stmt->rowcount();
    }

    public function ALL(){
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function AllObj(){
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function ResultJson(){
        return json_encode($this->ALL());
    }

}
