<?php
/* @var $this LayersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Layers',
);

$this->menu=array(
	array('label'=>'Create Layers', 'url'=>array('create')),
	array('label'=>'Manage Layers', 'url'=>array('admin')),
);
?>

<h1>Layers</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
