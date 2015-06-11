<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('admision-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Admisión de Paquetes </h1>

<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); 
$Criteria = new CDbCriteria();
$Criteria->condition = "padre = 4";
?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
 <div align="right">
            <?php
                $this->widget('booster.widgets.TbButton', array(
                    'label' => 'Agregar Paquete',
                    'context' => 'primary',                    
                    'size' => 'small',
                    'icon' => 'plus-sign',
                    'htmlOptions' => array(
			            'onclick' => 'document.location.href ="' . $this->createUrl('admision/create') . '";'
			        )
                ));
            ?>
 </div>
<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'admision-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'cod_paquete',
		'peso_admision',
		'precio_admision',		
		'fecha_entrega',
		 array( 'name'  =>'articulo', 
		 	    'value' =>'$data->articulo0->descripcion',
	 	     'filter' => CHtml::listData(Maestro::model()->findAll($Criteria), 'id_maestro', 'descripcion'),
		),
		/*
		
		'es_activo',
		'fk_estatus',
		'create_date',
		'modified_by',
		'id_sede',
		'id_cliente',
		'empaque',
		'articulo',
		*/
	array(
		'class'=>'booster.widgets.TbButtonColumn',
		'header' => 'Acción',
		'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
		        
	),
),
)); ?>
