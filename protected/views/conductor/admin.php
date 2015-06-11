<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('conductor-grid', {
data: $(this).serialize()
});
return false;
});
");
?>


<h1>Administrador Conductores</h1>

<div align="right">
<?php
$this->widget('booster.widgets.TbButton', array(
    'label' => 'Agregar Conductor',
    'context' => 'primary',
    'icon' => 'icon-list icon-white',
    'id' => 'btnnuevo',
    'url' => array('/admision/admin')
));
?>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'conductor-grid',
'type'=>'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		/* 'id_persona', */
		'nombre',
		'apellido',
		'nacionalidad',
		
		'cedula',
		/* 'tipo_trab', */
		/*
		'licencia',
		'grado',*/
		array( 'name'=>'fknacionalidad', 'value'=>'$data->fknacionalidad->descripcion' ),		
		'es_activo',
		
 array(
            'class'=>'booster.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 12%'),
        ),
),
)); ?>
