<?php

/**
 * This is the model class for table "modelo".
 *
 * The followings are the available columns in table 'modelo':
 * @property integer $id_modelo
 * @property string $descripcion
 * @property integer $fk_marca
 *
 * The followings are the available model relations:
 * @property Marca $fkMarca
 */
class Modelo extends CActiveRecord
{

	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.modelo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_marca', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>20),
			array('descripcion,fk_marca','required'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_modelo, descripcion, fk_marca,marca_desc', 'safe', 'on'=>'search'),
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
			'fkMarca' => array(self::BELONGS_TO, 'Marca', 'fk_marca'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_modelo' => 'Id Modelo',
			'descripcion' => 'Nombre del Modelo',
			'fk_marca' => 'Marca ',
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
        
        $criteria->join ="INNER JOIN track.marca ON track.marca.id_marca = t.fk_marca ";
        
		$criteria->compare('id_modelo',$this->id_modelo);
		$criteria->compare('t.descripcion',$this->descripcion,true);
		$criteria->compare('fk_marca',$this->fk_marca);
        
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Modelo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
