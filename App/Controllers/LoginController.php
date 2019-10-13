<?php 

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\LoginDAO;
use App\Models\Entidades\Login;
use App\Models\Entidades\home;

class LoginController extends Controller
{
    public function index()
    {       

        $this->renderLogin('/login/index');
    }

    public function autenticar(){

        $email = $_POST['email'];
        $Password = $_POST['password'];
                
        $loginDAO = new loginDAO();
        $login = $loginDAO->autenticar($email, $Password);
           
        if(!$login){          
            session_destroy();
            Sessao::gravaMensagem("Login inexistente");
            $this->redirect('/login');   //Se a consulta não retornar nada é porque as credenciais estão erradas   
        }else{           
            if(!isset($_SESSION)) 	//verifica se há sessão aberta		
            session_start();		//Inicia seção                    
            //Abrindo seções
           
            self::setViewParam('Login',$login);
            
            //$_SESSION['nomeUsuario']=$vf['nome'];
            $_SESSION['id'] = $login->getCodUsuario();
            $_SESSION['email'] = $login->getEmailLogin();
            $_SESSION['nome'] = $login->getNomeLogin();
            $_SESSION['senha'] = $login->getPassoword();
            $_SESSION['idInstituicao'] = $login->getFk_Instituicao();
         
           echo $_SESSION['id']." - " . $_SESSION['nome']. " - ". $_SESSION['email']." - ".$_SESSION['senha']." - ". $_SESSION['idInstituicao'] ; 

            date_default_timezone_set("Brazil/East");
            $tempolimite = 3600;// duracao da sessao 1:00H
            $_SESSION['registro'] = time(); // armazena o momento em que autenticado ou atualiza a pagina//
            $_SESSION['limite'] = $tempolimite; 
            $this->redirect('/');   
            exit;	
        }
        Sessao::limpaMensagem();
    }

}


?>