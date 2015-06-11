<?php

/**
 * This is the model class for table "track.receptor".
 *
 * The followings are the available columns in table 'track.receptor':
 * @property integer $id_receptor
 * @property string $nb_receptor
 * @property string $apellido_receptor
 * @property string $direccion_receptor
 * @property boolean $es_activo
 * @property string $create_date
 * @property string $modified_date
 * @property integer $id_contacto
 * @property integer $nacionalidad
 * @property integer $cedula_receptor
 *
 * The followings are the available model relations:
 * @property Contacto $idContacto
 */
class Receptor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.receptor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(			
			array('nacionalidad, cedula_receptor', 'numerical', 'integerOnly'=>true),
			array('nb_receptor, apellido_receptor', 'length', 'max'=>100),
			array('cedula_receptor', 'length', 'max'=>9),
			array('direccion_receptor, es_activo, create_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_receptor, nb_receptor, apellido_receptor, direccion_receptor, es_activo, create_date, modified_date, nacionalidad, cedula_receptor, fk_created_by', 'safe', 'on'=>'search'),
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
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_receptor' => 'Id Receptor',
			'nb_receptor' => 'Nombre(s) / Razon Social',
			'apellido_receptor' => 'Apellido(s)',
			'direccion_receptor' => 'Direccion Receptor',
			'es_activo' => 'Es Activo',
			'create_date' => 'Create Date',
			'modified_date' => 'Modified Date',			
			'nacionalidad' => 'Natural/Juridica',
			'cedula_receptor' => 'Cédula de Identidad / Rif',
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

		$criteria->compare('id_receptor',$this->id_receptor);
		$criteria->compare('nb_receptor',$this->nb_receptor,true);
		$criteria->compare('apellido_receptor',$this->apellido_receptor,true);
		$criteria->compare('direccion_receptor',$this->direccion_receptor,true);
		$criteria->compare('es_activo',$this->es_activo);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		
		$criteria->compare('nacionalidad',$this->nacionalidad);
		$criteria->compare('cedula_receptor',$this->cedula_receptor);
		$criteria->compare('fk_created_by',$this->fk_created_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Receptor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
