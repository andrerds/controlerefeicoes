 <?php
 require '../../banco/conexao.php';
 require 'crud.php';
$acao = filter_input(INPUT_POST, 'acao', FILTER_SANITIZE_STRING);
switch ($acao) {
    case 'form_cad':
        ?>
   <div class="retorno"></div>
   <form action="" name="form_cad" method="post">
  <div class="ui-field-contain">
   <label for="text-14">Adicionar:</label>
   <input data-mini="true" name="anota" id="text-14" type="text" placeholder="Anotação Personalizada">
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
	//$data_mysql =  $adm -> 	data; ;
	//$timestamp = strtotime($data_mysql); // Gera o timestamp de $data_mysql
	 ?>  
	 <tr class="btn-sm" >
         <!--td ><?php// echo $adm -> 	id; ?></th-->
         <td><a href="#"><?php echo $adm -> id; ?></a></td>
         <td ><img  height="30px" width="30px" src="<?php echo $adm -> img; ?>" /></td>
         <td><?php echo $adm -> anota; ?></td>
         <!--td><?php //echo date('d/m/Y', $timestamp); ?></td-->
         <td><button type="submit" id="btn_edit" data-id="<?php echo $adm -> id; ?>"  class="btn btn-warning btn-sm"><span class="minia-icon-pencil-2"></span> Editar</button>
		 <button type="submit" id="btn_del" data-id="<?php echo $adm -> id; ?>"  class="btn btn-danger btn-sm"><span class="minia-icon-trashcan"></span> Excluir</button>
		</td>
    	</tr>
 			<?php endforeach;
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
	  	 <label>Atualizar anotações</label>
    
    <div class="ui-field-contain">
         <label for="text-15">Anotação</label>
         <input data-clear-btn="true" data-mini="true" name="anota" id="anota" value="<?php echo $dados -> anota; ?>" type="text">
    </div>
       <input type="hidden" name="id" value="<?php echo $dados -> id; ?>" />
            
           
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
