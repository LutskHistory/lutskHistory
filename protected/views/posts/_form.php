<?php
/* @var $this PostsController */
/* @var $model Posts */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'posts-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php echo $form->textArea($model,'text',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<?php echo $form->textField($model,'author'); ?>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'point'); ?>
		<?php echo $form->textField($model,'point'); ?>
		<?php echo $form->error($model,'point'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'views'); ?>
		<?php echo $form->textField($model,'views'); ?>
		<?php echo $form->error($model,'views'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'like'); ?>
		<?php echo $form->textField($model,'like'); ?>
		<?php echo $form->error($model,'like'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dislike'); ?>
		<?php echo $form->textField($model,'dislike'); ?>
		<?php echo $form->error($model,'dislike'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'image'); ?>
		<?php echo $form->textField($model,'image',array('size'=>60,'maxlength'=>400)); ?>
		<?php echo $form->error($model,'image'); ?>
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