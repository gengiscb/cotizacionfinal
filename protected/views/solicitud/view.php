<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */

$this->breadcrumbs=array(
	'Solicituds'=>array('index'),
	$model->id,
);

$this->menu=array(
        array('label'=>'Agregar Articulo', 'url'=>array('articulo/create','solicitud'=>$model->id)),
	array('label'=>'Listar Solicitud', 'url'=>array('index')),
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	array('label'=>'Actualizar Solicitud', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Borrar Solicitud', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Realmente desea eliminar la solicitud?')),
	array('label'=>'Administrar Solicitud', 'url'=>array('admin')),
);
?>

<h1>View Solicitud #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'area',
		'fecha',
		'usuario.nombreCompleto',
		'proyecto',
		'idEstado.estado',
	),
)); ?>

<div>
    <?php echo CHtml::link('Finalizar',array('solicitud/finalizarSolicitud','id'=>$model->id)); ?>
</div>

<?php foreach ($model->articulos as $articulo): ?>
<div class="row">
    <div class="articulo">
        
        <h3><?php echo CHtml::encode($articulo->getAttributeLabel('Articulo')); ?></h3>
        <h5>id articulo: <?php echo CHtml::link(
                           $articulo->id,
                           array(
                             'articulo/view',
                              'id'=>$articulo->id,
                            )
            );?></h5>
        <div>Descripcion: <?php echo CHtml::encode($articulo->descripcion); ?></div>   
        <div>Cantidad: <?php echo CHtml::encode($articulo->cantidad); ?></div>
        <div>Unidad: <?php echo CHtml::encode($articulo->unidad); ?></div>   
    </div>
</div>
<?php endforeach; ?>
