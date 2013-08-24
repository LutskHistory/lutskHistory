<?php
/* @var $this PointsController */
/* @var $model Points */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'points-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'lat'); ?>
		<?php echo $form->textField($model,'lat'); ?>
		<?php echo $form->error($model,'lat'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lng'); ?>
		<?php echo $form->textField($model,'lng'); ?>
		<?php echo $form->error($model,'lng'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description',array('size'=>60,'maxlength'=>500)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'views_count'); ?>
		<?php echo $form->textField($model,'views_count'); ?>
		<?php echo $form->error($model,'views_count'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'hist_date'); ?>
		<?php echo $form->textField($model,'hist_date'); ?>
		<?php echo $form->error($model,'hist_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->