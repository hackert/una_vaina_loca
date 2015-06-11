<?php

/**
 * This is the model class for table "track.contacto".
 *
 * The followings are the available columns in table 'track.contacto':
 * @property integer $id_contacto
 * @property string $contacto
 * @property string $create_date
 * @property integer $modified_by
 * @property integer $fk_estatus
 *
 * The followings are the available model relations:
 * @property Clientes[] $clientes
 * @property Receptor[] $receptors
 */
class Contacto extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.contacto';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('modified_by, fk_estatus', 'numerical', 'integerOnly'=>true),
			array('contacto, create_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_contacto, contacto, create_date, modified_by, fk_estatus, fk_created_by', 'safe', 'on'=>'search'),
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
			'clientes' => array(self::HAS_MANY, 'Clientes', 'id_contacto'),
			'receptors' => array(self::HAS_MANY, 'Receptor', 'id_contacto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_contacto'   => 'ID DEL CONTACTO',
			'contacto'      => 'CONTACTO: REDES SOCIALES, TELEFONO, CORREO',
			'create_date'   => 'FECHA CREACIÓN',
			'modified_by'   => 'MODIFICADO POR',
			'fk_estatus'    => 'ESTATUS DEL REGISTRO',
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

		$criteria->compare('id_contacto',$this->id_contacto);
		$criteria->compare('contacto',$this->contacto,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('fk_estatus',$this->fk_estatus);
		$criteria->compare('fk_created_by',$this->fk_created_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contacto the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
