<?php 

namespace App\Models\DAO;

use App\Models\Entidades\Representante;


class RepresentanteDAO extends BaseDAO
{
    public function listar($codRepresentante = null)
    {
        if($codRepresentante)
        {
            $resultado = $this->select(
                "SELECT * FROM cadRepresentante WHERE codRepresentante = $codRepresentante"
            );

            return $resultado->fetch();
            if ($dado) {

                $representante = new Representante();
                
                $representante->setCodRepresentante($dado['codRepresentante']);
                $representante->setDataCadastro($dado['dataCadastro']);
                //date_format($date, 'Y-m-d H:i:s');
                $representante->setNomeRepresentante($dado['nomeRepresentante']);
                
             
                 return $pedido;
             }
        }else {
            $resultado = $this->select(
                "SELECT * FROM cadRepresentante ORDER BY nomeRepresentante"
            );
            $dados = $resultado->fetchAll();
            
            if ($dados) {

                $lista = [];

                foreach ($dados as $dado) {
                    $representante = new Representante();
                
                $representante->setCodRepresentante($dado['codRepresentante']);
                $representante->setDataCadastro($dado['dataCadastro']);
                //date_format($date, 'Y-m-d H:i:s');
                $representante->setNomeRepresentante($dado['nomeRepresentante']);
                             
                    $lista[] = $representante;
                }                
                return $lista;
        }
        }
        return false;
    }

    public function salvarRepresentante(Representante $representante)
    {
        try
        {
            $nomeRepresentante     = $representante->getNomeRepresentante();
            return $this->insert(
                'cadRepresentante',
                ":nomeRepresentante",
                [
                    ':nomeRepresentante'=>$nomeRepresentante
                ]
            );
        }catch (\Exception $e){
            throw new \Exception("Erro na gravação dos dados !", 500);
        }
    }

    public function atualizarRepresentante(Representante $representante)
    {
        try
        {
            $codRepresentante       = $representante->getCodRepresentante();
            $nomeRepresentante      = $representante->getNomeRepresentante();
            $statusRepresentante    = $representante->getStatusRepresentante();

            return $this->update(
                'cadRepresentante',
                "nomeRepresentante = :nomeRepresentante , statusRepresentante = :statusRepresentante",
                [
                    ':codRepresentante'     =>$codRepresentante,
                    ':nomeRepresentante'    =>$nomeRepresentante,
                    ':statusRepresentante'  =>$statusRepresentante
                ],
                "codRepresentante = :codRepresentante"
            );
        }catch (\Exception $e){
            throw new \Exception("Erro ao gravar dados", 500);
        }
    }

    public function excluirRepresentante(Representante $representante)
    {
        try
        {
            $codRepresentante = $representante->getCodRepresentante();

            return $this->delete('cadRepresentante', "codRepresentante = $codRepresentante");
        }catch (\Exception $e){
            throw new \Exception("erro ao gravar dados", 500);
        }
    }
}




?>