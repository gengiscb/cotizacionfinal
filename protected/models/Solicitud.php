<?php

/**
 * This is the model class for table "solicitud".
 *
 * The followings are the available columns in table 'solicitud':
 * @property integer $id
 * @property string $area
 * @property string $fecha
 * @property integer $usuarioResponsable
 * @property string $proyecto
 * @property integer $id_estado
 *
 * The followings are the available model relations:
 * @property Articulo[] $articulos
 * @property Usuario $usuarioResponsable0
 * @property Estado $idEstado
 */
class Solicitud extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'solicitud';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('area, proyecto', 'required'),
                        array('id_estado', 'required', 'on'=>'Update'),
			//array('usuarioResponsable', 'numerical', 'integerOnly'=>true),
			array('area', 'length', 'max'=>100),
			array('proyecto', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, area, fecha, usuarioResponsable, proyecto, id_estado', 'safe', 'on'=>'search'),
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
			'articulos' => array(self::HAS_MANY, 'Articulo', 'id_solicitud'),
			'usuario' => array(self::BELONGS_TO, 'Usuario', 'usuarioResponsable'),
			'idEstado' => array(self::BELONGS_TO, 'Estado', 'id_estado'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'area' => 'Area',
			'fecha' => 'Fecha',
			'usuarioResponsable' => 'Usuario Responsable',
			'proyecto' => 'Proyecto',
			'id_estado' => 'Id Estado',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('area',$this->area,true);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('usuarioResponsable',$this->usuarioResponsable);
		$criteria->compare('proyecto',$this->proyecto,true);
		$criteria->compare('id_estado',$this->id_estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Solicitud the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        protected function beforeSave() {
        if (parent::beforeSave()) {
            //Yii::app()->user-id devuelve el login del usuario
            if($this->isNewRecord)
                $this->usuarioResponsable = Yii::app()->user->id;
            return true;
        }
        return FALSE;
    }
}
