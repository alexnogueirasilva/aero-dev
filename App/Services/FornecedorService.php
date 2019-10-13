<?php
    
    
    namespace App\Services;

    use App\Lib\Sessao;
    use App\Lib\Transacao;
    use App\Lib\Exportar;
    
    use App\Models\Entidades\Fornecedor;
    use App\Models\DAO\FornecedorDAO;
    
    
    class FornecedorService
    {
        public function listar($codFornecedor = null)
        {
            $fornecedorDAO = new FornecedorDAO();
            return $fornecedorDAO->listar($codFornecedor);
        }
    }