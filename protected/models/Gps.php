<?php

/**
 * This is the model class for table "gps".
 *
 * The followings are the available columns in table 'gps':
 * @property integer $id_gps
 * @property string $codigo
 * @property string $modelo
 * @property boolean $reporta
 * @property string $imei
 * @property string $sim_card
 * @property string $fecha_instalacion
 * @property string $linea
 */
class Gps extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'track.gps';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('id_gps', 'numerical', 'integerOnly' => true),
            array('codigo, imei, sim_card', 'length', 'max' => 15),
            array('modelo', 'length', 'max' => 20),
            array('linea', 'length', 'max' => 12),
            array('reporta, fecha_instalacion', 'safe'),
            array('modelo,reporta,imei,sim_card,fecha_instalacion,linea', 'required'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_gps, codigo, modelo, reporta, imei, sim_card, fecha_instalacion, linea', 'safe', 'on' => 'search'),
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
            'id_gps' => 'Id Gps',
            'codigo' => 'Codigo Gps ',
            'modelo' => 'Modelo ',
            'reporta' => 'Reporta ',
            'imei' => 'Imei ',
            'sim_card' => 'Sim Card ',
            'fecha_instalacion' => 'Fecha Instalaci&oacute;n ',
            'linea' => 'Linea :',
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

        $criteria->compare('id_gps', $this->id_gps);
        $criteria->compare('codigo', $this->codigo, true);
        $criteria->compare('modelo', $this->modelo, true);
        $criteria->compare('reporta', $this->reporta);
        $criteria->compare('imei', $this->imei, true);
        $criteria->compare('sim_card', $this->sim_card, true);
        $criteria->compare('fecha_instalacion', $this->fecha_instalacion, true);
        $criteria->compare('linea', $this->linea, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Gps the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
