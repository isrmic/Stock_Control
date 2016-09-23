<?php


namespace Controll;
use conexions\mysql\Con\Conexion as DB;
use view\MyView as viewer;
use Req\GetRequest as Request;
use PDO;

class AplicationControll{

    public function add_prod(){

        $DB = new DB();
        $Request = Request::Post(["name_prod", "price_prod", "desc_prod", "count_prod"]);

        $save = $DB->prepar("INSERT INTO produtos (`Name`, `Preco` ,`Description`, `Count_p`)  values (?,?,?,?) ");
        $save->insert($Request);
        $insert = $save->exec();

        if($insert){
          header("location: produtos");
        }

        else{
            return "Não Foi Possivel Adicionar O Produto !! ";
        }
    }

    public function Produts(){
        $DB = new DB();
        $select = $DB->prepar("SELECT * FROM produtos");
        $select->exec();

        return viewer::view("template", "produts.list", $select->AllObj());
    }

    public function Add(){
        return viewer::view("template", "produts.add_produts");
    }

    public function json(){

        $DB = new DB();
        $select = $DB->prepar("SELECT * FROM produtos");
        $select->exec();

        $all = $select->ResultJson();

        return $all;
    }

    public function details($id){

        $DB = new DB();
        $prep = $DB->prepare("SELECT * FROM produtos where ID = :id ");
        $prep->bindParam(":id", $id, PDO::PARAM_INT);
        $prep->Execute();
        $select = $prep->fetchAll(PDO::FETCH_OBJ);

        return viewer::view("template", "produts.details", $select);

    }

}
