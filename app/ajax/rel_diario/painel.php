 <?php 
 ini_set('display_errors', 1);
 ini_set('log_errors', 1);
 ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
 error_reporting(E_ALL);
//header('Access-Control-Allow-Origin: *');
////header('Access-Control-Allow-Methods: GET, POST');
require '../banco/conexao.php';
require 'crud.php';
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
switch ($acao) { 
    case 'form_cad':
        ?>
        <div class="retorno"></div>
        <form action="" name="form_cad" method="post">
  <div class="ui-field-contain">
   <label for="text-14">Refeição:</label>
   <input data-mini="true" name="refeicao" id="text-14" value="" type="text">
    </div>
    <div class="ui-field-contain">
         <label for="text-15">Quant. Ml</label>
         <input data-clear-btn="true" data-mini="true" name="ml" id="text-15" value="" type="text">
    </div>
    <div class="ui-field-contain">
     <label for="search-9">Data :</label>
    
     <input data-role="date" data-clear-btn="true" data-mini="true" name="data" id="text-15" value="" type="text">
    </div>
    <div class="ui-field-contain">
    <label for="textarea-14">Horas :</label>
    <input data-clear-btn="true" data-mini="true" name="horas" id="text-15" value="" type="text">
    </div>
  
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
			<tr>
               
                <td class="h6"><a href="#" id="btn_edit_rel_diario" data-id="<?php echo $adm->id; ?>"><?php echo $adm -> 	refeicao; ?></a></td>
                <td class="h6">     <?php echo $adm -> 	ml; ?></td>
				<td class="h6"><kbd><?php echo $adm -> 	horas; ?><kbd></td>
				<td class="h6">     <?php echo date('d-m-Y', $timestamp)." * ".$adm -> 	horas; ?></td>
                <!--td><?php //echo date('d/m/Y', $timestamp); ?></td-->
                <td class="h6"><button type="submit" id="btn_edit_rel_diario" data-id="<?php echo $adm->id; ?>"  class="btn btn-warning btn-sm"><span class="minia-icon-pencil-2"></span> Editar</button>
		 <button type="submit" id="btn_del_rel_diario"  data-id="<?php echo $adm->id; ?>"  class="btn btn-danger btn-sm"><span class="minia-icon-trashcan"></span> Excluir</button>
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
		//print_r($dados); 
		?>      
        <div class="retorno"></div>
        <form action="" name="form_edit" method="post">
 
   
		<?php require '../lib/funcoes.php'; ?>
        <div class="ui-field-contain"><div class="text-muted"><span>Anotação atual : </span> <span ><?php echo $dados->refeicao; ?></span> </div>
                     <label for="select-native-2">Anotação Selecione:  </label>
                   <span class="text-success"> Alterar por :</span>   
   
    <?php $ref = buscar('anotacoes');
		$e = new ArrayIterator($ref);
    ?>
    <select name="refeicao" id="select-native-2" data-mini="true">
      
    <?php while($e->valid()): ?>	
       <option value="<?php echo $e -> current() -> anota; ?>"> <?php echo $e -> current() -> anota; ?></option> 
       
         <?php $e -> next();
			endwhile;
 ?>
    </select>
     
    </div> <div data-role="controlgroup" data-type="horizontal" data-mini="true">
		 
		</div>

     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="ui-body ui-body-a ui-corner-all">
                                        <div class="header">
                                            <p class="pull-right">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Fechar</span>
                                                </button></p>
                                            <h4 class="modal-title" id="myModalLabel">BabyEat V3 Add/update</p> </h4>
                                        </div>
                                        <div class="modal-body"></div>  
                                    </div>
                                </div>
                            </div> 
   



   
    <div class="ui-field-contain">
         <label for="text-15">Quant. Ml</label>
         <input data-clear-btn="true" data-mini="true" name="ml" id="text-15" value="<?php echo $dados->ml; ?>" type="text">
    </div>
    <div class="ui-field-contain">
     <label for="search-9">Data :</label>
    
     <input data-role="date" data-clear-btn="true" data-mini="true" name="data" id="text-15" value="<?php echo $dados->data; ?>" type="text">
    </div>
    <div class="ui-field-contain">
    <label for="textarea-14">Horas :</label>
    <input data-clear-btn="true" data-mini="true" name="horas" id="text-15" value="<?php echo $dados->horas; ?>" type="text">
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