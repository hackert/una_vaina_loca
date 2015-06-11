<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'bitacora-transito-form',
    'enableAjaxValidation' => false,
    'enableClientValidation' => true,
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'validateOnType' => true,
    )
        ));
?>
<?php //echo $form->errorSummary($model); ?>
<?php switch ($opc) { ?>
<?php case 1: ?>
<h1>Registro de entradas</h1>
<?php
/* ------------  Datos de llegada  --------- */

$this->widget(
        'booster.widgets.TbPanel', array(
    'title' => 'Recepción de sacas y/o paquetes al descubierto',
    'context' => 'primary',
    'headerIcon' => 'user',
    'content' => $this->renderPartial('_form', array('model' => $model, 'form'=>$form, 'opc'=>$opc), true),
        )
);

/* ------------------------------------- */
?>
      <?php break;?>
<?php case 2: ?>
<h1>Registro de Salidas</h1>
<?php
/* ------------  Datos de salida --------- */

$this->widget(
        'booster.widgets.TbPanel', array(
    'title' => 'Salida de sacas y/o paquetes al descubierto',
    'context' => 'primary',
    'headerIcon' => 'user',
    'content' => $this->renderPartial('_form', array('model' => $model, 'form'=>$form,  'opc'=>$opc), true),
        )
);

/* ------------------------------------- */
?>
<?php } ?>
<?php $this->endWidget(); ?>