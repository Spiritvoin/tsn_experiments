<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs = array(
        'Users' => array('index'),
        'Manage',
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<?php 
 
$this->widget('zii.widgets.grid.CGridView', array(
        'id' => 'user-grid',
        'dataProvider' => $model->search(),
        'filter' => $model,
        'columns' => array(
                'id',
                'email',
                array(
                        'name' => 'role_id',
                        'value' => 'User::model()->getTextTypeUser($data->role_id)',
                        'filter' => CHtml::activeDropDownList($model, 'role_id', User::getArrayTypesUser(), array('empty' => 'All')),
                ),
                'first_name',
                'last_name',
                'phone',
                array(
                        'name' => 'date_create',
                        'value' => 'User::getTimeUSA($data->date_create)',
                ),
                array(
                        'class' => 'CButtonColumn',
                ),
        ),
));
 
?>
