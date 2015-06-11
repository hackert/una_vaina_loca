<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('marca-grid', {
data: $(this).serialize()
});
return false;
});
");
?>
<h1 class="text-center">Administrador Marcas de Vehiculos</h1>

<div align="right">
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'label' => 'Agregar Marca',
        'context' => 'primary',
        'icon' => 'icon-list icon-white',
        'id' => 'btnnuevo',
        'icon' => 'plus-sign',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('Marca/create/') . '";'
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
        'id' => 'marca-grid',
        'type' => 'striped bordered condensed',
        'dataProvider' => $model->search(),
        'template' => "{items}",
        'filter' => $model,
        'columns' => array(
            array('name' => 'id_marca', 'header' => '#'),
            array('name' => 'descripcion', 'header' => 'Marcas',
                'htmlOptions' => array('class' => 'panel-heading')),
            array(
                'class' => 'booster.widgets.TbButtonColumn',
                'htmlOptions' => array('style' => 'width: 10%'),
            ),
        ),
    ));
    ?>
