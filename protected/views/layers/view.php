<?php
/* @var $this LayersController */
/* @var $model Layers */

$this->breadcrumbs=array(
	'Layers'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Layers', 'url'=>array('index')),
	array('label'=>'Create Layers', 'url'=>array('create')),
	array('label'=>'Update Layers', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Layers', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Layers', 'url'=>array('admin')),
);
?>

<h1>View Layers #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'icon',
	),
)); ?>
