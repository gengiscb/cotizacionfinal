<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bienvenido al <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<div>
    <?php echo CHtml::link('Ver solicitudes',array('solicitud/index')); ?>
</div>
<div>
    <?php echo CHtml::link('Ver solicitudes2',array('solicitud/index2')); ?>
</div>
<div>
     <?php echo CHtml::link('Crear solicitud',array('solicitud/create')); ?>
</div>

