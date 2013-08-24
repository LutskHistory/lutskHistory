<?php
/* @var $this PointsController */
/* @var $model Points */

$this->breadcrumbs=array(
	'Points'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Points', 'url'=>array('index')),
	array('label'=>'Manage Points', 'url'=>array('admin')),
);
?>

<h1>Create Points</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>