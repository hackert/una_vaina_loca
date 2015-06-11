<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('nocturno-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Administrador Nocturnos</h1>


<div align="right">
<?php
$this->widget('booster.widgets.TbButton', array(
    'label' => 'Agregar Nocturnos',
    'context' => 'primary',
    'icon' => 'icon-list icon-white',
    'id' => 'btnnuevo',
    'url' => Yii::app()->createUrl("/Nocturno/create/")
));
?>

<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'nocturno-grid',
'dataProvider'=>$model->search(),
'type'=>'striped bordered condensed',
'filter'=>$model,
'columns'=>array(
	    array('name'=>'id_nocturno', 'header'=>'#'),
		'fecha_registro',
		'pernorta',
array(
'class'=>'booster.widgets.TbButtonColumn',
         'htmlOptions'=>array('style'=>'width: 10%'),
),
),
)); ?>
