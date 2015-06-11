<?php

/**
 * This is the model class for table "nocturno".
 *
 * The followings are the available columns in table 'nocturno':
 * @property integer $id_nocturno
 * @property string $fecha_registro
 * @property boolean $pernorta
 *
 * The followings are the available model relations:
 * @property NocturnoVehiculo[] $nocturnoVehiculos
 */
class Nocturno extends CActiveRecord
{

	public $placa;
    public $numrotulado;
    public $tipoveh;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.nocturno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_registro, pernorta', 'safe'),
			array('placa', 'length', 'max'=>7),
			array('numrotulado', 'length', 'max'=>4),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_nocturno, fecha_registro, pernorta', 'safe', 'on'=>'search'),
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
			'nocturnoVehiculos' => array(self::HAS_MANY, 'NocturnoVehiculo', 'id_nocturno'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_nocturno' => 'Id Nocturno',
			'fecha_registro' => 'Fecha Registro ',
			'pernorta' => 'Pernorta ',
			'numrotulado'=>'N&uacute;mero Rotulado',
			'placa'=>'Placa',
			'tipoveh'=>'Tipo de Vehiculo',
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

		$criteria->compare('id_nocturno',$this->id_nocturno);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('pernorta',$this->pernorta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Nocturno the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
