<?php
/* @var $this SolicitudController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Solicituds',
);

$this->menu=array(
	array('label'=>'Crear Solicitud', 'url'=>array('create')),
	//array('label'=>'Administrar Solicitudes', 'url'=>array('admin')),
);
?>

<h1>Solicitudes</h1>
<!--
<?php 
$id=Yii::app()->user->id;
$solicitudes = Solicitud::model()->findAll('usuarioResponsable=:usuarioResponsable',
        array(
            ':usuarioResponsable'=>$id
        ));
//var_dump($solicitudes);

foreach ($solicitudes as $solicitud)
    echo 'Area : '.$solicitud->area."<br/>".'Proyecto: '.$solicitud->proyecto."<br/>";
    
?>
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
-->
<?php foreach ($solicitudes as $solicitud): ?>
<div class="row"><p>
    <h3>Numero de solicitud: <?php echo CHtml::link(
                           $solicitud->id,
                           array(
                             'solicitud/view',
                              'id'=>$solicitud->id,
                            )
            );?></h3>
            <h5> Area: <?php echo CHtml::encode($solicitud->area); ?></h5>
            <h5> Proyecto: <?php echo CHtml::encode($solicitud->proyecto); ?></h5>
            <h5> Fecha: <?php echo CHtml::encode($solicitud->fecha); ?></h5><br/></p>

</div>
<?php endforeach; ?>
