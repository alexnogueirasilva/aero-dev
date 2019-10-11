<?php

namespace App\Lib;

use App\Lib\Conexao;

class Transacao {

	public function beginTransaction()
	{
		return Conexao::getConnection()->beginTransaction();
	}

	public function commit()
	{
		return Conexao::getConnection()->commit();
	}

	public function rollBack()
	{
		return Conexao::getConnection()->rollBack();
	}
	
}