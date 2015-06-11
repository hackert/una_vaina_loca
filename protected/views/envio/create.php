<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'envio-form',
    'enableAjaxValidation' => true,
        ));
?>

<h1>Registro  Empaquetamiento</h1>

<div class="contenedor">

<?php   $this->widget(
        'booster.widgets.TbPanel', array(
        'title' => 'Informaci&oacute;n de Envio',
        'context' => 'primary',
        'headerIcon' => 'barcode',
        'content' => $this->renderPartial('_form', array('model' => $model, 'form' => $form), true),
        )
); ?>


</div>
<?php $this->endWidget(); ?>