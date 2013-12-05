<?php
/* @var $this SolicitudController */
/* @var $model Solicitud */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'solicitud-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'area'); ?>
		<?php echo $form->textField($model,'area',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'area'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'proyecto'); ?>
		<?php echo $form->textField($model,'proyecto',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'proyecto'); ?>
	</div>
        
        <div class="row">

		<?php echo $form->labelEx($model,'id_estado'); ?>
                <?php echo $form->dropDownList($model, 'id_estado', CHtml::listData(Estado::model()->findAll(array('order'=>'estado')), 'id','estado'), array('empty'=>'Seleccionar..')); ?>
		<?php echo $form->error($model,'id_estado'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>
        <?php //var_dump(Estado::model()->findAll(array('order'=>'estado'))); ?>
        <?php //var_dump($model); ?>
        <?php //var_dump($_POST); ?>

<?php $this->endWidget(); ?>

</div><!-- form -->