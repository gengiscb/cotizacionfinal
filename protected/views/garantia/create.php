<?php
/* @var $this GarantiaController */
/* @var $model Garantia */

$this->breadcrumbs=array(
	'Garantias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Garantia', 'url'=>array('index')),
	array('label'=>'Manage Garantia', 'url'=>array('admin')),
);
?>

<h1>Create Garantia</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>