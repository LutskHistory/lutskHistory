<?php
/* @var $this LayersController */
/* @var $model Layers */

$this->breadcrumbs=array(
	'Layers'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Layers', 'url'=>array('index')),
	array('label'=>'Manage Layers', 'url'=>array('admin')),
);
?>

<h1>Create Layers</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>