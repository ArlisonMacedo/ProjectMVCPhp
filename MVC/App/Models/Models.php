<?php


namespace App\Models;

use App\Models\Produto;
use App\Models\Funcionario;
use CoffeeCode\Router\Router;

//session_start();

class Models extends Conexao{

    /**
     * buscar todos os produtos e categorias
     */

    public function findAll()
    {
        $sql = "SELECT `produto`. * FROM produto INNER JOIN categoria on produto.categoria_ID = categoria.ID";
        
        try {
            //code...
            $stmt = parent::getConnection()->query($sql);
            $stmt->execute();
            return $stmt;
        } catch (\PDOException $ex) {
            //throw $th;
            echo $ex->getMessage();
        }
    }

    /**
     * Buscar todas as categorias
     */

    public function findAllCategory()
    {
        $sql = "SELECT * FROM categoria";

        try {
            $stmt = parent::getConnection()->query($sql);
            $stmt->execute();
            return $stmt;
        } catch(\PDOException $ex){
            echo $ex->getMessage();
        }
    }

    /**
     * criar novo produto
     */

     public function createProduct(Produto $produto)
     {
         $sql = "INSERT INTO produto VALUES(null,:cat_id,:nome,:preco,:qtd,:img)";
         $enctype = md5(time()).$new_img = $_FILES['image']['name'];

         try{

             $stmt = parent::getConnection()->prepare($sql);
             $stmt->bindValue(":cat_id",$produto->getCat_ID());
             $stmt->bindValue(":nome",$produto->getNome());
             $stmt->bindValue(":preco",$produto->getPreco());
             $stmt->bindValue(":qtd",$produto->getQtd());
             $stmt->bindValue(":img",$enctype);

             if($stmt->execute()){
                 $dir = "./image/".$enctype;
                 move_uploaded_file($_FILES['image']['tmp_name'], $dir);
                 $router = new Router(URL_BASE);
                 $router->redirect("/");
             }
         } catch(\PDOException $ex){
             echo $ex->getMessage();
         }
     }

    /**
    *  Login Funcionario
    */

    public function loginAdmin(Funcionario $func)
    {
        $sql = "SELECT * FROM funcionario WHERE email = :email AND senha = :pass";
        $array = [];
        try{
            $stmt = parent::getConnection()->prepare($sql);
            $stmt->bindValue(":email",$func->getEmail());
            $stmt->bindValue(":pass",$func->getSenha());
            $array = $stmt->execute();
             
            foreach($stmt as $row){
                $_SESSION['EMAIL'] = $row->email;
            }

            return $array;
            
        } catch(\PDOException $ex){
            echo $ex->getMessage() . " " . $ex->getLine();
        }
    }

    public function loginAdminView($email,$pass)
    {
        $sql = "SELECT * FROM funcionario WHERE email = :email and senha = :senha";

        try{

            $stmt = parent::getConnection()->prepare($sql);
            $stmt->bindValue(":email",$email);
            $stmt->bindValue(":senha",$pass);
            $stmt->execute();
            return $stmt;
        } catch(\PDOException $ex){
            echo $ex->getMessage() . " " . $ex->getLine();
        }
    }

    public function findById($ID)
    {
        $sql = "SELECT * FROM `produto` INNER JOIN categoria on 
            produto.categoria_ID = categoria.ID WHERE produto.ID = :ID";

        try{
            
            $stmt = parent::getConnection()->prepare($sql);
            $stmt->bindValue(":ID",$ID);
            $stmt->execute();
            return $stmt;

        } catch(\PDOException $ex){
            echo $ex->getMessage();
        }
    }

}