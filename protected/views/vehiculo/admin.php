<?php
$this->menu = array(
    array('label' => 'List Vehiculo', 'url' => array('index')),
    array('label' => 'Create Vehiculo', 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('vehiculo-grid', {
data: $(this).serialize()
});
return false;
});
");
?><h1 class="text-center">Administrador Vehiculos</h1>

<div align="right">
    <div align="right">
        <?php
        $this->widget('booster.widgets.TbButton', array(
            'label' => 'Agregar Vehiculo',
            'context' => 'primary',
            'size' => 'small',
            'icon' => 'plus-sign',
            'htmlOptions' => array(
                'onclick' => 'document.location.href ="' . $this->createUrl('Vehiculo/create') . '";'
            )
        ));
        ?>
    </div>
    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

    <?php
    $this->widget('booster.widgets.TbGridView', array(
        'id' => 'vehiculo-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            /* 'id_vehiculo', */
            'placa',
            'serial_carroseria',
            /* 'serial_motor', */
            'color',
            /* 'anio', */
            /*
              'transmision', */
            array('name' => 'tipov', 'value' => '$data->tipov0->descripcion'),
            /* 'tipov',  */
            /* array( 'name'=>'marca', 'value'=>'$data->marca0->descripcion' ), */
            /* 'marca', */
            /* 'rotulado',
              'numero',
              'logo',
             */
            array(
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 10%'),
            ),
        ),
    ));
    ?>
