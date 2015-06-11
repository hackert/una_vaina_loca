<?php

/**
 * This is the model class for table "track.bitacora_transito".
 *
 * The followings are the available columns in table 'track.bitacora_transito':
 * @property integer $id_transito
 * @property integer $fksede_salida
 * @property string $fecha_salida
 * @property integer $fksede_llegada
 * @property string $fecha_llegada
 * @property integer $id_fkestatus
 * @property string $create_date
 * @property string $modified_date
 * @property integer $peso_salida
 * @property integer $peso_llegada
 * @property integer $fk_despacho
 *
 * The followings are the available model relations:
 * @property Observacion[] $track.observacions
 * @property Despacho $fkDespacho
 */
class BitacoraTransito extends CActiveRecord {

    public $cod_paquete;
    public $fk_tipo_despacho;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'track.bitacora_transito';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('peso_llegada,fecha_llegada, fk_despacho', 'required'),
            array('fksede_salida, fksede_llegada, id_fkestatus, peso_salida, peso_llegada,fk_tipo_despacho, fk_despacho', 'numerical', 'integerOnly' => true),
            array('fecha_salida, fecha_llegada, create_date, modified_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id_transito, fksede_salida, fecha_salida, cod_paquete,fksede_llegada, fk_tipo_despacho,fecha_llegada, id_fkestatus, create_date, modified_date, peso_salida, peso_llegada, fk_despacho', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'track.observacions' => array(self::MANY_MANY, 'Observacion', 'obser_transito(id_transito, id_observacion)'),
            'fkDespacho' => array(self::BELONGS_TO, 'Despacho', 'fk_despacho'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id_transito' => 'Id Transito',
            'fksede_salida' => 'Sede de Salida',
            'fecha_salida' => 'Fecha de Salida',
            'fksede_llegada' => 'Sede de Llegada',
            'fecha_llegada' => 'Fecha de Llegada',
            'id_fkestatus' => 'Id Fkestatus',
            'create_date' => 'Fecha de creacion',
            'modified_date' => 'Fecha de Salida',
            'peso_salida' => 'Peso Salida',
            'peso_llegada' => 'Peso Llegada',
            'fk_despacho' => 'Código del Despacho',
            'cod_paquete' => 'Código del paquete',
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

        $criteria->compare('id_transito', $this->id_transito);
        $criteria->compare('fksede_salida', $this->fksede_salida);
        $criteria->compare('fecha_salida', $this->fecha_salida, true);
        $criteria->compare('fksede_llegada', $this->fksede_llegada);
        $criteria->compare('fecha_llegada', $this->fecha_llegada, true);
        $criteria->compare('id_fkestatus', $this->id_fkestatus);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('modified_date', $this->modified_date, true);
        $criteria->compare('peso_salida', $this->peso_salida);
        $criteria->compare('peso_llegada', $this->peso_llegada);
        $criteria->compare('fk_despacho', $this->fk_despacho);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return BitacoraTransito the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function BuscarByIdTipo($fkDespacho, $sede) {
        $consulta = self::model()->findAllByAttributes(array('fk_despacho' => $fkDespacho, 'fksede_llegada' => $sede));
        if (!empty($consulta)) {
            $estatus = $consulta[0]['id_fkestatus'];
            //var_dump($estatus);die;
            return $estatus;
        } else {
            return $consulta;
        }
    }

    public static function BuscarByCodDespacho($fkDespacho) {
        $consulta = self::model()->findAllByAttributes(array('fk_despacho' => $fkDespacho));

        //  var_dump($consulta);Die;
        return $consulta;
    }

}
