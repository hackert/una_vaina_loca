
<?php
$baseUrl = Yii::app()->baseUrl;
$validaciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/validaciones_bitacora.js');

?>
<p class="help-block" style="text-align: right">Los campos con<span class="required">*</span> son requeridos.</p>

<?php switch ($opc) { ?>
<?php case 1: ?>
<div class="col-md-12">
    <div class="row-fluid">
          <div class="col-md-3">
            
	<?php //echo $form->textFieldGroup($model,'fecha_llegada',array('class'=>'span5')); ?>
             <?php
        
        echo $form->datepickerGroup(
            $model, 'fecha_llegada', array(
            'onchange' => 'Fecha()',
            'readonly' => true,
            'class' => 'SoloNumero Bloquear Limpiar',
            'options' => array('language' => 'es', 'format' => 'dd/mm/yyyy','startView'=>0, 'minViewMode'=>0,  'todayBtn'=>'linked', 'weekStart'=> 0,'startDate'=>date("d/-2m/y") ,'endDate'=>date("d/m/Y")),
           // 'hint' => 'Por favor haga clic dentro del campo para desplegar el calendario..!!.',
            'prepend' => '<i class="glyphicon glyphicon-calendar"></i>',
            'beforeShowDay' => 'DisableDays',
                )
        );
        ?>
        </div>
        </div>
        </div>
<div class="col-md-12" style="margin-top: 24px;">
    <div class="row-fluid">
        <div class="col-md-3">
            
	<?php echo $form->textFieldGroup($model,'fk_despacho',array('widgetOptions'=>array('htmlOptions'=>array('class' => 'span5 Limpiar')))); ?>
        </div>
        <div class="col-md-3">
            
	<?php  echo $form->textFieldGroup($model,'peso_llegada',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5 Limpiar')))); ?>
        </div>
      
        <div class="form-actions col-md-3" style="margin-top: 24px;">
    
       <?php
            $this->widget('booster.widgets.TbButton', array(
                'context' => 'primary',
                'buttonType' => 'button',
                'label' => 'Agregar',
                'htmlOptions' => array(
                    'onClick' => 'var paquete =$("#BitacoraTransito_fk_despacho").val();
                                  var peso =$("#BitacoraTransito_peso_llegada").val();
                                  var fechaLlegada =$("#BitacoraTransito_fecha_llegada").val();
                                  AgregarPaquetes(paquete,peso, fechaLlegada);'                 
                                       ),
                'icon' => 'ok-sign white',
                'block' => true,
            ));
            ?>
         </div>
    </div >
	<?php echo $form->HiddenField($model,'fksede_llegada',array('class'=>'span5')); /*deberia ser con una sesion que capture el id de la oficina que esta registrando en ese momento*/?> 
</div>
   	<?php echo $form->HiddenField($model,'id_fkestatus',array('class'=>'span5')); ?>
	<?php echo $form->HiddenField($model,'create_date',array('class'=>'span5')); ?>


<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'EntradaPaquetes',
'type'=>'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'fk_despacho',
          array(
                'name' => 'fk_despacho', 'header' => 'Tipo Despacho',
                'value'=>'$data->fkDespacho->fkTipoDespacho->descripcion',
                'filter' => CHtml::listData(Maestro::model()->findAll('padre=:padre', array(':padre' => '5')), 'id_maestro', 'descripcion')
               ),
    

		'peso_llegada',
		//'fksede_llegada',
		'fecha_llegada',
    		'id_fkestatus',
		/*
		'fksede_salida',
		'fecha_salida',
		'modified_date',
		'peso_salida',
		*/
            array(
            'class' => 'booster.widgets.TbButtonColumn',
            'htmlOptions' => array('style' => 'width: 5%'),
            'header' => 'Acción',
            'template' => '{view}',
            'buttons' => array(
                'view' => array(
                    'label' => 'Ver Detalle',
                    'icon' => 'eye-open',
                    'visible'=> '$data->fkDespacho->tipo_despacho === 27',
                    'size' => 'medium',
                    'options' => array('style' => 'margin-left:17px;',),
                 //   'url' => '$this->grid->controller->createUrl("Recibidas/view", array("id"=>$data->resumen_r, "detalle"=>"2"))',
                   /* 'options' => array(
                        'style' => 'margin-left:17px;',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => "js:$(this).attr('href')",
                            'success' => 'function(data) { $("#verRecibida .modal-body p").html(data); $("#verRecibida").modal(); }'
                        ),
                    ),*/
                ),
//                'otro' => array(
//                    'label' => 'Exportar',
//                    'icon' => 'eye-open',
//                    'size' => 'medium',
//                    'options' => array('style' => 'margin-left:17px;',),
//                //   'url' => '$this->grid->controller->createUrl("Recibidas/view", array("id"=>$data->resumen_r, "detalle"=>"2"))',
//                ),
            ),
        ),
            ),
            )); ?>
    
            <?php break;?>


    <?php case 2: ?>
	<?php echo $form->textFieldGroup($model,'fksede_salida',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>

	<?php echo $form->textFieldGroup($model,'fecha_salida',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'modified_date',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
	<?php echo $form->textFieldGroup($model,'peso_salida',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    
            <?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'salida-grid',
'type'=>'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		//'id_transito',
		//'create_date',
		/*'id_fkestatus',
		'fksede_llegada',
		'fecha_llegada',
		'peso_llegada',
		*/
		'fksede_salida',
		'fecha_salida',
		'modified_date',
		'peso_salida',
		'fk_despacho',
		
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
            
            <?php break; ?>

<?php } ?>