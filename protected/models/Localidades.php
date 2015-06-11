<?php

/**
 * This is the model class for table "localidades".
 *
 * The followings are the available columns in table 'localidades':
 * @property integer $ogc_fid
 * @property string $the_geom
 * @property string $nombrelocalidad
 * @property integer $idparroquia
 * @property integer $idtipolocalidad
 * @property integer $idlocalidad
 * @property integer $iduser
 * @property string $fecha_create
 *
 * The followings are the available model relations:
 * @property Parroquias $idparroquia0
 * @property Tipolocalidades $idtipolocalidad0
 * @property CrugeUser $iduser0
 * @property SectoresGeo[] $sectoresGeos
 * @property Sectores[] $sectores
 * @property Oficinaspostales[] $oficinaspostales
 */
class Localidades extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'localidades';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idparroquia, idtipolocalidad, idlocalidad, iduser', 'numerical', 'integerOnly'=>true),
			array('nombrelocalidad', 'length', 'max'=>100),
			array('the_geom, fecha_create', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ogc_fid, the_geom, nombrelocalidad, idparroquia, idtipolocalidad, idlocalidad, iduser, fecha_create', 'safe', 'on'=>'search'),
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
			'idparroquia0' => array(self::BELONGS_TO, 'Parroquias', 'idparroquia'),
			'idtipolocalidad0' => array(self::BELONGS_TO, 'Tipolocalidades', 'idtipolocalidad'),
			'iduser0' => array(self::BELONGS_TO, 'CrugeUser', 'iduser'),
			'sectoresGeos' => array(self::HAS_MANY, 'SectoresGeo', 'idlocalidad'),
			'sectores' => array(self::HAS_MANY, 'Sectores', 'idlocalidad'),
			'oficinaspostales' => array(self::HAS_MANY, 'Oficinaspostales', 'idlocalidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ogc_fid' => 'Ogc Fid',
			'the_geom' => 'The Geom',
			'nombrelocalidad' => 'Nombrelocalidad',
			'idparroquia' => 'Idparroquia',
			'idtipolocalidad' => 'Idtipolocalidad',
			'idlocalidad' => 'Idlocalidad',
			'iduser' => 'Iduser',
			'fecha_create' => 'Fecha Create',
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

		$criteria->compare('ogc_fid',$this->ogc_fid);
		$criteria->compare('the_geom',$this->the_geom,true);
		$criteria->compare('nombrelocalidad',$this->nombrelocalidad,true);
		$criteria->compare('idparroquia',$this->idparroquia);
		$criteria->compare('idtipolocalidad',$this->idtipolocalidad);
		$criteria->compare('idlocalidad',$this->idlocalidad);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('fecha_create',$this->fecha_create,true);

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
	 * @return Localidades the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
