<?php

/**
 * This is the model class for table "conductor".
 *
 * The followings are the available columns in table 'conductor':
 * @property integer $id_persona
 * @property string $nombre
 * @property string $apellido
 * @property string $nacionalidad
 * @property integer $cedula
 * @property integer $tipo_trab
 * @property boolean $licencia
 * @property string $grado
 * @property boolean $es_activo
 */
class Conductor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'conductor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_persona, cedula,grado, tipo_trab', 'numerical', 'integerOnly'=>true),
			array('nombre, apellido', 'length', 'max'=>40),
			array('nacionalidad, grado', 'length', 'max'=>1),
			array('cedula', 'length', 'max'=>8),
			array('licencia, es_activo', 'safe'),
			array('nombre,apellido,nacionalidad,cedula,licencia,grado','required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_persona, nombre, apellido, nacionalidad, cedula, tipo_trab, licencia, grado, es_activo', 'safe', 'on'=>'search'),
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
			'fknacionalidad' => array(self::BELONGS_TO, 'Maestro', 'nacionalidad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_persona' => 'Id Persona', 
			'nombre' => 'Nombre',
			'apellido' => 'Apellido',
			'nacionalidad' => 'Nacionalidad',
			'cedula' => 'Cedula',
			'tipo_trab' => 'Tipo Trab',
			'licencia' => 'Licencia',
			'grado' => 'Grado',
			'es_activo' => 'Estatus',
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
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('nacionalidad',$this->nacionalidad,true);
		$criteria->compare('cedula',$this->cedula);
		$criteria->compare('tipo_trab',$this->tipo_trab);
		$criteria->compare('licencia',$this->licencia);
		$criteria->compare('grado',$this->grado,true);
		$criteria->compare('es_activo',$this->es_activo);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Conductor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
