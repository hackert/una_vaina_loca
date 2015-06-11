

<div class="row-fluid">
    <div class="col-md-6">
        <?php
        echo $form->labelEx($contacto, 'telefono');
        //Inicio Campo de Número de Telefono
        ?>
        <?php
      
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => CHtml::activeId($contacto, 'telefonoPro'),
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
            <?php echo $form->error($contacto,'telefonoPro'); ?>
    </div>

    <!-- Inicio Campo de Correo Electrónico-->


    <div class="col-md-6">
        <?php echo $form->labelEx($contacto, 'correo'); ?>
        <?php
        $this->widget(
                'booster.widgets.TbSelect2', array(
            'asDropDownList' => false,
            'name' => CHtml::activeId($contacto, 'correoPro'),
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
         <?php echo $form->error($contacto,'correoPro'); ?>
        <!-- Fin Campo de Correo Electrónico-->
    </div>
</div>