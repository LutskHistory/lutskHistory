<?php
/* @var $this PlacesController */
/* @var $data Places */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('point')); ?>:</b>
	<?php echo CHtml::encode($data->point); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('layer')); ?>:</b>
	<?php echo CHtml::encode($data->layer); ?>
	<br />


</div>