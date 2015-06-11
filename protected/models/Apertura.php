<?php

/**
 * This is the model class for table "track.apertura".
 *
 * The followings are the available columns in table 'track.apertura':
 * @property integer $id_apertura
 * @property integer $fk_despacho
 * @property integer $fk_motivo
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Despacho $fkDespacho
 */
class Apertura extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.apertura';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fk_despacho, fk_motivo', 'required'),
			array('fk_despacho, fk_motivo, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_apertura, fk_despacho, fk_motivo, status, observacion', 'safe', 'on'=>'search'),
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
			'fkDespacho' => array(self::BELONGS_TO, 'Despacho', 'fk_despacho'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_apertura' => 'Id Apertura',
			'fk_despacho' => 'Fk Despacho',
			'fk_motivo' => 'Fk Motivo',
			'status' => 'Status',
			'observacion' => 'Observación',
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

		$criteria->compare('id_apertura',$this->id_apertura);
		$criteria->compare('fk_despacho',$this->fk_despacho);
		$criteria->compare('fk_motivo',$this->fk_motivo);
		$criteria->compare('status',$this->status);
		$criteria->compare('observacion',$this->observacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Apertura the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
