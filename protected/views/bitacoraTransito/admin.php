

<h1>Seguimiento de paqueteria</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<!--div class="search-form" style="display:none">
	<?php //$this->renderPartial('_search',array('model'=>$model,)); ?>
</div--><!-- search-form -->

<?php $this->widget('booster.widgets.TbGridView',array(
'id'=>'bitacora-transito-grid',
'type' => 'striped bordered condensed',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id_transito',
		'fksede_salida',
		'fksede_llegada',
		'fecha_llegada',
		'fecha_salida',
		'fk_despacho',
		'peso_salida',
		'peso_llegada',
		'id_fkestatus',
		/*
		'create_date',
		'modified_date',
		*/
array(
'class'=>'booster.widgets.TbButtonColumn',
),
),
)); ?>
