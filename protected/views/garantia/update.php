<?php
/* @var $this GarantiaController */
/* @var $model Garantia */

$this->breadcrumbs=array(
	'Garantias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Garantia', 'url'=>array('index')),
	array('label'=>'Create Garantia', 'url'=>array('create')),
	array('label'=>'View Garantia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Garantia', 'url'=>array('admin')),
);
?>

<h1>Update Garantia <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>