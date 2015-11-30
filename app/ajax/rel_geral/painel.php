 <?php
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');
require '../../banco/conexao.php';
require 'crud.php';
date_default_timezone_set('Brazil/East');
$data_atual = date("Y-m-d");

// Data atual 19/07/2014
$data_mes = date("d/m/Y");

// Explode a barra e retorna três arrays
$data_mes = explode("/", $data_mes);

// Cria três variáveis $dia $mes $ano
list($dia, $mes, $ano) = $data_mes;

// Recria a data invertida
$data_mes = "$mes"; // atualizado em 19/08/2013
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
switch ($acao) {
    case 'form_cad':
        ?>
   	<div class="retorno"></div>
   <form action="" name="form_cad" method="post">
   
   <div class="ui-field-contain">
   <label for="text-14">Total de ml:</label>
   <?php
   $pdo = conecta();
   $preparar = $pdo->query("SELECT SUM(ml)AS ml_total FROM tb_registro WHERE data= '$data_atual' ");
    $totaldeml = $preparar->fetch(PDO::FETCH_OBJ);
    foreach ($totaldeml as $total_ml):
        $tml = $total_ml;
   ?>
   <input data-mini="true" name="tml" id="text-14" value="<?php echo $tml?>" type="text">
   
   <?php
   endforeach;
    ?>
   
    </div>
    <div class="ui-field-contain">
         <label for="text-15">Data: </label>
         <input data-clear-btn="true" data-mini="true" name="data" id="text-15" value="<?php echo $data_atual; ?>" type="text">
    </div>
     <input   name="mes"  value="<?php echo $data_mes; ?>">
   	 <input   name="ano" id="text-15" value="<?php echo $ano; ?>">
    
   <div class="modal-footer">
     	<img src="../img/loading.gif" class="load" alt="Carregando" style="display: none" />
        <button type="submit" class="btn btn-info">Cadastrar</button>
   
        <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
      </div>
    </form>
      <?php
         break;
		case 'listar': //listando 
		if (listar()): 
		$admin = listar();
		foreach($admin as $adm):
		$data_mysql =  $adm -> 	data;
		$timestamp = strtotime($data_mysql); // Gera o timestamp de $data_mysql
		?>
		
		 		<tr class="small" >
               <!--td ><?php// echo $adm -> 	id; ?></th-->
                <td><a href="#" id="btn_edit_rel_diario" data-id="<?php echo $adm->id; ?>"><?php echo $adm -> 	id; ?></a></td>
                <td><?php echo $adm -> tml; ?></td>
               	<td><?php echo date('M', $timestamp); ?></td>
				<td><?php echo $adm -> data; ?></td>
				<td><?php echo $adm -> ano; ?></td>
                <!--td><?php //echo date('d/m/Y', $timestamp); ?></td-->
                <td><button type="submit" id="b_e_tml_d" data-id="<?php echo $adm->id; ?>"  class="btn btn-warning btn-sm"><span class="minia-icon-pencil-2"></span> Editar</button>
					<button type="submit" id="b_d_tml_d" data-id="<?php echo $adm->id; ?>"  class="btn btn-danger btn-sm"><span class="minia-icon-trashcan"></span> Excluir</button>
</td>
    </tr>
 			<?php
			endforeach;
			else :
			endif;
			break;
// case formulario editar
 
						
		case 'form_edit': 
		$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
		$dados = (pegarid($id));	 
		?>      
        <div class="retorno"></div>
        <form action="" name="form_edit" method="post">
     	<label>Atualizar Registros</label>
    
    <div class="ui-field-contain">
         <label for="text-15">Quant. Ml</label>
         <input data-clear-btn="true" data-mini="true" name="tml" id="text-15" value="<?php echo $dados->tml; ?>" type="text">
    </div>
    <div class="ui-field-contain">
     <label for="search-9">Data :</label>
    
     <input data-role="date" data-clear-btn="true" data-mini="true" name="data" id="text-15" value="<?php echo $dados->data; ?>" type="text">
    </div>
    <div class="ui-field-contain">
    <label for="textarea-14">mes :</label>
    <input data-clear-btn="true" data-mini="true" name="mes" id="text-15" value="<?php echo $dados->mes; ?>" type="text">
    </div>    
     <div class="ui-field-contain">
    <label for="textarea-14">ano :</label>
    <input data-clear-btn="true" data-mini="true" name="ano" id="text-15" value="<?php echo $dados->ano; ?>" type="text">
    </div> 
	          
	 <input type="hidden" name="id" value="<?php echo $dados->id; ?>" />
            
       <div class="modal-footer">
     	<img src="../img/loading.gif" class="load" alt="Carregando" style="display: none" />
         <button type="submit" class="btn btn-info">Editar</button>
   
        <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
      </div>
             
             
             
            </form>
      <?php
      break;
	  ///
     	
   	  default:
		  echo 'Nada';
          break;
}