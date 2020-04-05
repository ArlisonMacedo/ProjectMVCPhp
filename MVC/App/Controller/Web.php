<?php


namespace App\Controller;
use League\Plates;
use App\Models\Models;
use App\Models\Produto;
use App\Models\Funcionario;
use CoffeeCode\Router\Router;




    class Web {

        private $view ;
        public $email;
        public $senha;

        

        public function __construct() 
        {
            $this->view = \League\Plates\Engine::create(__DIR__ . "/../theme","php");
        }
        

        public function home(): void
        {
            $models = (new Models())->findAll();
            echo $this->view->render("home", [
                "title" => "#Loja-Vip | Site",
                "models" => $models
            ]);
        }

        public function newProduct(): void 
        {
            $categorias = (new Models())->findAllCategory();
            echo $this->view->render("newproduct", [
                "title" => "#Loja-Vip | Novo Produto",
                "categorias" => $categorias
            ]);
        }

        public function addNewProduct()
        {
            $produto = new Produto();
            $produto->setNome($_POST['nome']);
            $produto->setPreco($_POST['preco']);
            $produto->setQtd($_POST['qtd']);
            $produto->setCat_ID($_POST['categoria']);
            //$produto->setImage($_POST['image']);

            $model = (new Models())->createProduct($produto);
        }

        public function loginAdmin()
        {
            echo $this->view->render("loginAdmin", [
                "title" => "#Loja-Vip | Site"
            ]);
        }

        public function loginAdminRealase()
        {
            
            

            $func = new Funcionario();
            $func->setEmail($_POST['email']);
            $func->setSenha($_POST['password']);
            
            
            //echo $_SESSION['']
            
            if((new Models())->loginAdmin($func)){
                
                $_SESSION['telegram'] = $func->getEmail();
                $_SESSION['pass'] = $func->getSenha();

                header("location: http://localhost/MVC/dashboard");

                //$router = new Router(URL_BASE);
                //$router->redirect("/dashboard");
            }
        }
        
        public function dashboard()
        {
            
             $models = (new Models())->loginAdminView($_SESSION['telegram'],$_SESSION['pass']);
             echo $this->view->render("dashboard", [
                 "title" => "#Loja-Vip | dashboard",
                 "models" => $models
             ]);  

             //unset($_SESSION['telegram']) ; unset($_SESSION['pass']);

        }

        public function destroy()
        {
            session_start();
            session_destroy();

            //$router = new Router(URL_BASE);
            //$router->redirect("/");
            header("location: http://localhost/MVC");
        }

        public function seemore(array $uri)
        {
            $id = (new Models())->findById($uri['uri']);
            //echo $uri['uri'];
            echo $this->view->render("seemore", [
                "title" => "Produto | Loja Vip",
                "produto" => $id
            ]);
        }

        public function error(array $data): void
        {
            echo $this->view->render("error", [
                "title" => "error | Loja Vip",
                "error" => $data['errcode']
            ]);
        }


        /**
         * Get the value of senha
         */ 
        public function getPass()
        {
                return $this->senha;
        }

        /**
         * Set the value of senha
         *
         * @return  self
         */ 
        public function setPass($senha)
        {
                $this->senha = $senha;

                return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getTelegram()
        {
                return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setTelegram($email)
        {
                $this->email = $email;

                return $this;
        }
    }