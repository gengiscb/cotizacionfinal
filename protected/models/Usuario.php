<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property integer $id
 * @property string $usuario
 * @property string $contrasena
 * @property string $correo
 * @property string $nombres
 * @property string $apellidos
 *
 * The followings are the available model relations:
 * @property Solicitud[] $solicituds
 * @property Usuariorol[] $usuariorols
 */
class Usuario extends CActiveRecord
{
        public $_contrasena2;
        public $_confirmarContrasena;
        public $_roles;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, _contrasena2, _confirmarContrasena, correo, nombres, apellidos', 'required'),
			array('usuario', 'length', 'max'=>20),
			array('contrasena', 'length', 'max'=>35),
			array('correo', 'length', 'max'=>100),
			array('nombres, apellidos', 'length', 'max'=>150),
			array('_roles', 'safe'),
			array('_contrasena2','compare','compareAttribute'=>'_confirmarContrasena','on'=>'create'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, usuario, contrasena, correo, nombres, apellidos', 'safe', 'on'=>'search'),
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
			'solicituds' => array(self::HAS_MANY, 'Solicitud', 'usuarioResponsable'),
			'usuariorols' => array(self::HAS_MANY, 'Usuariorol', 'id_usuario'),
			'roles' => array(self::MANY_MANY, 'Rol', 'usuariorol(id_usuario,id_rol)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'usuario' => 'Usuario',
			'contrasena' => 'Contraseña',
			'_contrasena2' => 'Contraseña',
			'correo' => 'Correo',
			'nombres' => 'Nombres',
			'apellidos' => 'Apellidos',
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
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('contrasena',$this->contrasena,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('nombres',$this->nombres,true);
		$criteria->compare('apellidos',$this->apellidos,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
        protected function beforeSave(){
            if(parent:: beforeSave())
            {
                $this->contrasena=  crypt($this->_contrasena2);
                return TRUE;
            }
            return FALSE;
        }
        
        protected function afterSave(){
            parent::afterSave();
            foreach($this->_roles as $rol){
                $relRol = new Usuariorol();
                $relRol->id_usuario = $this->id;
                $relRol->id_rol = $rol;
                $relRol->save();
            }
        }
        
        public function getTextRoles(){
            $roles = array();
            foreach($this->roles as $rol)
                $roles[] = $rol->nombreRol;
            return $roles;
        }
        
        public function getNombreCompleto(){
            return $this->nombres.' '.$this->apellidos;
        }
}
