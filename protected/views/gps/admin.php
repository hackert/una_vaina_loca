<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('gps-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1 class="text-center">Administrador Gps</h1>

<div align="right">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'label' => 'Agregar GPS',
        'context' => 'primary',
        'size' => 'small',
        'icon' => 'plus-sign',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('gps/create/') . '";'
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
        'id' => 'gps-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
            /* 'id_gps', */
            'id_vehiculo',
            'codigo',
            'modelo',
            'reporta',
            'imei',
            /*
              'sim_card', */
            'fecha_instalacion',
            /* 'linea',
             */
            array(
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 12%'),
            ),
        ),
    ));
    ?>
