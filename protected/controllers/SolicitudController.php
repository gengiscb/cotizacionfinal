<?php

class SolicitudController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','index2','finalizarSolicitud'),
				'roles'=>array('normal'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','update','create','index','finalizarSolicitud'),
				'roles'=>array('administrador'),
			),
                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','update','index','finalizarSolicitud','create'),
				'roles'=>array('compras'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Solicitud;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Solicitud']))
		{
			$model->attributes=$_POST['Solicitud'];
                        $model->id_estado="5";
                        $model->fecha=date('Y-m-d H:i:s');
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $model->scenario = 'Update';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Solicitud']))
		{
                        $model->attributes=$_POST['Solicitud'];
                        /*
                        if( $model->validate() )
                            echo "<p>Validación correcta</p>";
                        else{
                            echo "<p>Validación incorrecta</p>";
                            echo "<p>";
                            var_dump($model->errors);
                            echo "</p>";
                        }
                        */
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}
        
        public function actionFinalizarSolicitud($id) {
            $solicitud = Solicitud::model()->findByPk($id);
            $solicitud->id_estado=1;
           if( $solicitud->save())
               $this->redirect(array('view','id'=>$solicitud->id));
            
            
        }

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
        $dataProvider=new CActiveDataProvider('Solicitud');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
        
        	public function actionIndex2()
	{
        $id = Yii::app()->user->id;
         $solicitudes = Solicitud::model()->findAll('usuarioResponsable=:usuarioResponsable', array(
            ':usuarioResponsable' => $id
        ));
        $dataProvider=new CActiveDataProvider('Solicitud');
		$this->render('index2',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Solicitud('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Solicitud']))
			$model->attributes=$_GET['Solicitud'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Solicitud the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Solicitud::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Solicitud $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='solicitud-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
