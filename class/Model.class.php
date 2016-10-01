<?php


namespace Model\Produts;
use conexions\mysql\Con\Conexion as DB;
use PDO;

class ModelProduts extends DB{

    public function addnewProd($values){

        $add = parent::prepar("INSERT INTO produtos (`Name`, `Preco` ,`Description`, `Count_p`)  values (?,?,?,?) ");
        $add->opt($values);
        return $add->exec();
    }

    public function viewProd($opt, $limit, $ppp){

        if(!empty($opt["prod"]))
        {
            $query = "SELECT * FROM produtos WHERE Name LIKE  ? ";
        }
        else
        {
            $query = "SELECT * FROM produtos LIMIT ? , ? ";
        }

        $select = parent::prepar($query);

        $rows = parent::prepare("SELECT * FROM produtos");
        $rows->Execute();
        $rows = $rows->rowcount();
        $value = "%{$opt["prod"]}%";
        !empty($opt["prod"]) ? $select->opt($value) : $select->opt($limit, PDO::PARAM_INT);
        $select->exec();
        $obj = $select->AllObj();
        if(!empty($obj))
            $obj[0]->rows = (int)($rows / $ppp + ($rows % $ppp > 0 ? 1 : 0) );

        return $obj;

    }


    public function removeProd($id){

        $remove = parent::prepar("DELETE FROM produtos WHERE ID = ?");
        $remove->opt($id, PDO::PARAM_INT);
        return $remove->exec();
    }

    public function editProd($id){

        $select = parent::prepar("SELECT * FROM produtos WHERE ID = ? ");
        $select->opt($id, PDO::PARAM_INT);
        $select->exec();
        return $select->AllObj();
    }

    public function updateProd($values){

        $update = parent::prepar("UPDATE produtos SET Name = ?, Preco = ?, Description = ?, Count_p = ? WHERE ID = ?");
        $update->opt($values);
        return $update->exec();

    }

    public function detailsProd($id){

      $prep = parent::prepare("SELECT * FROM produtos where ID = :id ");
      $prep->bindParam(":id", $id, PDO::PARAM_INT);
      $prep->Execute();
      return $prep->fetchAll(PDO::FETCH_OBJ);

    }

}
