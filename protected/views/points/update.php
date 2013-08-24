<?php
/* @var $this PointsController */
/* @var $model Points */

$this->breadcrumbs=array(
	'Points'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Points', 'url'=>array('index')),
	array('label'=>'Create Points', 'url'=>array('create')),
	array('label'=>'View Points', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Points', 'url'=>array('admin')),
);
?>

<h1>Update Points <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>