<?php

/**
 * This is the model class for table "track.admision".
 *
 * The followings are the available columns in table 'track.admision':
 * @property integer $id_admision
 * @property string $peso_admision
 * @property string $precio_admision
 * @property string $dimension_admision
 * @property boolean $pago_recepcion
 * @property boolean $es_activo
 * @property integer $fk_estatus
 * @property string $create_date
 * @property integer $modified_by
 * @property integer $id_sede
 * @property integer $id_cliente
 * @property integer $empaque
 * @property integer $articulo
 * @property integer $tipo_envio
 * @property integer $fk_receptor
 * @property string $cod_paquete
 * @property string $estado
 * @property string $fecha_entrega
 *
 * The followings are the available model relations:
 * @property Clientes $idCliente
 * @property Sedes $idSede
 * @property Receptor $fkReceptor
 * @property Maestro $articulo0
 */


class Admision extends CActiveRecord
{

	

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.admision';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('peso_admision, precio_admision, id_sede, id_cliente, fk_receptor', 'required'),
			array('fk_estatus, modified_by, id_sede, id_cliente, empaque, articulo, tipo_envio, fk_receptor', 'numerical', 'integerOnly'=>true),
			array('peso_admision', 'length', 'max'=>100),
			array('cod_paquete', 'length', 'max'=>18),
			array('estado', 'length', 'max'=>20),
			array('pago_recepcion, es_activo, create_date, fecha_entrega', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_admision, peso_admision, precio_admision, dimension_admision, pago_recepcion, es_activo, fk_estatus, create_date, modified_by, id_sede, id_cliente, empaque, articulo, tipo_envio, fk_receptor, cod_paquete, estado, fecha_entrega', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idCliente' => array(self::BELONGS_TO, 'Clientes', 'id_cliente'),
			'idSede' => array(self::BELONGS_TO, 'Sedes', 'id_sede'),
			'fkReceptor' => array(self::BELONGS_TO, 'Receptor', 'fk_receptor'),
			'articulo0' => array(self::BELONGS_TO, 'Maestro', 'articulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_admision' => 'Id Admision',
			'peso_admision' => 'Peso Admision',
			'precio_admision' => 'Precio Admision',
			'dimension_admision' => 'Dimension Paquete',
			'pago_recepcion' => 'Pago Recepcion',
			'es_activo' => 'Es Activo',
			'fk_estatus' => 'Estatus',
			'create_date' => 'Fecha Creado',
			'modified_by' => 'Modified By',
			'id_sede' => 'Id Sede',
			'id_cliente' => 'Id Cliente',
			'empaque' => 'Empaque',
			'articulo' => 'Articulo',
			'tipo_envio' => 'Tipo Envio',
			'fk_receptor' => 'Fk Receptor',
			'cod_paquete' => 'Cod Paquete',
			'estado' => 'Estado',
			'fecha_entrega' => 'Fecha Entrega',
			
		);
	}


/*  ------------------------------------- */

public function generarCodigoAd()
{
    $codigo = "x";
 $sql = "select max(id_envio)+1 as codigo from track.admision";
 
 $data = Yii::app()->db->createCommand($sql)->queryRow();
        
        if (!empty($data)) {   
                    $codigo ='AD'.str_pad($data['codigo'], 9, "0", STR_PAD_LEFT).'VE';           
          
        } 
 return $codigo;
}

/*  ------------------------------------- */

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_admision',$this->id_admision);
		$criteria->compare('peso_admision',$this->peso_admision,true);
		$criteria->compare('precio_admision',$this->precio_admision,true);
		$criteria->compare('dimension_admision',$this->dimension_admision,true);
		$criteria->compare('pago_recepcion',$this->pago_recepcion);
		$criteria->compare('es_activo',$this->es_activo);
		$criteria->compare('fk_estatus',$this->fk_estatus);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('id_sede',$this->id_sede);
		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('empaque',$this->empaque);
		$criteria->compare('articulo',$this->articulo);
		$criteria->compare('tipo_envio',$this->tipo_envio);
		$criteria->compare('fk_receptor',$this->fk_receptor);
		$criteria->compare('cod_paquete',$this->cod_paquete,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('fecha_entrega',$this->fecha_entrega,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Admision the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
