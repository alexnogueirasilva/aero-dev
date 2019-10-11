<?php

namespace App\Lib;

class Exportar
{
	public function exportarJSON($dataSet){
		return json_encode($dataSet);
	}
}