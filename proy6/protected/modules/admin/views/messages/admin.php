<?php
/* @var $this MessagesController */
/* @var $model Messages */

$this->breadcrumbs=array(
	'Messages'=>array('index'),
	'Manage',
);


Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('messages-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Messages</h1>
<div class="row buttons" style="float: right; width: 120px; margin-right: -3px;">
<?php echo CHtml::link('Create messages ', array('/admin/messages/create'),array('class'=>'uibutton confirm')); ?>
    </div>
<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'messages-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'from_user_id',
		'to_user_id',
         array(
             'name' => 'date',
             'value' => 'Functions::getTimeUSA($data->date)',
         ),
            'read_status',
            array(
            'name' => 'read_status',
            'value' => '($data->read_status)?"read":"unread"',
                
                'filter' =>  array(1=>'unread',0=>'read') ,
        ),
		/*
		'read_status',*/
		 array(
		    'class' => 'CButtonColumn',
		    'template' => '{view}',
//                    'viewButtonUrl'   => 'Yii::app()->createUrl("/admin/comments/view", array("id"=>$data->id))',
//		    'updateButtonUrl' => 'Yii::app()->createUrl("/admin/comments/update", array("id"=>$data->id))',
//		    'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/comments/delete", array("id"=>$data->id))'
		)
	),
)); ?>
