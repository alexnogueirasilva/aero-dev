<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;

class UsuarioDAO extends BaseDAO
{
    public function verificaEmail($email)
    {
        try {

            $resultado = $this->select(
                "SELECT * FROM usuarios WHERE email = '$email' "
            );

            $dado = $resultado->fetch();

            if ($dado) {

            $usuario = new Usuario();
            
                $usuario->setEmail($dado['email']);
                return $usuario;
            }           
        } catch (Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function listar($id = null)
    {

        if ($id) {
            $pwd = sha1($Password);

            $resultado = $this->select(
                "SELECT u.id, u.nome, u.nivel, u.email, u.status, u.dataCadastro, u.valida, u.dica, u.senha, u.fk_idInstituicao,
                d.id aS idDep, d.nome AS nomeDep FROM usuarios AS u 
                INNER JOIN instituicao AS i on i.inst_codigo = u.fk_idInstituicao
                INNER JOIN departamentos AS d on d.id = u.id_dep where u.id ='" . $id . "'"
            );
            $dado = $resultado->fetch();

            if ($dado) {
                $usuario = new Usuario();
                $usuario->setId($dado['id']);
                $usuario->setNome($dado['nome']);
                $usuario->setNivel($dado['nivel']);
                $usuario->setEmail($dado['email']);
                $usuario->setId_dep($dado['id_dep']);
                $usuario->setStatus($dado['status']);
                $usuario->setDataCadastro($dado['dataCadastro']);
                $usuario->setValida($dado['valida']);
                $usuario->setDica($dado['dica']);
                $usuario->setSenha($dado['senha']);
                $usuario->setFk_Instituicao($dado['fk_idInstituicao']);
                $usuario->getDepartamento()->setId($dado['idDep']);
                $usuario->getDepartamento()->setNome($dado['nomeDep']);

                return $usuario;
            }
        } else {

            $resultado = $this->select(
                "SELECT u.id, u.nome, u.nivel, u.email, u.status, u.dataCadastro, u.valida, u.dica, u.senha, u.fk_idInstituicao,
                    d.id aS idDep, d.nome AS nomeDep
                     FROM usuarios AS u 
                    INNER JOIN instituicao AS i on i.inst_codigo = u.fk_idInstituicao
                    INNER JOIN departamentos AS d on d.id = u.id_dep ORDER BY u.nome ASC"
            );
            $dados = $resultado->fetchAll();

            if ($dados) {

                $lista = [];

                foreach ($dados as $dado) {
                    $usuario = new Usuario();
                    $usuario->setId($dado['id']);
                    $usuario->setNome($dado['nome']);
                    $usuario->setNivel($dado['nivel']);
                    $usuario->setEmail($dado['email']);
                    $usuario->setId_dep($dado['id_dep']);
                    $usuario->setStatus($dado['status']);
                    $usuario->setDataCadastro($dado['dataCadastro']);
                    $usuario->setValida($dado['valida']);
                    $usuario->setDica($dado['dica']);
                    $usuario->setSenha($dado['senha']);
                    $usuario->setFk_Instituicao($dado['fk_idInstituicao']);
                    $usuario->getDepartamento()->setId($dado['idDep']);
                    $usuario->getDepartamento()->setNome($dado['nomeDep']);

                    $lista[] = $usuario;
                }
                return $lista;
            }
            return false;
        }
    }


    public  function salvar(Usuario $usuario) {
        try {
            $nome          = $usuario->getNome();
            $email      = $usuario->getEmail();
            $senha      = $usuario->getSenha();
            $pwd        = sha1($senha);
            $nivel      = $usuario->getNivel();
            $idDep      = $usuario->getId_dep();
            $status      = $usuario->getStatus();
            $fk_instituicao  = $usuario->getFk_Instituicao();
            $dataCadastro      = $usuario->getDataCadastro();
            $dataCadastro1  = $dataCadastro->format('y-m-d h:m:s');
            $valida         = $usuario->getValida();
            $validamd5      = sha1($valida);
            $dica           = $usuario->getDica();
            return $this->insert(
                'usuarios',
                ":nome, :email, :senha, :nivel, :id_dep,
                :status, :fk_idInstituicao , :dataCadastro,
                :valida, :dica",
                [
                    ':nome' => $nome,
                    ':email' => $email,
                    ':senha' => $pwd,
                    ':nivel' => $nivel,
                    ':id_dep' => $idDep,
                    ':status' => $status,
                    ':fk_idInstituicao' => $fk_instituicao,
                    ':dataCadastro' => $dataCadastro1,
                    ':valida' => $validamd5,
                    ':dica' => $dica
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ", 500);
        }
    }

    public  function atualizar(Usuario $usuario)
    {
        try {

            $id             = $usuario->getId();
            $nome          = $usuario->getNome();
            $email      = $usuario->getEmail();
           // $senha      = $usuario->getSenha();
           // $pwd        = sha1($senha);
            $nivel      = $usuario->getNivel();
            $idDep      = $usuario->getId_dep();
            $status      = $usuario->getStatus();
            $fk_instituicao  = $usuario->getFk_Instituicao();
          //  $valida        = $usuario->getValida();
            //$validamd5 = sha1($valida);
            $dica        = $usuario->getDica();

            
            return $this->update(
                'usuarios',
                "nome = :nome, email =:email, nivel =:nivel, id_dep =:idDep,
                status =:status, fk_idInstituicao = :fk_instituicao, dica =:dica",
                [
                    ':id' => $id,
                    ':nome' => $nome,
                    ':email' => $email,
                   // ':senha' => $pwd,
                    ':nivel' => $nivel,
                    ':idDep' => $idDep,
                    ':status' => $status,
                    ':fk_instituicao' => $fk_instituicao,
                  //  ':valida' => $validamd5,
                    ':dica' => $dica,
                ],
                "id = :id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação de dados. ".$e, 500);
        }
    }

    public function excluir(Usuario $usuario)
    {
        try {
            $id = $usuario->getId();

            return $this->delete('usuarios', "id = $id");
        } catch (Exception $e) {

            throw new \Exception("Erro ao deletar", 500);
        }
    }
}
