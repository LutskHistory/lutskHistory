<?php
/* @var $this PointsController */
/* @var $model Points */

$this->breadcrumbs=array(
	'Points'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Points', 'url'=>array('index')),
	array('label'=>'Create Points', 'url'=>array('create')),
	array('label'=>'Update Points', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Points', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Points', 'url'=>array('admin')),
);
?>

<h1>View Points #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'lat',
		'lng',
		'name',
		'description',
		'image',
		'views_count',
		'hist_date',
	),
)); ?>
