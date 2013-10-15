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


}