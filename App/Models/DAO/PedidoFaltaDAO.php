<?php
    
    
    namespace App\Models\DAO;
    
    use App\Models\Entidades\ClienteLicitacao;
    use App\Models\Entidades\PedidoFalta;
    use App\Models\Entidades\Produto;
    use App\Models\Entidades\Marca;
    use App\Models\Entidades\Cliente;
    
    
    
    class PedidoFaltaDAO extends BaseDAO
    {
        public function listar($faltaCliente_cod = null)
        {
            $SQL =
                "SELECT FC.faltaCliente_cod,
                       FC.proposta,
                       FC.AFM,
                       FC.observacao,
                       FC.dataFalta,
                       CL.nomefantasia,
                       MF.marcanome,
                       SF.nomeStatus
                
                        FROM faltaCliente FC
                        inner join clienteLicitacao CL on CL.licitacaoCliente_cod = FC.fk_cliente
                        inner join marca MF on MF.marcacod = FC.fk_marca
                        inner join statusFalta SF on SF.faltaStatus_cod = FC.fk_status ";
            if($faltaCliente_cod)
            {
                $SQL.= 'WHERE FC.faltaCliente_cod';
            }
            
            $resultado = $this->select($SQL);
            $dataSetFaltas = $resultado->fetchAll();
            $listaFaltas = [];
            
            foreach ($dataSetFaltas as $dataSetFalta)
            {
                $pedidofalta = new PedidoFalta();
                $pedidofalta->setFaltaClienteCod($dataSetFalta['idfalta']);
                $pedidofalta->setAFM($pedidofalta['afm']);
                $pedidofalta->setFkCliente($pedidofalta['fkcliente']);
                $pedidofalta->setFkMarca($pedidofalta['fkmarca']);
                $pedidofalta->setProposta($pedidofalta['fkproduto']);
                $pedidofalta->setProposta($dataSetFalta['propodta']);
                $listaFaltas[] = $pedidofalta;
            }
            return $listaFaltas;
        }
        public function salvar(PedidoFalta $pedidoFalta)
        {
            try
            {
                $cliente        = $pedidoFalta->getFkCliente()->getCodCliente();
                $marca          = $pedidoFalta->getFkMarca();
                $status         = $pedidoFalta->getFkStatus();
                $afm            = $pedidoFalta->setAFM();
                
                return $this->insert(
                    'faltaCliente',
                    ':faltaCliente_cod,:fk_marca, :status, afm',
                    [
                        ':faltaCliente_cod' => $cliente,
                        'fk_marca'          => $marca,
                        'fk_status'         => $status,
                        'afm'               => $afm
                        
                    ]
                );
            }
            catch (\Exception $e){
                throw new \Exception('Erro ao gravar falta! ');
            }
        }
        
        public function addProduto( PedidoFalta $pedidoFalta)
            {
                try
                {
                    $produtos = $pedidoFalta->getFkProduto();
                    if(isset($produtos)){
                        foreach ($produtos as $produto){
                            $this->insert(
                                'prdutofalta',
                                ":FK_IDPRODUTO, :FK_FALTACLIENTE",
                                [
                                    ':FK_IDPRODUTO'     =>$pedidoFalta->getFkProduto(),
                                    ':FK_FALTACLIENTE'  =>$pedidoFalta->getFaltaClienteCod()
                                ]
                            );
                        }
                    }
                    return false;
                }
                catch (\Exception $e){
                    throw new \Exception("Erro na gravação de dados !", 500);
                }
            }
    }