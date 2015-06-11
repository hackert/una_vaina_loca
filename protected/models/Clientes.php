<?php

/**
 * This is the model class for table "track.clientes".
 *
 * The followings are the available columns in table 'track.clientes':
 * @property integer $id_cliente
 * @property string $nb_cliente
 * @property string $apellido_cliente
 * @property integer $cedula_cliente
 * @property boolean $es_activo
 * @property string $create_date
 * @property string $modified_date
 * @property integer $id_contacto
 * @property integer $nacionalidad
 * @property integer $fk_created_by
 *
 * The followings are the available model relations:
 * @property Admision[] $admisions
 * @property Contacto $idContacto
 */
class Clientes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.clientes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedula_cliente, id_contacto, nacionalidad, fk_created_by', 'numerical', 'integerOnly'=>true),
			array('nb_cliente, apellido_cliente', 'length', 'max'=>100),
			array('cedula_cliente', 'length', 'max'=>9),
			array('es_activo, create_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_cliente, nb_cliente, apellido_cliente, cedula_cliente, es_activo, create_date, modified_date, id_contacto, nacionalidad, fk_created_by', 'safe', 'on'=>'search'),
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
			'admisions' => array(self::HAS_MANY, 'Admision', 'id_cliente'),
			'idContacto' => array(self::BELONGS_TO, 'Contacto', 'id_contacto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_cliente' => 'Id Cliente',
			'nb_cliente' => 'Nombre(s) / Razon Social',
			'apellido_cliente' => 'Apellido Cliente',
			'cedula_cliente' => 'Cedula Cliente',
			'es_activo' => 'Es Activo',
			'create_date' => 'Create Date',
			'modified_date' => 'Modified Date',
			'id_contacto' => 'Id Contacto',
			'nacionalidad' => 'Nacionalidad',
			'fk_created_by' => 'Fk Created By',
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

		$criteria->compare('id_cliente',$this->id_cliente);
		$criteria->compare('nb_cliente',$this->nb_cliente,true);
		$criteria->compare('apellido_cliente',$this->apellido_cliente,true);
		$criteria->compare('cedula_cliente',$this->cedula_cliente);
		$criteria->compare('es_activo',$this->es_activo);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('id_contacto',$this->id_contacto);
		$criteria->compare('nacionalidad',$this->nacionalidad);
		$criteria->compare('fk_created_by',$this->fk_created_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Clientes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
