<?php

/**
 * This is the model class for table "vehiculo".
 *
 * The followings are the available columns in table 'vehiculo':
 * @property integer $id_vehiculo
 * @property string $placa
 * @property string $serial_carroseria
 * @property string $serial_motor
 * @property string $color
 * @property string $descripcion
 * @property integer $anio
 * @property integer $transmision
 * @property integer $tipov
 * @property integer $marca
 * @property boolean $rotulado
 * @property integer $numero
 * @property boolean $logo
 * @property integer $dependencia
 * @property integer $modelo
 *
 * The followings are the available model relations:
 * @property Gps[] $gps
 * @property NocturnoVehiculo[] $nocturnoVehiculos
 * @property Marca $marca0
 * @property TipoVehiculo $tipov0
 */
class Vehiculo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.vehiculo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('anio, transmision, tipov, marca, numero, dependencia, modelo', 'numerical', 'integerOnly'=>true),
			array('placa', 'length', 'max'=>7),
			array('anio,numero', 'length', 'max'=>4),
			array('serial_carroseria, serial_motor, color', 'length', 'max'=>20),
			array('descripcion', 'length', 'max'=>250),
			array('rotulado,marca,tipov,serial_carroseria,dependencia','required'),
			array('rotulado, logo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_vehiculo, placa, serial_carroseria, serial_motor, color, descripcion, anio, transmision, tipov, marca, rotulado, numero, logo, dependencia, modelo', 'safe', 'on'=>'search'),
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
			'gps' => array(self::HAS_MANY, 'Gps', 'id_vehiculo'),
			'nocturnoVehiculos' => array(self::HAS_MANY, 'NocturnoVehiculo', 'id_vehiculo'),
			'marca0' => array(self::BELONGS_TO, 'Marca', 'marca'),
			'tipov0' => array(self::BELONGS_TO, 'TipoVehiculo', 'tipov'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_vehiculo' => 'Id Vehiculo',
			'placa' => 'Placa',
			'serial_carroseria' => 'Serial Carroseria',
			'serial_motor' => 'Serial Motor',
			'color' => 'Color',
			'descripcion' => 'Descripcion',
			'anio' => 'A&ntilde;o',
			'transmision' => 'Transmision',
			'tipov' => 'Tipo Vehiculo',
			'marca' => 'Marca',
			'rotulado' => 'Esta Rotulado',
			'numero' => 'Numero',
			'logo' => 'Posee Logo',
			'dependencia' => 'Dependencia',
			'modelo' => 'Modelo',
		);
	}

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

		$criteria->compare('id_vehiculo',$this->id_vehiculo);
		$criteria->compare('placa',$this->placa,true);
		$criteria->compare('serial_carroseria',$this->serial_carroseria,true);
		$criteria->compare('serial_motor',$this->serial_motor,true);
		$criteria->compare('color',$this->color,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('anio',$this->anio);
		$criteria->compare('transmision',$this->transmision);
		$criteria->compare('tipov',$this->tipov);
		$criteria->compare('marca',$this->marca);
		$criteria->compare('rotulado',$this->rotulado);
		$criteria->compare('numero',$this->numero);
		$criteria->compare('logo',$this->logo);
		$criteria->compare('dependencia',$this->dependencia);
		$criteria->compare('modelo',$this->modelo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}




	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Vehiculo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
