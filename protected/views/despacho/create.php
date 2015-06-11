<?php

$this->menu=array(
array('label'=>'List Despacho','url'=>array('index')),
array('label'=>'Manage Despacho','url'=>array('admin')),
);
?>

<h1>Registro  Despacho</h1>
<?php   $this->widget(
        'booster.widgets.TbPanel', array(
        'title' => 'Informaci&oacute;n de Despacho',
        'context' => 'primary',
        'headerIcon' => 'barcode',
        'content' => $this->renderPartial('_form', array('model' => $model, 'envio' => $envio), true),
        )
); ?>

