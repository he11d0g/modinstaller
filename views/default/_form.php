<?php
/**
 * @author: he11d0g <im@helldog.net>
 * @date:   15.10.13
 * @link    http://helldog.net
 */

$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'                     => 'module-form',
    'enableAjaxValidation'   => false,
    'enableClientValidation' => true,
    'type'                   => 'vertical',
    'htmlOptions'            => array('class' => 'well', 'enctype'=>'multipart/form-data'),
    'inlineErrors'           => true,
)); ?>
<div>
    <div >
        <?php echo $form->fileField($model,'file') ?>
    </div>
    <div >
        <?php echo $form->textField($model,'url') ?>
    </div>
</div>
<?php echo CHtml::submitButton('Установить') ?>
<?php $this->endWidget() ?>