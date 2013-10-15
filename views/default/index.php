<?php
/**
 * @author: he11d0g <im@helldog.net>
 * @date:   15.10.13
 * @link    http://helldog.net
 */

    $this->breadcrumbs = array(
        Yii::app()->getModule('modinstaller')->getCategory() => array(),
        Yii::t('ModInstallerModule.modinstaller', 'Установка модулей') => array('/modinstall/default/index'),
    );

$this->pageTitle = Yii::t('ModInstallerModule.modinstaller', 'Установка модулей');

$this->menu = array(
    array('icon' => 'list-alt', 'label' => Yii::t('ModInstallerModule.modinstaller', 'Настройки'), 'url' => array('/modinstaller/default/index')),
);
?>
<div class="page-header">
    <h1>
        <?php echo Yii::t('ModInstallerModule.modinstaller', 'Установка модулей'); ?>
    </h1>
</div>
<br/>

<p><?php echo Yii::t('ModInstallerModule.modinstaller', 'Модуль позволяет произвести установку сторонних модулей'); ?></p>

<?php $this->renderPartial('_form',array('model' =>$model)); ?>