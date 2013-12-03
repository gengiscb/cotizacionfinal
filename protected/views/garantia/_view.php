<?php
/* @var $this GarantiaController */
/* @var $data Garantia */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('garantia')); ?>:</b>
	<?php echo CHtml::encode($data->garantia); ?>
	<br />


</div>