<?php
/* @var $this ProveedorController */
/* @var $model Proveedor */

$this->breadcrumbs=array(
	'Proveedors'=>array('index'),
	$model->folio,
);

$this->menu=array(
	array('label'=>'Lista Proveedor', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Actualizarå Proveedor', 'url'=>array('update', 'id'=>$model->folio)),
	array('label'=>'Eliminar Proveedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->folio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Proveedor', 'url'=>array('admin')),
);
?>

<h1>View Proveedor #<?php echo $model->folio; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'folio',
		'nombre',
		'nombreCorto',
		'contacto',
		'correo',
		'tel',
	),
)); ?>
