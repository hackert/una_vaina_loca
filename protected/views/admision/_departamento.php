 
<div class="row-fluid">
    <div class="col-md-6">
       <?php   echo $form->labelEx($depart, 'fk_estado'); ?>
         <?php
                    $criteria = new CDbCriteria;                    
                    $criteria->order = 'nombreestado ASC';
                    echo $form->dropDownList($depart, 'fk_estado', CHtml::listData(Estados::model()->findAll($criteria), 'idestado', 'nombreestado'), 
                        array(
                        'title' => 'Seleccione Estado',
                        'class' => 'span13',
                        'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('Admision/BuscarMunicipios'),
                        'update' => '#' . CHtml::activeId($municipio, 'idmunicipio'),
                    ),
                        'prompt' => 'Cargando...'
                    ));
        ?>
	  <?php // echo $form->textFieldGroup($depart,'fk_estado',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-md-6">
    	 <?php   echo $form->labelEx($depart, 'fk_municipio'); ?>
         <?php
                   
                    echo $form->dropDownList($municipio, 'idmunicipio',array(), 
                        array(
                        'title' => 'Seleccione Municipio',
                        'class' => 'span13',
                        'ajax' => array(
                        'type' => 'POST',
                        'url' => CController::createUrl('Admision/BuscarParroquias'),
                        'update' => '#' . CHtml::activeId($parroquia, 'idparroquia'),
                        ),
                        'prompt' => 'Cargando...'
                    ));
        ?>
	<?php // echo $form->textFieldGroup($depart,'fk_municipio',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
</div>

<div class="row-fluid">
    <div class="col-md-6"> 
    	 <?php   echo $form->labelEx($depart, 'fk_parroquia'); ?>
         <?php
                    echo $form->dropDownList($parroquia, 'idparroquia', array(), 
                        array(
                        'title' => 'Seleccione Parroquia',
                        'class' => 'span13',
                        'ajax' => array(
                            'type' => 'POST',
                            'url' => CController::createUrl('Admision/BuscarLocalidad'),
                            'update' => '#' . CHtml::activeId($localidad, 'idlocalidad'),
                        ),
                        'prompt' => 'Cargando...'
                    ));
        ?>
	  <?php // echo $form->textFieldGroup($depart,'fk_parroquia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
    <div class="col-md-6"> 
         <?php   echo $form->labelEx($localidad, 'localidad'); ?>
         <?php
                    echo $form->dropDownList($localidad, 'idlocalidad', array(), 
                        array(
                        'title' => 'Seleccione Localidad',
                        'class' => 'span13',
                        'ajax' => array(
                            'type' => 'POST',
                             'url' => CController::createUrl('Admision/BuscarSedes'),
                            'update' => '#' . CHtml::activeId($depart, 'id'),
                        ),
                        'prompt' => 'Cargando...'
                    ));
        ?>
      <?php // echo $form->textFieldGroup($depart,'fk_parroquia',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5')))); ?>
    </div>
</div>
  <div class="row-fluid">
    <div class="col-md-6">
         <?php   echo $form->labelEx($depart, 'oficinas'); ?>
         <?php
                    echo $form->dropDownList($oficinas, 'id', array(), 
                        array(
                        'title' => 'Seleccione Oficina',
                        'class' => 'span13',
                        'ajax' => array(
                        'type' => 'POST'
                        ),
                        'prompt' => 'Cargando...'
                    ));
        ?>
       
         <?php    
                Yii::import('ext.EGMap.*');
         
                $gMap = new EGMap();
                // using the new magic setters
                // check available options per class
                // objects with setMethod,getMethod and
                // options array can be set now this way
                $gMap->zoom = 17;
                $gMap->setWidth(473);
                $gMap->setHeight(250);
                $gMap->setCenter(10.4978504, -66.93363549999998);
         
                // Direccion de ipostel
                $home = new EGMapCoord(10.4978504, -66.93363549999998);

                $gMap->renderMap();
         ?>


      <?php // echo $form->textFieldGroup($depart,'nb_sede',array('widgetOptions'=>array('htmlOptions'=>array('class'=>'span5','maxlength'=>150)))); ?>
    </div>
   
</div>
<div class="row-fluid">
     <div class="col-md-6">
      <?php echo $form->textAreaGroup($depart,'direccion_sede', array('widgetOptions'=>array('htmlOptions'=>array('rows'=>4, 'cols'=>30, 'class'=>'span8')))); ?>
    </div>
    <div class="col-md-5">
   
    
    </div>
</div>  