<?php

/**
 * This is the model class for table "tipo_vehiculo".
 *
 * The followings are the available columns in table 'tipo_vehiculo':
 * @property integer $id_tipov
 * @property string $descripcion
 */
class TipoVehiculo extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'track.tipo_vehiculo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_tipov', 'numerical', 'integerOnly' => true),
            array('descripcion', 'length', 'max' => 20),
            array('descripcion', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_tipov, descripcion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_tipov' => 'Id Tipov',
            'descripcion' => 'Descripción del Tipo de Vehículo ',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('id_tipov', $this->id_tipov);
        $criteria->compare('descripcion', $this->descripcion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function BuscarTipo($Order = false) {
        $criteria = new CDbCriteria;
        if (!$Order) {
            $criteria->order = 't.descripcion ASC';
        } else {
            $criteria->order = $Order;
        }
        /* $criteria->addColumnCondition(array('t.padre' => $IdPadre));  */
        $data = CHtml::listData(self::model()->findAll($criteria), 'id_tipov', 'descripcion');
        return $data;
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TipoVehiculo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
