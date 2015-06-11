<?php

/**
 * This is the model class for table "track.desp_envio".
 *
 * The followings are the available columns in table 'track.desp_envio':
 * @property integer $id_despacho
 * @property integer $id_envio
 */
class DespEnvio extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.desp_envio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_despacho, id_envio', 'required'),
			array('id_despacho, id_envio', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_despacho, id_envio', 'safe', 'on'=>'search'),
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
			'id_despacho' => 'Id Despacho',
			'id_envio' => 'Id Envio',
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

		$criteria->compare('id_despacho',$this->id_despacho);
		$criteria->compare('id_envio',$this->id_envio);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
         public static function BuscarById($idEnvio){
       $consulta = self::model()->findAllByAttributes(array('id_envio'=>$idEnvio));
       $despacho= $consulta[0]['id_despacho'];
        return $despacho;
   }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return DespEnvio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
