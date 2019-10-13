<?php
/**
 * filename: data.php
 * description: this will return the score of the teams.
 */

//setting header to json
header('Content-Type: application/json');

//database
/*define('DB_HOST', '127.0.0.1');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root123');
define('DB_NAME', 'mydb');
*/

define('DB_HOST', "localhost:3306.");
define('DB_NAME', "u325780549_fab_dev");
define('DB_USERNAME', "root");
define('DB_PASSWORD', "root");

//get connection
$mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

if(!$mysqli){
	die("Connection failed: " . $mysqli->error);
}

//query to get data from the table
$query = sprintf("SELECT con.codControle,s.nome as nomeStatus,c.nomeCliente,con.codCliente as cliente,con.valorPedido
FROM controlePedido AS con 
 INNER JOIN statusPedido AS s on s.codStatus = con.codStatus
 INNER JOIN cadRepresentante AS r on r.codRepresentante = con.codRepresentante
 INNER JOIN cliente AS c on c.codCliente = con.codCliente
 INNER JOIN instituicao AS i on i.inst_codigo = con.fk_idInstituicao
 ORDER BY con.codControle DESC");

//execute query
$result = $mysqli->query($query);
//loop through the returned data
$data = array();

foreach ($result as $row) {
	$data[] = $row;
}

//free memory associated with result
$result->close();

//close connection
$mysqli->close();

//now print the data
print json_encode($data);
