<?php
 $baseUrl = Yii::app()->baseUrl;
 $funciones = Yii::app()->getClientScript()->registerScriptFile($baseUrl . '/js/funciones.js');

?>

<div class="row-fluid">
    <div class="col-md-6">
        <?php
        echo $form->labelEx($contacto_emisor, 'telefono');
        //Inicio Campo de Número de Telefono
        ?>
        <?php
      
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => CHtml::activeId($contacto_emisor, 'telefonoEmi'),
            'attribute' => 'telefonoPro',
            'htmlOptions' => array(
                'onchange' => 'telfCheck(this.id);',
            ),
            'options' => array(
                'tags' => array(),
                'class' => 'Limpiar',
                'placeholder' => 'Número teléfonico!',
                'width' => '60%',
                'tokenSeparators' => array(',', ' '),
                'multiple' => true,
                'maximumInputLength' => 11,
                //'minimumInputLength' => 11,
                'maximumSelectionSize' => 2,
                'allowClear' => true,
                'items' => 4,
            )
                )
        );
        ?>
            <?php echo $form->error($contacto_emisor,'telefonoEmi'); ?>
    </div>

    <!-- Inicio Campo de Correo Electrónico-->


    <div class="col-md-6">
        <?php echo $form->labelEx($contacto_emisor, 'correo'); ?>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => CHtml::activeId($contacto_emisor, 'correoEmi'),
            'attribute' => 'correo',
            'htmlOptions' => array(
                'onchange' => 'emailCheck(this.value,this.id);',
            ),
            'options' => array(
                'tags' => array(),
                'placeholder' => 'Ingrese su Correo Electrónico!',
                'width' => '60%',
                'tokenSeparators' => array(',', ' '),
                'multiple' => true,
                'maximumInputLength' => 150,
                //'minimumInputLength' => ,
                'maximumSelectionSize' => 2,
                'allowClear' => true,
                'items' => 4,
            )
                )
        );
        ?>
         <?php echo $form->error($contacto_emisor,'correoEmi'); ?>
        <!-- Fin Campo de Correo Electrónico-->
    </div>
</div>