<?php 


namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\RepresentanteDAO;
use App\Models\Entidades\Representante;


class RepresentanteController extends Controller
{
    public function index()
    {
        $representanteDAO = new RepresentanteDAO();

        self::setViewParam('listarRepresentante,' ,$representanteDAO->listar());

        $this->render('/representante/index');

        Sessao::limpaMensagem();
    }

    public function cadastroRepresentante()
    {
        
    }
}

?>