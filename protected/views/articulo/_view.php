<?php
/* @var $this ArticuloController */
/* @var $data Articulo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('unidad')); ?>:</b>
	<?php echo CHtml::encode($data->unidad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cotizacion')); ?>:</b>
	<?php echo CHtml::encode($data->cotizacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('compra')); ?>:</b>
	<?php echo CHtml::encode($data->compra); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_solicitud')); ?>:</b>
	<?php echo CHtml::encode($data->id_solicitud); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_proveedor')); ?>:</b>
	<?php echo CHtml::encode($data->id_proveedor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('precio')); ?>:</b>
	<?php echo CHtml::encode($data->precio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiempo_entrega')); ?>:</b>
	<?php echo CHtml::encode($data->tiempo_entrega); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_garantia')); ?>:</b>
	<?php echo CHtml::encode($data->id_garantia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_surtido')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_surtido); ?>
	<br />

	*/ ?>

</div>