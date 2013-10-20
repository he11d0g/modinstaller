<?php
/**
 * @author: he11d0g <im@helldog.net>
 * @date:   15.10.13
 * @link    http://helldog.net
 */

class Form extends CFormModel
{
    public $file;
    public $url;

    public function rules()
    {
        return array(
            array('file','file','types' => 'zip','allowEmpty' => true),
            array('url','url','allowEmpty' => true),
        );
    }

    public function saveModule()
    {
        $file = CUploadedFile::getInstance($this,'file');
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