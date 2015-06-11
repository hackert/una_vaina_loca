<?php
 $baseUrl = Yii::app()->baseUrl;
 $numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.numeric.js');


 Yii::app()->clientScript->registerScript('destinatario', "

    $(document).ready(function(){     
         $('#Receptor_cedula_receptor').numeric();

         $('#Receptor_nacionalidad').focusout(function(){
                 var letra = $('#Receptor_nacionalidad').val();                 
                 var opciones = new Array(0,1,2);                
                 if(parseInt(letra) in opciones){                   
                   $('#Receptor_apellido_receptor').attr('readonly', false);
                 }else{          
                   $('#Receptor_apellido_receptor').val(''); 
                   $('#Receptor_apellido_receptor').attr('readonly', true);
                 }
    
          });


    }); ");


?>

<div  class="row">
    <div class="col-md-5">

        <?php   echo $form->labelEx($receptor, 'nacionalidad'); ?>
         <?php
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'padre =1 and hijo in(1,2,3,4)';
                    $criteria->order = 'hijo ASC';
                    echo $form->dropDownList($receptor, 'nacionalidad', CHtml::listData(Maestro::model()->findAll($criteria), 'hijo', 'descripcion'), 
                        array(
                        'title' => 'Seleccione Nacionalidad',
                        'class' => 'span13',
                        'ajax' => array(
                            'type' => 'POST'
                        ),
                        'prompt' => 'Cargando...'
                    ));
        ?>

       
    </div>
    <div class="col-md-5">
        <?php // echo $form->labelEx($clientes, 'cedula_cliente'); ?>
        <?php echo $form->textFieldGroup($receptor, 'cedula_receptor', array('class' => 'span5', ' onclick' => 'LimpiarCamposDiex("Persona_cedula","Persona_nombres","Persona_apellidos", "limpiar_campos")')); ?>
         <?php echo $form->error($receptor,'cedula_receptor'); ?>
        <span hidden="hidden" class="cargar"><?php echo CHtml::image(Yii::app()->request->baseUrl."/images/loading.gif"); ?></span>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <?php // echo $form->labelEx($clientes, 'nb_cliente'); ?>
        <?php echo $form->textFieldGroup($receptor, 'nb_receptor', array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'readonly' => false)))); ?>
        <?php echo $form->error($receptor,'nb_receptor'); ?>
    </div>
    <div class="col-md-5">
        <?php // echo $form->labelEx($clientes, 'apellido_cliente'); ?>
        <?php echo $form->textFieldGroup($receptor, 'apellido_receptor', array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5', 'readonly' => false)))); ?>
        <?php echo $form->error($receptor,'apellido_receptor'); ?>

    </div>
 


</div>

  