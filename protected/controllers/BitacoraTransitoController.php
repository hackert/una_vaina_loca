<?php

class BitacoraTransitoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function filters() {
        return array(array('CrugeAccessControlFilter'));
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        $opc = $_GET['opc'];
        $user = $_GET['item'];
        //   var_dump($user);die;
        if (isset($user)) {
            $buscarPersona = $this->loadModelPersonas($user);
            if (!empty($buscarPersona)) {
                $sede = (int) $buscarPersona->id_sede;
                //      var_dump($sede);die;
                $model = new BitacoraTransito('search');
                $model->unsetAttributes();  // clear any default values
                if ($opc == 1) {

                    $model->fksede_llegada = $sede;
                } else if ($opc == 2) {
                    $model->fksede_salida = $sede;
                }
                if (isset($_GET['BitacoraTransito']))
                    $model->attributes = $_GET['BitacoraTransito'];

                $this->render('create', array('model' => $model, 'opc' => $opc));
            }
        }
    }

    public function actionInsertEntradas() {

        $paquetesEntrada = new BitacoraTransito;
        $fechaHoy = date('Y-m-d H:i:s');
        if ($_POST['idDespacho'] == NULL) {
            Yii::app()->end();
        } else {
            $fecha_entrega = new DateTime($_POST['fechaLlegada']);
            $paquetesEntrada->fk_despacho = $_POST['idDespacho'];
            $paquetesEntrada->fksede_llegada = $_POST['sede'];
            $paquetesEntrada->fksede_salida = $_POST['sede'];
            $paquetesEntrada->peso_llegada = $_POST['peso'];
            $paquetesEntrada->id_fkestatus = 1; /* prueba de estatus, definir que estatus se puede colocar segun este evento */
            $paquetesEntrada->fecha_llegada = $fecha_entrega->format('Y-m-d');
            $paquetesEntrada->create_date = $fechaHoy;

            if ($paquetesEntrada->save()) {
                echo json_encode(1);
            } else {
                var_dump($paquetesEntrada->Errors);
                die;
            }
        }
    }

    public function loadModelPersonas($id) {
        $model = Personas::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    public function actionBuscarCohicidenciaPeso() {
        // var_dump($_POST['despacho']);die;
        if (!empty($_POST['despacho'])) {
            $cod = (int) $_POST['despacho'];
            $buscar = BitacoraTransito::BuscarByCodDespacho($cod);
            $pesoSalida = $buscar[0]['peso_salida'];
            $pesoEntrada = $buscar[0]['peso_llegada'];
            $idTransito = (int) $buscar[0]['id_transito'];
           //  var_dump($idTransito);die;
            if ($pesoEntrada === $pesoSalida) {
                $otro = 1;
                $dato = array('idTransito'=>$idTransito, 'otro'=>$otro);
             echo json_encode($dato);
            } else {
              //  var_dump($idTransito);Die;
                $otro = 2;
                $dato = array('idTransito'=>$idTransito, 'otro'=>$otro);
  echo json_encode($dato);
            }
            // var_dump($buscar);die;
        }
    }

    public function actionBuscarSiExistePaquete() {
        if (isset($_POST['idDespacho'])) {
            $codigo = (int) $_POST['idDespacho'];
            $user = Yii::app()->user->id;
            $buscarPersona = $this->loadModelPersonas($user);
            if (!empty($buscarPersona)) {
                $sede = (int) $buscarPersona->id_sede;
                $buscar = BitacoraTransito::BuscarByIdTipo($codigo, $sede);
                if (!empty($buscar)) {
                    echo json_encode(3);
                } else {
                    $datos = array('sede' => $sede);
                    echo json_encode($datos);
                }
            } else {
                echo 'no';
                exit;
            }
        }
    }

    public function actionActualizar() { {
            Yii :: import('booster.components.TbEditableSaver');
            $es = new TbEditableSaver('BitacoraTransito');

            //Con onBeforeUpdate agrego los atrubitos adicionales que quiero actualizar
            $es->onBeforeUpdate = function($event) {
                $event->sender->setAttribute('modified_date', date('Y-m-d H:i:s'));
            };
            $es->update();
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionConfirmarSalidaExitosa() {
      //  var_dump($_POST['id']);die;
        $id = $_POST['id'];
        $idEstatus = $_POST['estatus'];
        $model = $this->loadModel($id);
        // $model->attributes = $_POST['BitacoraTransito'];
         $model->id_fkestatus = $idEstatus;
            if ($model->save()){
                echo json_decode(3);
            }else{
                echo json_decode(0);
            }
    }

    public function actionUpdate($id) {
        $model = $this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

        if (isset($_POST['BitacoraTransito'])) {
            $model->attributes = $_POST['BitacoraTransito'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id_transito));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
// we only allow deletion via POST request
            $this->loadModel($id)->delete();

// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('BitacoraTransito');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new BitacoraTransito('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BitacoraTransito']))
            $model->attributes = $_GET['BitacoraTransito'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id) {
        $model = BitacoraTransito::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'bitacora-transito-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
