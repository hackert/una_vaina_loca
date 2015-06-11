<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('envio-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administrador de Empaquetamiento</h1>
<div align="right">
<?php
$this->widget('booster.widgets.TbButton', array(
    'label' => 'Registrar Envio',
    'context' => 'primary',
    'icon' => 'plus-sign',
    'id' => 'btnnuevo',
    'htmlOptions' => array(
			            'onclick' => 'document.location.href ="' . $this->createUrl('envio/create') . '";'
			        )
));
?>
</div>

<?php //  echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'envio-grid',
'type'=>'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_envio',
		/* 'tipo_envio', */
		'cant_articulo',
		/* 'codigo_envio',
		'create_date',
		'modified_date', */
		
		'num_saca',
		'peso_total',
	
array(
'class'=>'booster.widgets.TbButtonColumn',
'header' => 'Acción',
'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
),
),
)); ?>
