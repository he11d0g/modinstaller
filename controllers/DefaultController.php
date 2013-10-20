<?php
/**
 * @author: he11d0g <im@helldog.net>
 * @date:   15.10.13
 * @link    http://helldog.net
 */

class DefaultController extends yupe\components\controllers\BackController
{
    private $_error;

    public function actionIndex()
    {
        $model = new Form();
        if(isset($_POST['Form'])){
            if(Yii::app()->controller->module->checkSelf() === true)
            {
                $model->attributes = $_POST['Form'];
                if($model->validate()) {
                    $model->saveModule();
                }
             }
        }
        $this->render('index',array('model' => $model));
    }

}