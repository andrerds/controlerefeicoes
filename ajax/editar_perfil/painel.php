 <?php
 ini_set('display_errors', 1);
			ini_set('log_errors', 1);
			ini_set('error_log', dirname(__FILE__) . '/error_log.txt');
			error_reporting(E_ALL);
			
//header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Methods: GET, POST');
require '../../banco/conexao.php';
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
  
   <p class="pull-right">
  <button type="submit" class="btn btn-info">Cadastrar</button>
   <img src="../img/loading.gif" /> class="load" alt="Carregando" style="display: none" />
  </p>
    </form>
      <?php
        break;
		case 'listar': //listando 
		if (listar()): 
		$admin = listar();
		foreach($admin as $adm):
		//$data_mysql =  $adm -> 	data; ;
		//$timestamp = strtotime($data_mysql); // Gera o timestamp de $data_mysql
		 
 
		?>
		 		<tr>
		 		<td><a href="#" id="btn_edit_perfil"  data-id="<?php echo $adm->id; ?>">
 				<img src="https://graph.facebook.com/<?php echo $adm -> facebook; ?>/picture?type=square" alt="Matheus" class="img-rounded" width="45" height="45"></td>
               	<!--td class="info"><a href="#" id="btn_edit_perfil" 	data-id="<?php echo $adm->id; ?>"><?php echo $adm -> 	id; ?></td-->
                <td> <a href="#" id="btn_edit_perfil" data-id="<?php echo $adm->id ?>"> <?php echo $adm -> nome; ?></a> </td>
                <td><?php echo $adm -> 	sobrenome; ?> </td>
                <td> <?php echo $adm -> idade; ?> </td>
		 
                <!--td><?php //echo date('d/m/Y', $timestamp); ?></td-->
                <td><button type="submit" id="btn_edit_perfil" data-id="<?php echo $adm->id; ?>"  class="btn btn-warning btn-sm"><span class="minia-icon-pencil-2"></span> Editar</button>
					<button type="submit" id="btn_del_perfil" 	data-id="<?php echo $adm->id; ?>"  class="btn btn-danger btn-sm"><span class="minia-icon-trashcan"></span> Excluir</button>
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
        <form action="" name="form_edit" method="post" enctype="multipart/form-data">
     <div> 
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="ui-body ui-body-a ui-corner-all">
                                        <div class="header">
                                            <p class="pull-right">
                                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span>
                                                    <span class="sr-only">Fechar</span>
                                                </button></p>
                                            <h4 class="modal-title" id="myModalLabel">BabyEat  Add/update </h4>
                                        </div>
                                        <div class="modal-body"></div>  
                                    </div>
                                </div>
                            </div> 
  
    <div class="ui-field-contain">
         <label for="text-15">Nome </label>
         <input data-clear-btn="true" data-mini="true" name="nome" id="text-15" value="<?php echo $dados->nome; ?>" type="text">
    </div>
    <div class="ui-field-contain">
     <label for="search-9">Sobrenome </label>
    
     <input data-role="date" data-clear-btn="true" data-mini="true" name="sobrenome" id="text-15" value="<?php echo $dados->sobrenome; ?>" type="text">
    </div>
    <div class="ui-field-contain">
    <label for="textarea-14">Idade :</label>
    <input data-clear-btn="true" data-mini="true" name="idade" id="text-15" value="<?php echo $dados->idade; ?>" type="text">
    </div>    
     <div class="ui-field-contain">
    	<label for="textarea-14">Foto do face :</label>
    	<input type="image" src="https://graph.facebook.com/<?php echo $dados->facebook ?>/picture?type=square" alt="Matheus" class="img-rounded" width="50" height="50" />
      </div>
     <div class="ui-field-contain">
   	 <label for="textarea-14">Perfil Facebook:</label>
    <input data-clear-btn="true" data-mini="true" name="facebook" id="text-15" value="<?php echo $dados->facebook; ?>" type="text">
     </div>
   <div class="ui-field-contain">
    <p class="alert alert-warning">Adicione seu nome do facebook exemplo: http://facebook.com/<strong class="text-danger"><?php echo $dados->facebook; ?></strong></p>
    <p class="alert alert-danger text-warning">Observe que foi apenas adicionado o ultimo nome depois da barra  ( / )  <strong class="text-danger">
    	
    <a href="https://facebook.com/<?php echo $dados->facebook; ?>" class="btn"><strong class="text-danger"><?php echo $dados->facebook; ?></strong></a>	
    	
 
    </p>
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