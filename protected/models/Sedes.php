<?php

/**
 * This is the model class for table "track.sedes".
 *
 * The followings are the available columns in table 'track.sedes':
 * @property integer $id_sede
 * @property string $nb_sede
 * @property string $direccion_sede
 * @property integer $fk_estado
 * @property integer $fk_municipio
 * @property integer $fk_parroquia
 * @property integer $fk_estatus
 * @property string $create_date
 * @property integer $modified_by
 * @property boolean $es_activo
 * @property integer $tipo_sede
 * @property integer $fk_sede
 * @property integer $fk_created_by
 * @property integer $localidad
 *
 * The followings are the available model relations:
 * @property Admision[] $admisions
 */
class Sedes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.sedes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_estado, fk_municipio, fk_parroquia, fk_estatus, create_date', 'required'),
			array('fk_estado, fk_municipio, fk_parroquia, fk_estatus, modified_by, tipo_sede, fk_sede, fk_created_by, localidad', 'numerical', 'integerOnly'=>true),
			array('nb_sede', 'length', 'max'=>150),
			array('direccion_sede, es_activo', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_sede, nb_sede, direccion_sede, fk_estado, fk_municipio, fk_parroquia, fk_estatus, create_date, modified_by, es_activo, tipo_sede, fk_sede, fk_created_by, localidad', 'safe', 'on'=>'search'),
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
			'admisions' => array(self::HAS_MANY, 'Admision', 'id_sede'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_sede' => 'Id Sede',
			'nb_sede' => 'Nb Sede',
			'direccion_sede' => 'Direccion Sede',
			'fk_estado' => 'Estado',
			'fk_municipio' => 'Municipio',
			'fk_parroquia' => 'Parroquia',
			'fk_estatus' => 'Fk Estatus',
			'create_date' => 'Create Date',
			'modified_by' => 'Modified By',
			'es_activo' => 'Es Activo',
			'tipo_sede' => 'Tipo Sede',
			'fk_sede' => 'Fk Sede',
			'fk_created_by' => 'Fk Created By',
			'localidad' => 'Localidad',
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

		$criteria->compare('id_sede',$this->id_sede);
		$criteria->compare('nb_sede',$this->nb_sede,true);
		$criteria->compare('direccion_sede',$this->direccion_sede,true);
		$criteria->compare('fk_estado',$this->fk_estado);
		$criteria->compare('fk_municipio',$this->fk_municipio);
		$criteria->compare('fk_parroquia',$this->fk_parroquia);
		$criteria->compare('fk_estatus',$this->fk_estatus);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_by',$this->modified_by);
		$criteria->compare('es_activo',$this->es_activo);
		$criteria->compare('tipo_sede',$this->tipo_sede);
		$criteria->compare('fk_sede',$this->fk_sede);
		$criteria->compare('fk_created_by',$this->fk_created_by);
		$criteria->compare('localidad',$this->localidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Sedes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
