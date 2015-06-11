<?php

/**
 * This is the model class for table "track.despacho".
 *
 * The followings are the available columns in table 'track.despacho':
 * @property integer $id_despacho
 * @property integer $tipo_despacho
 * @property integer $fk_transporte
 * @property string $fecha_despacho
 * @property string $serial_precinto
 * 
 *
 * The followings are the available model relations:
 * @property Envio[] $track.envios
 * @property Apertura[] $aperturas
 * @property BitacoraTransito[] $bitacoraTransitos
 * @property vehiculo $vehiculo0
 */
class Despacho extends CActiveRecord
{
	public $codigo_envio;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.despacho';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_despacho, serial_precinto', 'required'),
			array('tipo_despacho, fk_transporte', 'numerical', 'integerOnly'=>true),
			array('serial_precinto', 'length', 'max'=>13),
			array('fecha_despacho', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_despacho, tipo_despacho, fk_transporte, fecha_despacho, serial_precinto', 'safe', 'on'=>'search'),
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
			'track.envios' => array(self::MANY_MANY, 'Envio', 'desp_envio(id_despacho, id_envio)'),
			'aperturas' => array(self::HAS_MANY, 'Apertura', 'fk_despacho'),
			'bitacoraTransitos' => array(self::HAS_MANY, 'BitacoraTransito', 'fk_despacho'),
			'vehiculo0' => array(self::HAS_MANY, 'vehiculo', 'fk_transporte'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_despacho' => 'Id Despacho',
			'tipo_despacho' => 'Tipo Despacho',
			'fk_transporte' => 'Vehiculo',
			'fecha_despacho' => 'Fecha Despacho',
			'serial_precinto' => 'Serial Precinto',
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

		$criteria->compare('id_despacho',$this->id_despacho);
		$criteria->compare('tipo_despacho',$this->tipo_despacho);
		$criteria->compare('fk_transporte',$this->fk_transporte);
		$criteria->compare('fecha_despacho',$this->fecha_despacho,true);
		$criteria->compare('serial_precinto',$this->serial_precinto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Despacho the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
