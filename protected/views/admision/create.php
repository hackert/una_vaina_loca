<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'admision-form',
    'enableAjaxValidation' => true,
        ));
?>

<div class="contenedor">


<h1>Admisi&oacute;n De Paquetes</h1>
<?php echo $form->errorSummary($model); ?>

<?php

$this->widget(
        'booster.widgets.TbLabel', array(
    'context' => 'warning',
    'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:13px; span{color:red;}'),
    // 'success', 'warning', 'important', 'info' or 'inverse'
    'label' => 'Los campos marcados con * son requeridos',
        )
); ?>
<br><br>
<?php
/* ------------  Datos Cliente  --------- */

$this->widget(
        'booster.widgets.TbPanel', array(
    'title' => 'Datos del Emisor',
    'context' => 'primary',
    'headerIcon' => 'user',
    'content' => $this->renderPartial('_cliente', array('model' => $model, 'clientes' => $clientes, 'form' => $form), true),
        )
);

/* ------------------------------------- */
?>

<?php

 /*  *************  Contacto Cliente  ******************* */
  $this->widget(
        'booster.widgets.TbPanel', array(
    'title' => 'Datos Contacto del Emisor',
    'context' => 'primary',
    'headerIcon' => 'earphone',
    'content' => $this->renderPartial('_datosContactoEmisor', array('model' => $model, 'contacto_emisor' => $contacto_emisor, 'form' => $form), true),
        )
);
 /*  ********************************************************** */ 
?>




<?php
/*  +++++++++++  Destinatario  +++++++++  */
 $this->widget(
        'booster.widgets.TbPanel', array(
    'title' => 'Datos del Destinatario',
    'context' => 'primary',
    'headerIcon' => 'user',
    'content' => $this->renderPartial('_destinatario', array('model' => $model, 'receptor' => $receptor, 'form' => $form), true),
        )
);
/*  +++++++++++++++++++++++++++++++++++++  */
?>

<?php
   $this->widget(
           'booster.widgets.TbLabel', array(
       'context' => 'info',
       'htmlOptions' => array('style' => 'padding:3px;text-aling:center; font-size:13px; span{color:red;}'),
       // 'success', 'warning', 'important', 'info' or 'inverse'
       'label' => 'Agrege códigos de área correctos más su número teléfonico. Ejemplo: 02125555555',
           )
   );
?>
<br><br>

<?php

 /*  *************  Contacto destinatario  ******************* */
  $this->widget(
        'booster.widgets.TbPanel', array(
    'title' => 'Datos Contacto del Destinatario',
    'context' => 'primary',
    'headerIcon' => 'earphone',
    'content' => $this->renderPartial('_datosContacto', array('model' => $model, 'contacto' => $contacto, 'form' => $form), true),
        )
);
 /*  ********************************************************** */ 
?>

<?php  
  /* ---------------  departamento   --------------- */
 $this->widget(
        'booster.widgets.TbPanel', array(
        'title' => 'Departamento Destino',
        'context' => 'primary',
        'headerIcon' => 'road',
        'content' => $this->renderPartial('_departamento', array('depart' => $depart,'municipio' => $municipio,'parroquia' => $parroquia,'localidad' => $localidad, 'oficinas' => $oficinas,'form' => $form), true),
        )
);  
 /*  ------------------------------------------------- */
?>





<?php   $this->widget(
        'booster.widgets.TbPanel', array(
        'title' => 'Informaci&oacute;n de Envio',
        'context' => 'primary',
        'headerIcon' => 'envelope',
        'content' => $this->renderPartial('_form', array('model' => $model, 'form' => $form), true),
        )
); ?>



<div class="form-actions">
    <!-- *********** -->
<?php
$this->widget('booster.widgets.TbButton', array(
    'buttonType' => 'submit',
    'context' => 'primary',
    'label' =>$model->isNewRecord ? 'Registrar' : 'Guardar',
    'icon' => 'ok-sign white',
    'size' => 'medium'
));
?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'reset',
        'context' => 'success',
        'label' => 'Limpiar',
        'size' => 'medium',
        'icon' => 'remove',
            //'id' => 'GuardarForm'
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'danger',
        'label' => 'Cancelar',
        'size' => 'medium',
        'id' => 'CancelarForm',
        'icon' => 'ban-circle',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('site/index') . '";'
        )
    ));
    ?>
</div>

</div>
<?php $this->endWidget(); ?>