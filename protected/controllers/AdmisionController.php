<?php

class AdmisionController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column2';

/**
* @return array action filters
*/
public function filters()
{
return array(
'accessControl', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules
*/
public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view','create'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update','buscarPrecio','BuscarLocalidad','BuscarMunicipios','BuscarParroquias','BuscarSedes','CrearCodigo'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','create'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/*  -----  funcion que crea el codigo unico de 13 caracteres  ----  */

public function actionCrearCodigo($parroquia,$articulo)
{
    $constante1 = 'XP';
    $constante2 = 'VE';
    $codigo = $constante1.$parroquia.$articulo;
    
    $codigo .= $constante2;
    return $codigo;
}    


/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{

 $model    = new Admision;
 $clientes = new Clientes;
 $receptor = new Receptor;
 $contacto = new Contacto;
 $contacto_emisor = new Contacto;
 $depart   = new Sedes;
 $municipio  = new Municipios;
 $parroquias = new Parroquias;
 $localidad  = new Localidades;
 $oficinas   = new Oficinaspostales;

 
// Uncomment the following line if AJAX validation is needed
 $this->performAjaxValidation($model);




if(isset($_POST['Admision']))
{
     // var_dump($_POST); echo "<br><br>"; // die();


 /* -----  Cliente   ------ */
  /* -- creo objeto de tipo cliente y lo lleno con lo que traje del formulario  -- */

   $clientes->attributes       = $_POST['Clientes'];
   $clientes->create_date      = date('Y-m-d H:i:s');
   $clientes->fk_created_by    = Yii::app()->user->id; 

  if($clientes->save()){
     $id_cliente = $clientes->id_cliente;
     echo " Registro Cliente ... ";  
  }else{ 
      var_dump($clientes->Errors);
      exit;
  }


/* -----  Contactos  Destinatario -----  */        
    // var_dump($id_enlace); 
    // die();
    if($_POST['Contacto_telefonoPro']){


         $datosContactotelf = explode(',', $_POST['Contacto_telefonoPro']);
          foreach ($datosContactotelf as $data1){

           $telefono = new Contacto;
           $telefono->contacto          = $data1;
           $telefono->create_date       = date('Y-m-d H:i:s');
           $telefono->fk_created_by     = Yii::app()->user->id;


         if($telefono->save()){
             echo " Registro Contactos ... ";   

             /* -----  enlace   ------  */ 
             $receptor_contacto = new ReceptorContacto;
             $receptor_contacto->id_receptor = $receptor->id_receptor;
             $receptor_contacto->id_contacto = $telefono->id_contacto;
             $receptor_contacto->save();

         }else{ 
             echo " Fallo Insert Contactos... ";
         }  
     }

    }


    if($_POST['Contacto_correoPro']){
      
         $datosContactoCorreo = explode(',', $_POST['Contacto_correoPro']);
          foreach ($datosContactoCorreo as $data2){

           $correo = new Contacto;
           $correo->contacto          = $data2;
           $correo->create_date       = date('Y-m-d H:i:s');
           $correo->fk_created_by     = Yii::app()->user->id; 

         if($correo->save()){
             echo " Registro Contactos ... ";   
             /* -----  enlace   ------  */ 
             $receptor_contacto = new ReceptorContacto;
             $receptor_contacto->id_receptor = $receptor->id_receptor;
             $receptor_contacto->id_contacto = $correo->id_contacto;
             $receptor_contacto->save(); 
         }else{ 
             echo " Fallo Insert Contactos... ";
         }  
       }
    }



/*  -------------------------- */

/*  ----  Receptor  ------ */   
     $receptor->attributes      = $_POST['Receptor'];
     $receptor->create_date       = date('Y-m-d H:i:s');
     $receptor->fk_created_by     = Yii::app()->user->id; 
     if($receptor->save()){
         $id_receptor = $receptor->id_receptor;
         echo " Registro Receptor ... ";  
        //  var_dump($receptor->id_receptor); die();
     }else{ 
        var_dump($receptor->Errors);
         echo " Fallo Insert Receptor... ";
     }  
 


/* -----  Contactos  Destinatario -----  */        
    // var_dump($id_enlace); 
    // die();
    if($_POST['Contacto_telefonoPro']){


         $datosContactotelf = explode(',', $_POST['Contacto_telefonoPro']);
          foreach ($datosContactotelf as $data1){

           $telefono = new Contacto;
           $telefono->contacto          = $data1;
           $telefono->create_date       = date('Y-m-d H:i:s');
           $telefono->fk_created_by     = Yii::app()->user->id;


         if($telefono->save()){
             echo " Registro Contactos ... ";   

             /* -----  enlace   ------  */ 
             $receptor_contacto = new ReceptorContacto;
             $receptor_contacto->id_receptor = $receptor->id_receptor;
             $receptor_contacto->id_contacto = $telefono->id_contacto;
             $receptor_contacto->save();

         }else{ 
             echo " Fallo Insert Contactos... ";
         }  
     }

    }


    if($_POST['Contacto_correoPro']){
      
         $datosContactoCorreo = explode(',', $_POST['Contacto_correoPro']);
          foreach ($datosContactoCorreo as $data2){

           $correo = new Contacto;
           $correo->contacto          = $data2;
           $correo->create_date       = date('Y-m-d H:i:s');
           $correo->fk_created_by     = Yii::app()->user->id; 

         if($correo->save()){
             echo " Registro Contactos ... ";   
             /* -----  enlace   ------  */ 
             $receptor_contacto = new ReceptorContacto;
             $receptor_contacto->id_receptor = $receptor->id_receptor;
             $receptor_contacto->id_contacto = $correo->id_contacto;
             $receptor_contacto->save(); 
         }else{ 
             echo " Fallo Insert Contactos... ";
         }  
       }
    }

   // die();
 
 /*  ----  Ubicacion fisica  ---- */
    $depart->attributes        = $_POST['Sedes'];
     $depart->fk_municipio      = $_POST['Municipios']['idmunicipio'];
     $depart->fk_parroquia      = $_POST['Parroquias']['idparroquia'];
     $depart->fk_estado         = $_POST['Sedes']['fk_estado'];  
     /* $depart->fk_sede           = $_POST['Sedes']['fk_estado']; */
 
     $depart->fk_estatus        = 1;
     $depart->create_date       = date('Y-m-d H:i:s');
     $depart->fk_created_by     = Yii::app()->user->id; 
     if($depart->save()){
         $id_sede = $depart->id_sede;
         echo " Registro Ubicacion Geografica ... "; 
      }else{ 
        var_dump($depart->Errors);
      exit;
      }  
 /*  ----  Admision  ----- */   
     
       //die();
    
   //  $hoy        =  date("dm"); 
    $correlativo =  Envio::model()->generarCodigo();
    for ($i = 0; $i < count($_POST['ListPeso']); $i++) {
     
          $fecha_entrega = new DateTime($_POST['ListFentrega'][$i]);
          

         $envio = new Admision;
         $envio->cod_paquete       = $correlativo; 
         $envio->peso_admision     = $_POST['ListPeso'][$i];
         $envio->precio_admision    = $_POST['ListPrecio_unitario'][$i];;
         $envio->dimension_admision = $_POST['ListDimension'][$i];
         $envio->pago_recepcion = $_POST['ListPago'][$i];
         $envio->fecha_entrega  = $fecha_entrega->format('Y-m-d');
         $envio->es_activo      = true;
         $envio->create_date    = date('Y-m-d H:i:s');
         $envio->id_sede        = $id_sede;
         $envio->id_cliente     = $id_cliente;
         $envio->empaque        = $_POST['ListTempaque'][$i];
         $envio->articulo       = $_POST['ListArticulo'][$i];
         $envio->tipo_envio     = $_POST['ListTenvio'][$i];
         $envio->fk_receptor    = $id_receptor; 
         $envio->estado         = $_POST['Sedes']['fk_estado'];
         
         if($envio->save()){
             
             echo " Registro Paquete ... ".$i; 

              Yii::app()->user->setFlash('error', "Registro Paquete !");
           //   $this->redirect(array('Admision/admin')); 
          }else{ 
            var_dump($envio->Errors);
          
          }
         $correlativo++;
    }

//die();
	//	if($model->save());

 /*   --------- Fin Admision   ---- */      
               $this->redirect(array('Admision/admin')); 
}else{

    $this->render('create',array(
    'model'=>$model, 'clientes' => $clientes,'receptor' => $receptor,'contacto' => $contacto,'contacto_emisor' => $contacto_emisor,'depart' => $depart,'municipio' => $municipio,'parroquia' => $parroquias,'localidad' =>$localidad,'oficinas' => $oficinas,
    ));
}

}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Admision']))
{
$model->attributes=$_POST['Admision'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_admision));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
$this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('Admision');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}


/*  ----- */
public function actionbuscarPrecio() {

        $peso = intval($_POST['Paquete_peso']);
        $tipo_envio = $_POST['Paquete_tipo_envio'];

        if($peso < 500 ) $peso = 500;
        
 
        $SQL2 = "SELECT * FROM track.tarifario WHERE tipo_envio = ".$tipo_envio." and  peso BETWEEN 0
AND ".$peso."  order by peso DESC limit 1;";

        $data = Yii::app()->db->createCommand($SQL2)->queryRow();

       // var_dump($data); die();
        if (!empty($data)) {
            echo json_encode($data);
        } else {
            echo json_encode('vacio');
        }
}


/*  ----- */


/*  ++++++++++++++++++++++ */
/**
     * FUNCION QUE MUESTRA TODOS LOS MUNICIPIO DE ACUERDO A UN ID DE UN ESTADO
     */
    public function actionBuscarMunicipios() {
        // var_dump($_POST); die();

        $Id = (isset($_POST['Sedes']['fk_estado']) ? $_POST['Sedes']['fk_estado'] : $_GET['fk_estado']);
        $Selected = isset($_GET['municipio']) ? $_GET['municipio'] : '';
        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.idestado = :idestado');
            $criteria->params = array(':idestado' => $Id);
            $criteria->order = 't.nombremunicipio ASC';

            $data = CHtml::listData(Municipios::model()->findAll($criteria), 'idmunicipio', 'nombremunicipio');
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
            foreach ($data as $id => $value) {
                if ($Selected == $id) {
                    echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                } else {
                    echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                }
            }
        } else {
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
        }
    }


/**
     * FUNCION QUE MUESTRA TODAS LAS PARROQUIAS DE ACUERDO A UN ID DE UN MUNICIPIO
     */
    public function actionBuscarParroquias() {
        // var_dump($_POST); die();

        $Id = (isset($_POST['Municipios']['idmunicipio']) ? $_POST['Municipios']['idmunicipio'] : $_GET['parroquia']);
        $Selected = isset($_GET['parroquia']) ? $_GET['parroquia'] : '';
        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.idmunicipio = :idmunicipio');
            $criteria->params = array(':idmunicipio' => $Id);
            $criteria->order = 't.parroquia ASC';

            $data = CHtml::listData(Parroquias::model()->findAll($criteria), 'idparroquia', 'parroquia');
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
            foreach ($data as $id => $value) {
                if ($Selected == $id) {
                    echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                } else {
                    echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                }
            }
        } else {
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
        }
    }


/*  +++++++++++++++++++++++ */

/**
     * FUNCION QUE MUESTRA TODAS LAS LOCALIDADES DE ACUERDO A UN ID DE PARROQUIA
     */
    public function actionBuscarLocalidad() {
        // var_dump($_POST); die();

        $Id = (isset($_POST['Parroquias']['idparroquia']) ? $_POST['Parroquias']['idparroquia'] : $_GET['localidad']);
        $Selected = isset($_GET['localidad']) ? $_GET['localidad'] : '';
        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.idparroquia = :idparroquia');
            $criteria->params = array(':idparroquia' => $Id);
            $criteria->order = 't.nombrelocalidad ASC';

            $data = CHtml::listData(Localidades::model()->findAll($criteria), 'idlocalidad', 'nombrelocalidad');
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
            foreach ($data as $id => $value) {
                if ($Selected == $id) {
                    echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                } else {
                    echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                }
            }
        } else {
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
        }
    }


/*  +++++++++++++++++++++++ */

/**
     * FUNCION QUE MUESTRA TODAS LAS Oficinas DE ACUERDO A UN ID DE la Localidad
     */
    public function actionBuscarSedes() {
        // var_dump($_POST['Localidades']['idlocalidad']); die();

        $Id = (isset($_POST['Localidades']['idlocalidad']) ? $_POST['Localidades']['idlocalidad'] : $_GET['Localidades']['idlocalidad']);
        // var_dump($Id); die();
        $Selected = isset($_GET['Localidades']['idlocalidad']) ? $_GET['Localidades']['idlocalidad'] : '';
        if (!empty($Id)) {
            $criteria = new CDbCriteria;
            $criteria->addCondition('t.idlocalidad = :idlocalidad'); 
            $criteria->params = array(':idlocalidad' => $Id);
            $criteria->order = 't.nombreoficina ASC';

            $data = CHtml::listData(Oficinaspostales::model()->findAll($criteria), 'id', 'nombreoficina');
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
            foreach ($data as $id => $value) {
                if ($Selected == $id) {
                    echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                } else {
                    echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                }
            }
        } else {
            echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
        }
    }


/*  +++++++++++++++++++++++ */



/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Admision('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Admision']))
$model->attributes=$_GET['Admision'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=Admision::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='admision-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
