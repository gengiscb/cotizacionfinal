<?php
/* @var $this GarantiaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Garantias',
);

$this->menu=array(
	array('label'=>'Create Garantia', 'url'=>array('create')),
	array('label'=>'Manage Garantia', 'url'=>array('admin')),
);
?>

<h1>Garantias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
