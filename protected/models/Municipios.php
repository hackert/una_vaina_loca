<?php

/**
 * This is the model class for table "municipios".
 *
 * The followings are the available columns in table 'municipios':
 * @property string $the_geom
 * @property string $nombremunicipio
 * @property string $codigo_ine
 * @property integer $idestado
 * @property integer $idmunicipio
 * @property integer $gid
 *
 * The followings are the available model relations:
 * @property Parroquias[] $parroquiases
 * @property Estados $idestado0
 */
class Municipios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'municipios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idestado, idmunicipio', 'required'),
			array('idestado, idmunicipio', 'numerical', 'integerOnly'=>true),
			array('nombremunicipio', 'length', 'max'=>254),
			array('codigo_ine', 'length', 'max'=>6),
			array('the_geom', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('the_geom, nombremunicipio, codigo_ine, idestado, idmunicipio, gid', 'safe', 'on'=>'search'),
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
			'parroquiases' => array(self::HAS_MANY, 'Parroquias', 'idmunicipio'),
			'idestado0' => array(self::BELONGS_TO, 'Estados', 'idestado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'the_geom' => 'The Geom',
			'nombremunicipio' => 'Nombremunicipio',
			'codigo_ine' => 'Codigo Ine',
			'idestado' => 'Idestado',
			'idmunicipio' => 'Idmunicipio',
			'gid' => 'Gid',
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

		$criteria->compare('the_geom',$this->the_geom,true);
		$criteria->compare('nombremunicipio',$this->nombremunicipio,true);
		$criteria->compare('codigo_ine',$this->codigo_ine,true);
		$criteria->compare('idestado',$this->idestado);
		$criteria->compare('idmunicipio',$this->idmunicipio);
		$criteria->compare('gid',$this->gid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->db2;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Municipios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
