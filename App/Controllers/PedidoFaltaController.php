<?php
    
    
    namespace App\Controllers;
    
    use App\Lib\Sessao;
    use App\Models\Entidades\PedidoFalta;
    use App\Models\Entidades\Marca;
    use App\Models\Entidades\Cliente;
    
    use App\Models\DAO\PedidoFaltaDAO;
    use App\Models\DAO\ClienteDAO;
    
    use App\Services\ClienteLicitacaoService;
    use App\Services\PedidoFaltaService;
    use App\Services\FornecedorService;
    use App\Services\MarcaService;
    use App\Services\ProdutoService;

    
    class PedidoFaltaController extends Controller
    {
        public function  index($params)
        {
            $faltaCliente_cod = $params[0];
            $pedidofaltaService = new PedidoFaltaService();
            $pedidofalta = $pedidofaltaService->listar($faltaCliente_cod);
            
            $this->setViewParam('pedidofalta', $pedidofalta);
            $this->render('/pedidofalta/index');
            
            Sessao::limpaMensagem();
        }
        
        public function cadastro()
        {
            if(Sessao::existeFormulario())
            {
                $pedidoFalta = new PedidoFalta();
                $pedidoFalta->setFaltaClienteCod(Sessao::retornaValorFormulario('idFaltaCliente'));
                $pedidoFalta->setProposta(Sessao::retornaValorFormulario('proposta'));
                $pedidoFalta->setAFM(Sessao::retornaValorFormulario('AFM'));
                $pedidoFalta->setFkStatus(Sessao::retornaValorFormulario('status'));
                $pedidoFalta->setObservacao(Sessao::retornaValorFormulario('observacao'));
                $pedidoFalta->setDataFalta(Sessao::retornaValorFormulario('dataFalta'));
                
                $codCliente = Sessao::retornaValorFormulario('clienteLicitacao');
                $clienteLicitacaoServices = new ClienteLicitacaoService();
                $clienteLicitacao = $clienteLicitacaoServices->listar($codCliente)[0];
                $pedidoFalta->setFkCliente($clienteLicitacao);
                
            }else{
                
                $pedidoFalta = new PedidoFalta();
                
                
                $this->render('/pedidofalta/cadastro');
            }

        }
        
        public function editar()
        {
            $this->render('/pedidofalta/editar');
        }
        
        public function excluir()
        {
            $this->render('/pedidofalta/excluir');
        }
    }