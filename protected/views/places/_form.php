<?php
/* @var $this PlacesController */
/* @var $model Places */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'places-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'point'); ?>
		<?php echo $form->textField($model,'point'); ?>
		<?php echo $form->error($model,'point'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'layer'); ?>
		<?php echo $form->textField($model,'layer'); ?>
		<?php echo $form->error($model,'layer'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->