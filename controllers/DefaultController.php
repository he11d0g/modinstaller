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
                $file = CUploadedFile::getInstance($model,'file');
                if($model->validate()) {
                    $tempPath = Yii::app()->controller->module->getTempPath();
                    $moduleName = str_replace('.phar.zip','',$file->name);
                    $modulePath = Yii::app()->controller->module->getModulesPath().'/'.$moduleName;
                    $tempFile = $tempPath.'/'.$file->name;
                    if($file->saveAs($tempFile)){
                        $phar = new Phar($tempFile);
                        $phar->extractTo($modulePath, null, true);
                        copy($modulePath.'/install/'.$moduleName.'.php', Yii::getPathOfAlias('application.config.modules').'/'.$moduleName.'.php');
                        unlink($tempFile);
                    }


                }
             }
        }
        $this->render('index',array('model' => $model));
    }

}