 <?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 require '../funcoes/banco/conexao.php';
 require '../funcoes/crud/crud.php';
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
   <img src="css/images/ajax-loader.gif" class="load" alt="Carregando" style="display: none" />
  </p>
    </form>
      <?php
        break;
		case 'listar': //listando 
		if (listar()): 
		$admin = listar();
		foreach($admin as $adm):
		$data_mysql =  $adm -> 	data; ;
		$timestamp = strtotime($data_mysql); // Gera o timestamp de $data_mysql
		 


		?>
		
		 		<tr class="btn-sm" >
               <!--td ><?php// echo $adm -> 	id; ?></th-->
                <td><a href="#"><?php echo $adm -> 	refeicao; ?></a></td>
                <td><?php echo $adm -> 	ml; ?>ml</td>
                
				<td><kbd><?php echo $adm -> 	horas; ?><kbd></td>
				<td><?php echo $adm -> 	data; ?></td>
                <!--td><?php //echo date('d/m/Y', $timestamp); ?></td-->
                <td><button type="submit" id="btn_edit" data-id="<?php echo $adm->id; ?>"  class="btn btn-warning btn-sm"><span class="minia-icon-pencil-2"></span> Editar</button>
					<button type="submit" id="btn_del" data-id="<?php echo $adm->id; ?>"  class="btn btn-danger btn-sm"><span class="minia-icon-trashcan"></span> Excluir</button>
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
            <?php 
   $m2  = "Remédio Omeprazou";
   $m1  = "Mamadeira";
   $m3  = "Remédio Domperidona";
   $m4  = "Mamadeira c/ Neutrofer";
   $m5  = "Mamadeira c/ Adtil";
   $c   = "Evacuou";
   $slm   = "Suco de Laranja";
   $sm   = "Suco de Manga";
   $fruit = "Papinha de Frutas";
   ?>
     <label>Atualizar Registros</label>
   

<?php require '../funcoes/lib/funcoes.php'; ?>
<div class="ui-field-contain">
    <label for="select-native-2">Anotação :</label>
    <?php $ref = buscar('anotacoes');
		$e = new ArrayIterator($ref);
    ?>
    <select name="refeicao" id="select-native-2" data-mini="true">
    <?php while($e->valid()): ?>	
       <option value="<?php echo $e -> current() -> anota; ?>"><?php echo $e -> current() -> anota; ?></option> 
       
         <?php $e -> next();
			endwhile;
 ?>
    </select>
     
    </div> <div data-role="controlgroup" data-type="horizontal" data-mini="true">
		<a href="#" class="btn-default" id="janela">Add</a>
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
  <script src="js/setup.ajax.js"></script>




   
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
            
           <p class="pull-right">
            <button type="submit" class="btn btn-info">Editar</button>
             <img src="css/images/ajax-loader.gif" class="load" alt="Carregando" style="display: none" />
             </p>
            </form>
      <?php
      break;
	  ///
     	
   	  default:
		  echo 'Nada';
          break;
}