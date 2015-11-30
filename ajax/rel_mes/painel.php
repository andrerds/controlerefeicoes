 <?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
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
 <?php
   $pdo = conecta();
   $listar = $pdo->query("SELECT total  FROM total_mes WHERE mes= '$data_mes'"); 
   $listar->fetchAll(PDO::FETCH_OBJ);
   
   ?>
    <div class="ui-field-contain">
         <label for="text-15">Quant. Ml</label>
         <input type="text" name="total" id="text-15" value="<?php echo $listar->total ?>">
    </div>
   
    <div class="ui-field-contain">
     <label for="search-9">Mês :</label>
     <input  name="mes" id="text-15" value="<?php echo $data_mes; ?>" type="text">
    </div>
     
    
   <input type="hidden" name="data" value="<?php echo date('Y-m-d') ?>" />
   <input type="hidden" name="ano" value="<?php echo date('Y') ?>" />
         
   <p class="pull-right">
  <button type="submit" class="btn btn-info">Cadastrar</button>
   <img src="../img/loading.gif" class="load" alt="Carregando" style="display: none" />
  </p>
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
               <!--td ><?php// echo $adm -> 	id; ?></th-->
                <td><a href="#" id="btn_edit_rel_diario" data-id="<?php echo $adm->id; ?>"><?php echo $adm ->id; ?></a></td>
                <td><kbd><?php echo $adm ->mes; ?><kbd></td>
                <td align="center"><?php echo $adm ->total; ?></td>
                <td align="center"><?php echo $adm ->data; ?></td>
				
				 
                <!--td><?php //echo date('d/m/Y', $timestamp); ?></td-->
                <td><button type="submit" id="btn_edit_rel_diario" data-id="<?php echo $adm->id; ?>"  class="btn btn-warning btn-sm"><span class="minia-icon-pencil-2"></span> Editar</button>
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
		?>      
        <div class="retorno"></div>
        <form action="" name="form_edit" method="post">
     	<label>Atualizar Registros</label>

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
         <input data-clear-btn="true" data-mini="true" name="total" id="text-15" value="<?php echo $dados->total; ?>" type="text">
    </div>
    <div class="ui-field-contain">
     <label for="search-9">Mês :</label>
    
     <input  name="mes" id="text-15" value="<?php echo $dados->mes; ?>" type="text">
    </div>
             
     <div class="ui-field-contain">
     <label for="search-9">Data :</label>
    
     <input data-role="date" data-clear-btn="true" data-mini="true" name="data" id="text-15" value="<?php echo $dados->data; ?>" type="text">
    </div> 
 <input type="hidden" name="id" value="<?php echo $dados->id; ?>" />
            
           <p class="pull-right">
            <button type="submit" class="btn btn-info">Editar</button>
             <img src="../img/loading.gif" class="load" alt="Carregando" style="display: none" />
             </p>
            </form>
      <?php
      break;
	  ///
     	
   	  default:
		  echo 'Nada';
          break;
}