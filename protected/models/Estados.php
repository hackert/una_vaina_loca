<?php

/**
 * This is the model class for table "estados".
 *
 * The followings are the available columns in table 'estados':
 * @property string $the_geom
 * @property integer $idestado
 * @property string $nombreestado
 * @property string $codigo_ine
 * @property string $capital
 * @property integer $idregion
 * @property integer $gid
 *
 * The followings are the available model relations:
 * @property Municipios[] $municipioses
 * @property Regiones $idregion0
 */
class Estados extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idestado', 'required'),
			array('idestado, idregion', 'numerical', 'integerOnly'=>true),
			array('nombreestado', 'length', 'max'=>25),
			array('codigo_ine', 'length', 'max'=>2),
			array('capital', 'length', 'max'=>254),
			array('the_geom', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('the_geom, idestado, nombreestado, codigo_ine, capital, idregion, gid', 'safe', 'on'=>'search'),
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
			'municipioses' => array(self::HAS_MANY, 'Municipios', 'idestado'),
			'idregion0' => array(self::BELONGS_TO, 'Regiones', 'idregion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'the_geom' => 'The Geom',
			'idestado' => 'Idestado',
			'nombreestado' => 'Nombreestado',
			'codigo_ine' => 'Codigo Ine',
			'capital' => 'Capital',
			'idregion' => 'Idregion',
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
		$criteria->compare('idestado',$this->idestado);
		$criteria->compare('nombreestado',$this->nombreestado,true);
		$criteria->compare('codigo_ine',$this->codigo_ine,true);
		$criteria->compare('capital',$this->capital,true);
		$criteria->compare('idregion',$this->idregion);
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
	 * @return Estados the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
