<?php

class SettingsController extends Controller
{

    public function actionIndex()
    {
        $request = Yii::app()->request;
        $configPostData = $request->getPost('Settings');
        $criteria = new CDbCriteria();
        $criteria->index = 'key';

        if ($configPostData) {
            foreach ($configPostData as $key => $value) {
                $model = Settings::model()->findByPk($key);
                $model->value = $value;
                $model->save();
            }
            Yii::app()->user->setFlash('success', 'Data saved successfully');
            $this->redirect(array('/admin/settings/index'));
        }

        $this->render('index');
    }

}