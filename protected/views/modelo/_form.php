<?php
$form = $this->beginWidget('booster.widgets.TbActiveForm', array(
    'id' => 'modelo-form',
    'enableAjaxValidation' => false,
        ));
?>

<h4 class="note">Los campos con <span class="required">*</span> son requeridos.</h4><br><br>
<?php echo $form->errorSummary($model); ?>
<div class="row">
    <div class="col-md-6">  
        <?php
        $criteria = new CDbCriteria;
        $criteria->order = 'descripcion ASC';
        echo $form->dropDownListGroup($model, 'fk_marca', array('wrapperHtmlOptions' => array('class' => 'col-sm-12 limpiar'),
            'widgetOptions' => array(
                'data' => CHtml::listData(Marca::model()->findAll($criteria), 'id_marca', 'descripcion'),
                'htmlOptions' => array('empty' => 'SELECCIONE'),
            )
                )
        );
        ?>
        <!--   ***************************  -->
    </div>        
    <div class="col-md-6">  
        <?php echo $form->textFieldGroup($model, 'descripcion', array('class' => 'span5', 'maxlength' => 20)); ?>
    </div>
</div>    
<div class="form-actions">
    <!-- *********** -->
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'submit',
        'context' => 'primary',
        'label' => $model->isNewRecord ? 'Registrar' : 'Guardar',
        'icon' => 'icon-ok-sign icon-white',
        'size' => 'medium'
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'buttonType' => 'reset',
        'context' => 'success',
        'label' => 'Limpiar',
        'size' => 'medium',
        'icon' => 'icon-remove',
            //'id' => 'GuardarForm'
    ));
    ?>
    <?php
    $this->widget('booster.widgets.TbButton', array(
        'context' => 'danger',
        'label' => 'Cancelar',
        'size' => 'medium',
        'id' => 'CancelarForm',
        'icon' => 'icon-ban-circle',
        'htmlOptions' => array(
            'onclick' => 'document.location.href ="' . $this->createUrl('Modelo/admin/') . '";'
        )
    ));
    ?>

    <!-- *********** -->
</div>

<?php $this->endWidget(); ?>
