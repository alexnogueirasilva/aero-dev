<?php

namespace App\Models\DAO;

use App\Models\Entidades\Produto;

class ProdutoDAO extends BaseDAO
{
    public  function listar($proCodigo = null)
    {
        if ($proCodigo) {
            $resultado = $this->select(
                "SELECT * FROM Produto p
                inner join marca m on m.marcacod = p.ProMarca
                inner join fornecedor f on f.fornecedor_cod= p.ProFornecedor
                inner join usuarios u on u.id = p.ProUsuario WHERE p.ProCodigo = $proCodigo"
            );

            $dado = $resultado->fetch();
            if ($dado) {
                $produto = new Produto();
                $produto->setProCodigo($dado['ProCodigo']);
                $produto->setProNome($dado['ProNome']);
                $produto->setProNomeComercial($dado['ProNomeComercial']);
                $produto->setProDataAlteracao($dado['ProDataAlteracao']);
                $produto->setProDataCadastro($dado['ProDataCadastro']);
                $produto->getProMarca($dado['ProMarca']);
                $produto->getMarca()->setMarcaCod($dado['marcacod']);
                $produto->getMarca()->setMarcaNome($dado['nome_Marca']);
                $produto->setProFornecedor($dado['ProFornecedor']);
                $produto->getFornecedor()->setFornecedor_Cod($dado['fornecedor_cod']);
                $produto->getFornecedor()->setForNomeFantasia($dado['nomefantasia']);
                $produto->getFornecedor()->setForRazaoSocial($dado['razaosocial']);
                $produto->getFornecedor()->setForCnpj($dado['CNPJ']);
                $produto->getUsuario($dado['ProUsuario']);
                $produto->getUsuario()->setNome($dado['nome']);
                $produto->getUsuario()->setEmail($dado['email']);

                return $produto;

            }
        } else {

            $resultado = $this->select(
                "SELECT * FROM Produto p
                inner join marca m on m.marcacod = p.ProMarca
                inner join fornecedor f on f.fornecedor_cod= p.ProFornecedor
                inner join usuarios u on u.id = p.ProUsuario "
            );
            $dados = $resultado->fetchAll();

            if ($dados) {

                $lista = [];
                foreach ($dados as $dado) {

                    $produto = new Produto();
                    $produto->setProCodigo($dado['ProCodigo']);
                    $produto->setProNome($dado['ProNome']);
                    $produto->setProNomeComercial($dado['ProNomeComercial']);
                    $produto->setProDataAlteracao($dado['ProDataAlteracao']);
                    $produto->setProDataCadastro($dado['ProDataCadastro']);
                    $produto->setProMarca($dado['ProMarca']);
                    $produto->getMarca()->setMarcaCod($dado['marcacod']);
                    $produto->getMarca()->setMarcaNome($dado['nome_Marca']);
                    $produto->setProFornecedor($dado['ProFornecedor']);
                    $produto->getFornecedor()->setFornecedor_Cod($dado['fornecedor_cod']);
                    $produto->getFornecedor()->setForNomeFantasia($dado['nomefantasia']);
                    $produto->getFornecedor()->setForRazaoSocial($dado['razaosocial']);
                    $produto->getFornecedor()->setForCnpj($dado['CNPJ']);

                    $lista[] = $produto;
                }
                return $lista;
            }

            return false;
        }
    }
    
    public function listarPorProduto($codCliente = null)
    {
        if($codCliente)
        {
            $resultado = $this->select(
                "SELECT P.ProCodigo,P.ProNome FROM faltaporcliente FP INNER JOIN Produto P on FP.FK_IDPRODUTO = P.ProCodigo WHERE FK_ID_FALTACLIENTE = $codCliente"
            );
        }
        return $resultado->fetchAll(\PDO::FETCH_CLASS, Produto::class);
    }

    public  function salvar(Produto $produto)
    {
        try {

            $proNome           = $produto->getProNome();
            $proNomeComercial          = $produto->getProNomeComercial();
            $proFornecedor          = $produto->getProFornecedor();
            $proMarca          = $produto->getProMarca();
            $proUsuario          = $produto->getProUsuario();
            $date     = $produto->getProDataAlteracao();
            $date1     = $produto->getProDataCadastro();
            $proDataCadastro =   date_format($date1, 'Y-m-d H:i:s');
            $proDataAlteracao =   date_format($date, 'Y-m-d H:i:s');

            return $this->insert(
                'Produto',
                ":proNome,:proNomeComercial,:proFornecedor,:proMarca,:proUsuario,:proDataAlteracao,:proDataCadastro",
                [
                    ':proNome' => $proNome,
                    ':proNomeComercial' => $proNomeComercial,
                    ':proFornecedor' => $proFornecedor,
                    ':proMarca' => $proMarca,
                    ':proUsuario' => $proUsuario,
                    ':proDataAlteracao' => $proDataAlteracao,
                    ':proDataCadastro' => $proDataCadastro
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. " . $e, 500);
        }
    }
    
    public  function atualizar(Produto $produto)
    {
        try {
            
            $proCodigo         = $produto->getProCodigo();
            $proNome           = $produto->getProNome();
            $proNomeComercial          = $produto->getProNomeComercial();
            $proFornecedor          = $produto->getProFornecedor();
            $proMarca          = $produto->getProMarca();
            $proUsuario          = $produto->getProUsuario();
            $date               = $produto->getProDataAlteracao();
            $proDataAlteracao =   date_format($date, 'Y-m-d H:i:s');

            return $this->update(
                'Produto',
                "proNome = :proNome, proNomeComercial = :proNomeComercial, proFornecedor = :proFornecedor, proMarca = :proMarca, proUsuario = :proUsuario, proDataAlteracao = :proDataAlteracao",
                [
                    ':proCodigo' => $proCodigo,
                    ':proNome' => $proNome,
                    ':proNomeComercial' => $proNomeComercial,
                    ':proFornecedor' => $proFornecedor,
                    ':proMarca' => $proMarca,
                    ':proUsuario' => $proUsuario,
                    ':proDataAlteracao' => $proDataAlteracao,                    
                ],
                "proCodigo = :proCodigo"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ".$e, 500);
        }
    }

    public function excluir(Produto $produto)
    {
        try {
            $proCodigo = $produto->getProCodigo();

            return $this->delete('Produto', "proCodigo = $proCodigo");
        } catch (Exception $e) {

            throw new \Exception("Erro ao deletar", 500);
        }
    }

}
