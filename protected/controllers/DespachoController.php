<?php

class DespachoController extends Controller
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
'actions'=>array('create','update','buscarEmpaque'),
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

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model =new Despacho;
 $envio = new Envio;
// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Despacho']))
{

  //  var_dump($_POST); die();
$model->attributes=$_POST['Despacho'];


	if($model->save()){
             $id_despacho = $model->id_despacho;

             for ($i = 0; $i < count($_POST['ListId']); $i++) { 
                $despacho_envio = new DespEnvio;        

                $despacho_envio->id_envio = $_POST['ListId'][$i];
                $despacho_envio->id_despacho    = $id_despacho;
                 // var_dump($envio_paquete); die();
                $despacho_envio->save();
                //  $correlativo++;
             }

            $this->redirect(array('admin','id'=>$model->id_despacho));
         }else{ 
            var_dump($envio->Errors);          
         }

}

$this->render('create',array(
'model'=>$model,'envio'=>$envio
));
}


/*  +++++++++++++  busqueda de envios    +++++++++++++++ ++  */

public function actionbuscarEmpaque() {
	
      $codigo_empq = $_POST['Codigo_empaque'];

     	$SQL1 = "select track.envio.codigo_envio,track.maestro.descripcion as codigo_empq,track.envio.peso_total,track.envio.cant_articulo from track.envio 
inner join track.envio_paquete on track.envio.id_envio = track.envio_paquete.id_envio
inner join track.admision on track.admision.id_admision = track.envio_paquete.id_admision
inner join track.maestro on track.envio.tipo_envio = track.maestro.id_maestro
where track.envio.codigo_envio = '".$codigo_empq."' and track.envio.id_envio NOT IN (select id_envio from track.desp_envio) ";
					$data = Yii::app()->db->createCommand($SQL1)->queryRow();
        


        if (!empty($data)) {
            echo json_encode($data);
        } else {
            echo json_encode('vacio');
        }
 }


/*   +++++++++++++++++++++++++++++++++++++++++++++++++++++++  */ 


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

if(isset($_POST['Despacho']))
{
$model->attributes=$_POST['Despacho'];
if($model->save())
$this->redirect(array('view','id'=>$model->id_despacho));
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
$dataProvider=new CActiveDataProvider('Despacho');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new Despacho('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['Despacho']))
$model->attributes=$_GET['Despacho'];

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
$model=Despacho::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='despacho-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
