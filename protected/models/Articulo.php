<?php

/**
 * This is the model class for table "articulo".
 *
 * The followings are the available columns in table 'articulo':
 * @property integer $id
 * @property string $cantidad
 * @property string $unidad
 * @property integer $cotizacion
 * @property integer $compra
 * @property string $descripcion
 * @property integer $id_solicitud
 * @property integer $id_proveedor
 * @property string $precio
 * @property string $tiempo_entrega
 * @property integer $id_garantia
 * @property string $fecha_surtido
 *
 * The followings are the available model relations:
 * @property Solicitud $idSolicitud
 * @property Proveedor $idProveedor
 * @property Garantia $idGarantia
 */
class Articulo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'articulo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cantidad, unidad, cotizacion, compra, descripcion, id_solicitud', 'required'),
			array('cotizacion, compra, id_solicitud, id_proveedor, id_garantia', 'numerical', 'integerOnly'=>true),
			array('cantidad, tiempo_entrega', 'length', 'max'=>10),
			array('unidad', 'length', 'max'=>20),
			array('descripcion', 'length', 'max'=>500),
			array('precio', 'length', 'max'=>19),
			array('fecha_surtido', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, cantidad, unidad, cotizacion, compra, descripcion, id_solicitud, id_proveedor, precio, tiempo_entrega, id_garantia, fecha_surtido', 'safe', 'on'=>'search'),
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
			'idSolicitud' => array(self::BELONGS_TO, 'Solicitud', 'id_solicitud'),
			'idProveedor' => array(self::BELONGS_TO, 'Proveedor', 'id_proveedor'),
			'idGarantia' => array(self::BELONGS_TO, 'Garantia', 'id_garantia'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'cantidad' => 'Cantidad',
			'unidad' => 'Unidad',
			'cotizacion' => 'Cotizacion',
			'compra' => 'Compra',
			'descripcion' => 'Descripcion',
			'id_solicitud' => 'Id Solicitud',
			'id_proveedor' => 'Id Proveedor',
			'precio' => 'Precio',
			'tiempo_entrega' => 'Tiempo Entrega',
			'id_garantia' => 'Id Garantia',
			'fecha_surtido' => 'Fecha Surtido',
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
		$criteria->compare('cantidad',$this->cantidad,true);
		$criteria->compare('unidad',$this->unidad,true);
		$criteria->compare('cotizacion',$this->cotizacion);
		$criteria->compare('compra',$this->compra);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('id_solicitud',$this->id_solicitud);
		$criteria->compare('id_proveedor',$this->id_proveedor);
		$criteria->compare('precio',$this->precio,true);
		$criteria->compare('tiempo_entrega',$this->tiempo_entrega,true);
		$criteria->compare('id_garantia',$this->id_garantia);
		$criteria->compare('fecha_surtido',$this->fecha_surtido,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Articulo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
