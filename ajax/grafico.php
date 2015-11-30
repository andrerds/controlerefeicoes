<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
// Estrutura basica do grafico
$grafico = array(
    'dados' => array(
    'cols' => array(
            array('type' => 'string', 'label' => 'Mês'),
            array('type' => 'string', 'label' => 'Quantidade'),
			//array('type' => 'number', 'label' => 'Data')
        ),  
        'rows' => array()
    ),
    'config' => array(
        'title' => 'Gráfico Babyeat.',
        'width' => 285,
        'height' => 280,
	 
        
        
    )
);

// Consultar dados no BD
/* 
 * 
 * SELECT DAY(data_venda) dia, COUNT(id) qtd 
FROM venda 
where year(data_venda) = 2012
and   month(data_venda) = 4
GROUP BY dia
 * */


//$sql = 'SELECT mes, COUNT(*) as tml FROM total_ml GROUP BY mes';
$pdo = new PDO('mysql:host=localhost;dbname=babyeat', 'root', '123');
$sql = 'SELECT * FROM total_mes GROUP BY total';
$stmt = $pdo->query($sql);

//$data_mysql =  $obj->mes;
//$timestamp = strtotime($data_mysql); // Gera o timestamp de $data_mysql

while ($obj = $stmt->fetchObject()) {
    $mes = $obj->mes;
    $m = strtotime($mes);
    $grafico['dados']['rows'][] = array('c' => array(
           // array('v' => $obj->data),
           array('v' => $obj->mes),
           array('v' => (int)$obj->total)
		 
		// array('v' => (int)$obj->data)
    ));
}

// Enviar dados na forma de JSON
header('Content-Type: application/json; charset=UTF-8');
echo json_encode($grafico, JSON_PRETTY_PRINT);
exit(0);