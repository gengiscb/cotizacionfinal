<?php
/* @var $this ArticuloController */
/* @var $model Articulo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'articulo-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'unidad'); ?>
		<?php echo $form->textField($model,'unidad',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'unidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cotizacion'); ?>
                <?php echo $form->checkBox($model,'cotizacion',array('checked'=>'1')); ?>
		<?php echo $form->error($model,'cotizacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'compra'); ?>
		<?php echo $form->checkBox($model,'compra',array('checked'=>'1')); ?>
		<?php echo $form->error($model,'compra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->