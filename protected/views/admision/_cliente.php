<?php
 $baseUrl = Yii::app()->baseUrl;
 $numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.numeric.js');


Yii::app()->clientScript->registerScript('Cliente', "

    $(document).ready(function(){
         $('#Clientes_cedula_cliente').numeric();

         $('#Clientes_nacionalidad').focusout(function(){
                 var letra = $('#Clientes_nacionalidad').val();                 
                 var opciones = new Array(0,1,2);                
                 if(parseInt(letra) in opciones){                   
                   $('#Clientes_apellido_cliente').attr('readonly', false);
                 }else{          
                   $('#Clientes_apellido_cliente').val(''); 
                   $('#Clientes_apellido_cliente').attr('readonly', true);
                 }
    
          });
         
    }); ");


?>
<div  class="row">
    <div class="col-md-5">

        <?php   echo $form->labelEx($clientes, 'nacionalidad'); ?>
         <?php
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'padre =1 and hijo in(1,2,3,4)';
                    $criteria->order = 'hijo ASC';
                    echo $form->dropDownList($clientes, 'nacionalidad', CHtml::listData(Maestro::model()->findAll($criteria), 'hijo', 'descripcion'), 
                        array(
                        'title' => 'Seleccione Nacionalidad',
                        'class' => 'span9',                        
                        'prompt' => 'Cargando...'
                    ));
        ?>

       
    </div>
    <div class="col-md-5">
        
        <?php echo $form->textFieldGroup($clientes, 'cedula_cliente', array('class' => 'span5', ' onclick' => 'LimpiarCamposDiex("Persona_cedula","Persona_nombres","Persona_apellidos", "limpiar_campos")')); ?>
         <?php echo $form->error($clientes,'cedula_cliente'); ?>
        <span hidden="hidden" class="cargar"><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/loading.gif"); ?></span>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        
        <?php echo $form->textFieldGroup($clientes, 'nb_cliente', array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'readonly' => false)))); ?>
        <?php echo $form->error($clientes,'nb_cliente'); ?>
    </div>
    <div class="col-md-5">
        
        <?php echo $form->textFieldGroup($clientes, 'apellido_cliente', array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'readonly' => false)))); ?>
        <?php echo $form->error($clientes,'apellido_cliente'); ?>

    </div>
</div>
   