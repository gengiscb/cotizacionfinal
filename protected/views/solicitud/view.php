<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs=array(
	'Solicituds'=>array('index'),
	$model->id,
);

$this->menu=array(
        array('label'=>'Agregar Articulo', 'url'=>array('articulo/create','solicitud'=>$model->id)),
	array('label'=>'List Solicitud', 'url'=>array('index')),
	array('label'=>'Create Solicitud', 'url'=>array('create')),
	array('label'=>'Update Solicitud', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Solicitud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Solicitud', 'url'=>array('admin')),
);
?>

<h1>View Solicitud #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'area',
		'fecha',
		'usuarioResponsable',
		'proyecto',
		'id_estado',
	),
)); ?>

<?php foreach ($model->articulos as $articulo): ?>
<div class="row">
    <div class="articulo">
        <h3><?php echo CHtml::encode($articulo->getAttributeLabel('Articulo')); ?></h3>
        <div>Descripcion: <?php echo CHtml::encode($articulo->descripcion); ?></div>   
        <div>Cantidad: <?php echo CHtml::encode($articulo->cantidad); ?></div>
        <div>Unidad: <?php echo CHtml::encode($articulo->unidad); ?></div>   
    </div>
</div>
<?php endforeach; ?>
