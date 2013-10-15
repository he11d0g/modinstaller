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
                    $modulesPath = Yii::app()->controller->module->getModulesPath();
                    $tempFile = $tempPath.'/'.$file->name;
                    $file->saveAs($tempFile);

                    $zip = new ZipArchive();
                    $status = $zip->open($tempFile);
                    if($status === true)
                        $zip->extractTo($modulesPath);
                        $zip->close();
                    } else
                        $this->_error = '';


                    unlink($tempFile);
                }

            }
        $this->render('index',array('model' => $model));
    }
}