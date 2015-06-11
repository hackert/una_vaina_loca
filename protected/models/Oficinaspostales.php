<?php

/**
 * This is the model class for table "oficinaspostales".
 *
 * The followings are the available columns in table 'oficinaspostales':
 * @property integer $id
 * @property string $the_geom
 * @property string $nombreoficina
 * @property string $descripcion
 * @property integer $idlocalidad
 * @property string $direccion
 * @property string $telefono
 * @property boolean $activo
 * @property integer $iduser
 * @property string $fecha_creacion
 * @property integer $idoficinapostal
 *
 * The followings are the available model relations:
 * @property Localidades $idlocalidad0
 * @property CrugeUser $iduser0
 */
class Oficinaspostales extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'oficinaspostales';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreoficina, idlocalidad, direccion', 'required'),
			array('idlocalidad, iduser, idoficinapostal', 'numerical', 'integerOnly'=>true),
			array('nombreoficina, direccion', 'length', 'max'=>150),
			array('descripcion', 'length', 'max'=>200),
			array('telefono', 'length', 'max'=>50),
			array('the_geom, activo, fecha_creacion', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, the_geom, nombreoficina, descripcion, idlocalidad, direccion, telefono, activo, iduser, fecha_creacion, idoficinapostal', 'safe', 'on'=>'search'),
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
			'idlocalidad0' => array(self::BELONGS_TO, 'Localidades', 'idlocalidad'),
			'iduser0' => array(self::BELONGS_TO, 'CrugeUser', 'iduser'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'the_geom' => 'The Geom',
			'nombreoficina' => 'Nombreoficina',
			'descripcion' => 'Descripcion',
			'idlocalidad' => 'Idlocalidad',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'activo' => 'Activo',
			'iduser' => 'Iduser',
			'fecha_creacion' => 'Fecha Creacion',
			'idoficinapostal' => 'Idoficinapostal',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('the_geom',$this->the_geom,true);
		$criteria->compare('nombreoficina',$this->nombreoficina,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('idlocalidad',$this->idlocalidad);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('activo',$this->activo);
		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);
		$criteria->compare('idoficinapostal',$this->idoficinapostal);

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
	 * @return Oficinaspostales the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
