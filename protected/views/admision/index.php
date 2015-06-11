<?php
$this->breadcrumbs=array(
	'Registro de Paqueteria',
);

$this->menu=array(
array('label'=>'Create Admision','url'=>array('create')),
array('label'=>'Manage Admision','url'=>array('admin')),
);
?>

<h1>Admisions</h1>

<?php 

 $this->widget('booster.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
));  

   

/*   --------------  listado    ------------------ */

 
/*  ---------------------------------------------  */


?>
