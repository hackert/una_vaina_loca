<?php
$this->breadcrumbs=array(
	'Marcas',
);


<h1>Marcas</h1>

<?php $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
