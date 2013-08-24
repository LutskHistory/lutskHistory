<?php
/* @var $this LayersController */
/* @var $model Layers */

$this->breadcrumbs=array(
	'Layers'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Layers', 'url'=>array('index')),
	array('label'=>'Create Layers', 'url'=>array('create')),
	array('label'=>'View Layers', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Layers', 'url'=>array('admin')),
);
?>

<h1>Update Layers <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>