<?php
    
    
    namespace App\Services;
    
    use App\Lib\Sessao;
    use App\Lib\Transacao;

    use App\Models\DAO\ClienteDAO;
    use App\Models\DAO\MarcaDAO;
    use App\Models\DAO\PedidoFaltaDAO;

    use App\Models\DAO\StatusDAO;
    use App\Models\Entidades\Cliente;
    use App\Models\Entidades\Fornecedor;
    use App\Models\Entidades\PedidoFalta;
    use App\Models\Entidades\Status;
    use App\Models\Entidades\Produto;
    use App\Models\Entidades\Marca;
    
    use App\Models\Validacao\PedidoFaltaValidador;
    
    
    class PedidoFaltaService
    {
        public function listar($faltaCliente_cod = null)
        {
            $pedidofaltaDAO = new PedidoFaltaDAO();
            return $pedidofaltaDAO->listar($faltaCliente_cod);
        }
        
        public function editar( PedidoFaltaa $pedidoFalta)
        {
            $pedidofaltaValidador = new PedidoFaltaValidador();
            $resultadoValidacao = $pedidofaltaValidador->validador($pedidoFalta);
            
            if($resultadoValidacao->getErros()){
                Sessao::gravaErro($resultadoValidacao->getErros());
                return false;
            }else{
                try {
                    $transacao = new Transacao();
                    $transacao->beginTransaction();
                    
                    $clienteDAO = new ClienteDAO();
                    $clienteDAO->excluir();
                    
                    $marcaDAO = new MarcaDAO();
                    $marcaDAO->excluir();
                    
                    $statusDAO = new StatusDAO();
                    $statusDAO->excluir();
                    
                    $pedidofaltaDAO = new PedidoFaltaDAO();
                    $pedidofaltaDAO->addProduto($pedidoFalta);
                    
                    
                    
                    $transacao->commit();
                    
                    Sessao::limpaFormulario();
                    Sessao::limpaMensagem();
                    Sessao::gravaMensagem("Nova Falta cadastrada com Sucesso !");
                    return true;
                    
                }catch (\Exception $e){
                    Sessao::gravaErro(['Erro ao gravar vaga']);
                    $transacao->rollBack();
                    return false;
                }
            }
        }
        
    }