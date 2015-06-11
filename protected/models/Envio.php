 <?php

/**
 * This is the model class for table "track.envio".
 *
 * The followings are the available columns in table 'track.envio':
 * @property integer $id_envio
 * @property integer $tipo_envio
 * @property integer $cant_articulo
 * @property string $codigo_envio
 * @property string $create_date
 * @property string $modified_date
 * @property string $num_saca
 * @property integer $peso_total
 */
class Envio extends CActiveRecord
{
	Public $fecha_admision;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'track.envio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo_envio, cant_articulo', 'required'),
			array('tipo_envio, cant_articulo, peso_total', 'numerical', 'integerOnly'=>true),
			array('codigo_envio', 'length', 'max'=>20),
			array('num_saca', 'length', 'max'=>10),
			array('create_date, modified_date', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_envio, tipo_envio, cant_articulo, codigo_envio, create_date, modified_date, num_saca, peso_total', 'safe', 'on'=>'search'),
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
			'id_envio' => 'Id Envio',
			'tipo_envio' => 'Tipo Despacho',
			'cant_articulo' => 'Cantidad de Articulos',
			'codigo_envio' => 'Codigo Articulo',
			'create_date' => 'Create Date',
			'modified_date' => 'Modified Date',
			'num_saca' => 'Número Saca',
			'peso_total' => 'Peso Total',
		);
	}



/*  ------------------------------------- */

public function generarCodigo()
{
    $codigo = "x";
 $sql = "select max(id_envio)+1 as codigo from track.envio";
 
 $data = Yii::app()->db->createCommand($sql)->queryRow();
        
        if (!empty($data)) {   
                    $codigo ='EM'.str_pad($data['codigo'], 9, "0", STR_PAD_LEFT).'VE';           
          
        } 
 return $codigo;
}

/*  ------------------------------------- */


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

		$criteria->compare('id_envio',$this->id_envio);
		$criteria->compare('tipo_envio',$this->tipo_envio);
		$criteria->compare('cant_articulo',$this->cant_articulo);
		$criteria->compare('codigo_envio',$this->codigo_envio,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('modified_date',$this->modified_date,true);
		$criteria->compare('num_saca',$this->num_saca);
		$criteria->compare('peso_total',$this->peso_total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Envio the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
