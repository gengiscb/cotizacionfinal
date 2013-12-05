<?php
/* @var $this ArticuloController */
/* @var $model Articulo */

$this->breadcrumbs=array(
	'Articulos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Lista Articulo', 'url'=>array('index')),
	array('label'=>'Crear Articulo', 'url'=>array('create')),
	array('label'=>'Actualizar Articulo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Eliminar Articulo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Articulo', 'url'=>array('admin')),
);
?>

<h1>View Articulo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'cantidad',
		'unidad',
		'cotizacion',
		'compra',
		'descripcion',
		'id_solicitud',
		'idProveedor.nombre',
		'precio',
		'tiempo_entrega',
		'idGarantia.garantia',
		'fecha_surtido',
	),
)); ?>
