<?php

/**
 * This is the model class for table "track.personas".
 *
 * The followings are the available columns in table 'track.personas':
 * @property integer $id_persona
 * @property integer $fk_nacionalidad
 * @property string $cedula
 * @property string $nombres
 * @property string $apellidos
 * @property string $fecha_nacimiento
 * @property integer $fk_genero
 * @property integer $fk_profesion
 * @property integer $fk_estatus
 * @property integer $id_sede
 *
 * The followings are the available model relations:
 * @property Sedes $idSede
 */
class Personas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.personas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_nacionalidad, fk_genero, fk_profesion, fk_estatus, id_sede', 'numerical', 'integerOnly'=>true),
			array('cedula', 'length', 'max'=>8),
			array('nombres, apellidos', 'length', 'max'=>250),
			array('fecha_nacimiento', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_persona, fk_nacionalidad, cedula, nombres, apellidos, fecha_nacimiento, fk_genero, fk_profesion, fk_estatus, id_sede', 'safe', 'on'=>'search'),
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
			'idSede' => array(self::BELONGS_TO, 'Sedes', 'id_sede'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_persona' => 'Id Persona',
			'fk_nacionalidad' => 'Fk Nacionalidad',
			'cedula' => 'Cedula',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
			'fecha_nacimiento' => 'Fecha Nacimiento',
			'fk_genero' => 'Fk Genero',
			'fk_profesion' => 'Fk Profesion',
			'fk_estatus' => 'Fk Estatus',
			'id_sede' => 'Id Sede',
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

		$criteria->compare('id_persona',$this->id_persona);
		$criteria->compare('fk_nacionalidad',$this->fk_nacionalidad);
		$criteria->compare('cedula',$this->cedula,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);
		$criteria->compare('fecha_nacimiento',$this->fecha_nacimiento,true);
		$criteria->compare('fk_genero',$this->fk_genero);
		$criteria->compare('fk_profesion',$this->fk_profesion);
		$criteria->compare('fk_estatus',$this->fk_estatus);
		$criteria->compare('id_sede',$this->id_sede);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Personas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
  
}
