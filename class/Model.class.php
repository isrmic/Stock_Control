<?php


namespace Model\Produts;
use conexions\mysql\Con\Conexion as DB;
use PDO;

class ModelProduts extends DB{

    public function addnewProd($values){

        $query = $this->ReturnQueryString("Insert", $values);
        $add = parent::prepar($query);

        $this->TypeBD == "mysql" ? $add->opt($values) : null;
        return $add->exec();
    }

    public function viewProd($opt, $limit, $ppp){

        if(!empty($opt["prod"]))
        {
            $value = "%{$opt["prod"]}%";
            $query = $this->ReturnQueryString("Select", "WhereName", $value);
        }
        else
        {
            $query = $this->ReturnQueryString("Select", "pagination", $limit);

        }

        $select = parent::prepar($query);

        //query to select all data in table produtos
        $rowquery = "SELECT COUNT(*) FROM produtos";
        $rows = parent::prepare($rowquery);
        $rows->Execute();

        //select rows to pagination
        $rows = $rows->fetchColumn();
        

        if($this->TypeBD == "mysql"){
            !empty($opt["prod"])? $select->opt($value) : $select->opt($limit, PDO::PARAM_INT);
        }
        //Execution of query
        $select->exec();

        //Return All results of execution query in form object
        $obj = $select->AllObj();

        //add rows pagination in results query
        if(!empty($obj))
            $obj[0]->rows = (int)($rows / $ppp + ($rows % $ppp > 0 ? 1 : 0) );

        //return obj with rows with data querys
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

        $queryupdate = $this->ReturnQueryString("Update", $values);
        $update = parent::prepar($queryupdate);
        $this->TypeBD == "mysql" ? $update->opt($values) : $update->opt($values["prod_ID"]);
        return $update->exec();

    }

    public function detailsProd($id){

      $prep = parent::prepare("SELECT * FROM produtos where ID = :id ");
      $prep->bindParam(":id", $id, PDO::PARAM_INT);
      $prep->Execute();
      return $prep->fetchAll(PDO::FETCH_OBJ);

    }

    private function ReturnQueryString($param, $param2 = null, $param3 = null){

        $query = null;
        $TypeBD = $this->TypeBD;


        switch($TypeBD){

            case "mysql":

                switch($param){

                  case "Select":
                      $query = "SELECT * FROM produtos LIMIT ? , ? ";
                  break;

                  case "Insert":
                      $query = "INSERT INTO produtos (`Name`, `Price` ,`Description`, `Count_P`, `insertData`, `dataModified`)  values (?,?,?,?, NOW(), NOW()) ";
                  break;

                  case "Rows":
                      $query = "SELECT COUNT(*) FROM produtos";
                  break;

                  case "Update":
                      $query = "UPDATE produtos SET Name = ?, Price = ?, Description = ?, Count_P = ?, dataModified = NOW() WHERE ID = ?";
                  break;

                }

            break;


            case "odbc":

                switch($param){

                    case "Select":

                      if($param2 == "pagination"){

                          $query = "SELECT * FROM produtos ORDER BY ID OFFSET {$param3[0]} ROWS FETCH NEXT {$param3[1]} ROWS ONLY";
                      }
                      else if($param2 == "WhereName"){

                          $query = "SELECT * FROM produtos WHERE NAME LIKE '%{$param3}%' ";
                      }

                    break;

                    case "Insert":
                        $query = "INSERT INTO produtos (Name, Price ,Description, Count_P, insertData, dataModified)  values ('{$param2["name_prod"]}', {$param2["price_prod"]},'{$param2["desc_prod"]}', {$param2["count_prod"]}, getdate(), getdate())";
                    break;

                    case "Rows":
                        $query = "SELECT COUNT(*) FROM produtos";
                    break;

                    case "Update":
                        $query = "UPDATE produtos SET Name = '{$param2['name_prod']}', Price = {$param2['price_prod']}, Description = '{$param2['desc_prod']}', Count_P = {$param2['Count_Prod']}, dataModified = getdate() WHERE ID = ?";
                    break;

                  }



            break;

        }

        return $query;
    }

}
