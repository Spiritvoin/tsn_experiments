<?php
/* @var $this CategoriesController */
/* @var $data Categories */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('permalink')); ?>:</b>
	<?php echo CHtml::encode($data->permalink); ?>
	<br />

<!--	<b><?php //echo CHtml::encode($data->getAttributeLabel('parent')); ?>:</b>
	<?php// echo CHtml::encode($data->parent); ?>
	<br />-->


</div>