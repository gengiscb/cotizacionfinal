<?php
/* @var $this SolicitudController */
/* @var $data Solicitud */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('area')); ?>:</b>
	<?php echo CHtml::encode($data->area); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha')); ?>:</b>
	<?php echo CHtml::encode($data->fecha); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarioResponsable')); ?>:</b>
	<?php echo CHtml::encode($data->usuarioResponsable); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('proyecto')); ?>:</b>
	<?php echo CHtml::encode($data->proyecto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estado')); ?>:</b>
	<?php echo CHtml::encode($data->id_estado); ?>
	<br />


</div>