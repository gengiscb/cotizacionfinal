<?php
/* @var $this ArticuloController */
/* @var $model Articulo */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Articulo', 'url'=>array('index')),
	array('label'=>'Create Articulo', 'url'=>array('create')),
	array('label'=>'View Articulo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Articulo', 'url'=>array('admin')),
);
?>

<h1>Update Articulo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>