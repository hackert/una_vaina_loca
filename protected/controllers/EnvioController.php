<?php

class EnvioController extends Controller
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
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update','buscarOrdenes','buscarOrdenesF'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete'),
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


/*  ----------------------------------- */

/*  ------------------------------------ */


/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new Envio;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Envio']))
{
  // var_dump($_POST); // die();
       $codigo = Envio::model()->generarCodigo();

    //     var_dump($codigo); die();
 //$codigo ="xxx";
         $envio = new Envio;
         $envio->tipo_envio       = $_POST['Envio']['tipo_envio']; 
         $envio->cant_articulo    = $_POST['Envio']['cant_articulo'];
         $envio->codigo_envio     = $codigo;
         $envio->num_saca         = $_POST['Envio']['num_saca'];
         $envio->peso_total       = $_POST['Envio']['peso_total'];
         $envio->create_date      = date('Y-m-d H:i:s');
         
         
         if($envio->save()){
             $id_envio = $envio->id_envio;

             for ($i = 0; $i < count($_POST['ListArticulo']); $i++) { 
                $envio_paquete = new EnvioPaquete;        

                $envio_paquete->id_admision = $_POST['ListId'][$i];
                $envio_paquete->id_envio    = $id_envio;
                 // var_dump($envio_paquete); die();
                $envio_paquete->save();
                //  $correlativo++;
             }

            $this->redirect(array('admin','id'=>$model->id_envio));
         }else{ 
            var_dump($envio->Errors);          
         }
    
}

$this->render('create',array(
'model'=>$model,
));


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

if(isset($_POST['Envio']))
{
$model->attributes=$_POST['Envio'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_envio));
}

$this->render('update',array(
'model'=>$model,
));
}

/*  +++++++++++++++++++++++++++++++++++++++++++++++++++++++++ */
public function actionbuscarOrdenesF() {

$admision    = new Admision;

$fecha_admision = date_format(date_create($_POST['Envio_fecha_admision']), 'Y-m-d');
// var_dump($fecha_admision); die();
if($fecha_admision != null){
                    
                        $criteria = new CDbCriteria;                      
                        $criteria->params = array('fecha_entrega' => $fecha_admision);
                        $criteria->order = 'cod_paquete ASC'; 
                        $data = $admision::model()->findAll($criteria);
                      var_dump($data); die();
                    $data = CHtml::listData($data, 'cod_paquete', 'cod_paquete');
                    echo CHtml::tag('option', array('value' => ''), CHtml::encode('Seleccione'), true);
                    foreach ($data as $id => $value) {
                        if ($Selected == $id) {
                            echo CHtml::tag('option', array('value' => $id, 'selected' => true), CHtml::encode($value), true);
                        } else {
                            echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
                        }
                    }
}

}
/*  +++++++++++++  busqueda de envios    +++++++++++++++ ++  */

public function actionbuscarOrdenes() {

        $codigoOrd = $_POST['Envio_codigo_envio'];        
        
        if($codigoOrd != null){

					$SQL1 = "SELECT  Amd.cod_paquete,Amd.peso_admision,Mas.descripcion As articulo ,Amd.id_admision As id_paquete  FROM track.admision As Amd
					inner join track.maestro Mas on Amd.articulo = Mas.id_maestro and Mas.padre = 4 
					WHERE  cod_paquete = '$codigoOrd' ";
                    // var_dump($SQL1); die();
					$data = Yii::app()->db->createCommand($SQL1)->queryRow();
         }


        if (!empty($data)) {
            echo json_encode($data);
        } else {
            echo json_encode('vacio');
        }
 }


/*   +++++++++++++++++++++++++++++++++++++++++++++++++++++++  */ 



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
$dataProvider=new CActiveDataProvider('Envio');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Envio('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Envio']))
$model->attributes=$_GET['Envio'];

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
$model=Envio::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='envio-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}

?>
