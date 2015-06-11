<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'conductor-form',
	'enableAjaxValidation'=>false,
)); 


$baseUrl = Yii::app()->baseUrl;
$numeros = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/jquery.numeric.js');




Yii::app()->clientScript->registerScript('conductor-form', "
$(document).ready(function(){
         $('#Conductor_cedula').numeric();
         $('#Conductor_grado').numeric();
    });
");

?>
<h4 class="note">Los campos con <span class="required">*</span> son requeridos.</h4><br>

<?php echo $form->errorSummary($model); ?>

 
    <div class="row-fluid">
      <div class="span2">   
	      <?php // echo $form->textFieldGroup($model,'nacionalidad',array('class'=>'span2','maxlength'=>1)); ?>
         <!--   ***************************  -->
             <?php
                    $criteria = new CDbCriteria;
                    $criteria->condition = 'padre =1 and hijo > 0';
                    $criteria->order = 'descripcion DESC';
                    echo $form->dropDownListGroup($model, 'nacionalidad', CHtml::listData(Maestro::model()->findAll($criteria), 'hijo', 'descripcion'), 
                        array(
                        'title' => 'Seleccione Nacionalidad',
                        'class' => 'span13',
                        'ajax' => array(
                            'type' => 'POST'
                        ),
                        'prompt' => 'Cargando...'
                    ));
               ?>
        <!--   ***************************  -->
      </div>
      <div class="span3">
	      <?php echo $form->textFieldGroup($model,'cedula',array('class'=>'span9')); ?>
      </div>
      <div class="span6">
	      <?php // echo $form->textFieldGroup($model,'tipo_trab',array('class'=>'span2')); ?>
       <!--   ***************************  -->
           <?php echo $form->textFieldGroup($model,'nombre',array('class'=>'span7','maxlength'=>40)); ?>
     
        <!--   ***************************  -->
      </div>
    </div>
     <div class="row-fluid">
     <div class="span5">   
       <?php echo $form->textFieldGroup($model,'apellido',array('class'=>'span10','maxlength'=>40)); ?>
     </div>
     <div class="span5">
       <?php  // echo $form->textFieldGroup($model,'apellido',array('class'=>'span8','maxlength'=>40)); ?>
     </div>
    </div>
    <div class="row-fluid">
      <div class="span3">
    	<?php //echo $form->checkBoxGroup($model,'licencia'); ?>
        <?php  echo $form->radioButtonListGroup($model, 'licencia',array('1'=>'Si','0'=>'No')); ?>
     
        <?php //echo $form->labelEx($model,'licencia',array('class'=>'span5')); ?><br>
        <?php /*
           $this->widget('booster.widgets.TbToggleButton', array(
                            'model'=>$model,
                            'name'=>'licencia',
                            'onChange' => 'js:function($el, status, e){console.log($el, status, e);}',
                            'enabledLabel' => 'SI',
                            'disabledLabel' => 'NO',
                            'value'=>true,
                            'width'=>100,
                            'customEnabledStyle'=>array(
                                                          'background'=>'#FF00FF',
                                                          'gradient'=>'#D300D3',
                                                          'color'=>'#FFFFFF'
                                                        )                         
                        ));  */
        ?>

      </div>
     <div class="span3">
    	<?php echo $form->textFieldGroup($model,'grado',array('class'=>'span4','maxlength'=>1)); ?>        
     </div>
     <div class="span6">
	    <?php // echo $form->checkBoxGroup($model,'es_activo'); ?>
        <?php  echo $form->radioButtonListGroup($model, 'es_activo',array('1'=>'Activo','0'=>'Suspendido')); ?>        
  
     </div>
    </div>

<div class="form-actions">
	<!-- *********** -->
<?php
$this->widget('booster.widgets.TbButton', array(
    'buttonType' => 'submit',
    'context' => 'primary',
    'label' =>$model->isNewRecord ? 'Registrar' : 'Guardar',
    'icon' => 'icon-ok-sign icon-white',
    'size' => 'medium'
));
?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'reset',
        'context' => 'success',
        'label' => 'Limpiar',
        'size' => 'medium',
        'icon' => 'icon-remove',
            //'id' => 'GuardarForm'
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'danger',
        'label' => 'Cancelar',
        'size' => 'medium',
        'id' => 'CancelarForm',
        'icon' => 'icon-ban-circle',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('Conductor/admin/') . '";'
        )
    ));
    ?>

<!-- *********** -->
</div>

<?php $this->endWidget(); ?>
