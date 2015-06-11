<?php $form=$this->beginWidget('booster.widgets.TbActiveForm',array(
	'id'=>'nocturno-form',
	'enableAjaxValidation'=>false,
)); 

?>

<h4 class="note">Los campos con <span class="required">*</span> son requeridos.</h4><br><br>



<!--   ****************  Busqueda Avanzada    ****************  -->

<div class="well well-large">
 <h4 class="note"> Busqueda Avanzada del Vehiculo disponible para Asociar GPS</h4><br>
 <div class="row-fluid">
  <div class="span4">   
          <?php
                    $criteria = new CDbCriteria;
                    $criteria->order = 'descripcion ASC';
                    echo $form->dropDownListGroup($model, 'tipoveh', CHtml::listData(TipoVehiculo::model()->findAll($criteria), 'id_tipov', 'descripcion'), 
                        array(
                        'title' => 'Seleccione Tipo Vehiculo',
                        //'class' => 'span8 RedOnly',
                        'ajax' => array(
                            'type' => 'POST'
                        ),
                        'prompt' => 'Cargando...'
                    ));
               ?>
 </div>


<?php echo '<div class="span4"> '; 
          echo $form->textFieldGroup($model,'placa',array('class'=>'span5','maxlength'=>20));   
       
      echo "</div>";
?>
  
       <div class="span4">   
        <?php echo $form->textFieldGroup($model,'numrotulado',array('class'=>'span5','maxlength'=>20)); ?>  
       </div>
  </div>    <br> 
          
<?php
$this->widget('booster.widgets.TbButton', array(
    'context' => 'warning',
    'label' =>$model->isNewRecord ? 'Buscar' : 'Buscar',
    'icon' => 'icon-search icon-white',
    'size' => 'medium'
));
?>
</div>



<!--   ********************************************************  -->


<?php echo $form->errorSummary($model); ?>
     <div class="row-fluid">
       <div class="span6">   
	     <?php // echo $form->textFieldGroup($model,'fecha_registro',array('class'=>'span5')); ?>
         <!--   *********************************************** -->

<?php echo $form->labelEx($model,'fecha_registro',array('class'=>'span4','maxlength'=>15,)); ?>
<?php
if ($model->fecha_registro !='') {
    $model->fecha_registro = date('d-m-Y',strtotime($model->fecha_registro));
}

$this->widget('zii.widgets.jui.CJuiDatePicker', array(
    'model'=>$model,
    'attribute'=>'fecha_registro',
    'value'=>$model->fecha_registro,
    'language' => 'es',
    'htmlOptions' => array('disabled'=>true),
    'options'=>array(
    'autoSize'=>true,
    'defaultDate'=>$model->fecha_registro,
    'dateFormat'=>'dd-mm-yy',
    'buttonImage'=>Yii::app()->baseUrl.'/images/fecha.jpg',
    'buttonImageOnly'=>true,
    'buttonText'=>'Fecha',
    'selectOtherMonths'=>true,
    'showAnim'=>'slide',
    'showButtonPanel'=>true,
    'showOn'=>'button',
    'showOtherMonths'=>true,
    'changeMonth' => 'true',
    'changeYear' => 'true',
    'minDate'=>'date("Y-m-d")', //fecha minima
    'maxDate'=> "10Y",
    //fecha maxima
),
)); ?>
<?php echo $form->error($model,'fecha_registro'); ?>

 <!--  ******************************************  -->
       </div>
       <div class="span6">
	     <?php echo $form->checkBoxGroup($model,'pernorta'); ?>
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
            'onclick' => 'document.location.href ="' . $this->createUrl('Nocturno/admin/') . '";'
        )
    ));
    ?>

<!-- *********** -->
</div>

<?php $this->endWidget(); ?>
