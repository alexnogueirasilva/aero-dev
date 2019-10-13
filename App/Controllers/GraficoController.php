<?php
    
    
    namespace App\Controllers;
    
    use App\Lib\Sessao;
    use App\Models\DAO\GraficoDAO;
    use App\Models\Entidades\Grafico;
    
    class GraficoController extends Controller
    {
    
        /**
         *
         */
        public function index()
        {
            $graficoDAO = new GraficoDAO();
            
            
            $this->render('/grafico/index');
            
            Sessao::limpaMensagem();
        }
        
    }