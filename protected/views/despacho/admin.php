<?php


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('despacho-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Despachos Realizados</h1>
<div align="right">
<?php
$this->widget('booster.widgets.TbButton', array(
    'label' => 'Registrar Despacho',
    'context' => 'primary',
    'icon' => 'plus-sign',
    'id' => 'btnnuevo',
    'htmlOptions' => array(
			            'onclick' => 'document.location.href ="' . $this->createUrl('despacho/create') . '";'
			        )
));
?>
</div>
<?php // echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 
$Criteria = new CDbCriteria();

$this->widget('booster.widgets.TbGridView',array(
'id'=>'despacho-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_despacho',
		'tipo_despacho',
		'fk_transporte',
array(
'class'=>'booster.widgets.TbButtonColumn',
'header' => 'Acción',
'htmlOptions' => array('width' => '85', 'style' => 'text-align: center;'),
),
),
)); ?>
