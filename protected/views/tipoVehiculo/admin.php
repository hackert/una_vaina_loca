<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('tipo-vehiculo-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1 class="text-center">Administrador Tipo Vehiculos</h1>

<div align="right">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'label' => 'Agregar  Tipo Vehiculo',
        'context' => 'primary',
        'size' => 'small',
        'icon' => 'plus-sign',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('TipoVehiculo/create/') . '";'
        )
    ));
    ?>

    <div class="search-form" style="display:none">
        <?php
        $this->renderPartial('_search', array(
            'model' => $model,
        ));
        ?>
    </div><!-- search-form -->

    <?php
    $this->widget('booster.widgets.TbGridView', array(
        'id' => 'tipo-vehiculo-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            array('name' => 'id_tipov', 'header' => '#'),
            'descripcion',
            array(
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 10%'),
            ),
        ),
    ));
    ?>
