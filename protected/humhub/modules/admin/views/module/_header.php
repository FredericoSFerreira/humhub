<?php

use yii\helpers\Html;
use yii\helpers\Url;

$updatesBadge = '';
$uploadCount = '';

if (Yii::$app->controller->id == 'module') {
    if (Yii::$app->getModule('admin')->marketplaceEnabled) {
        $updatesCount = count(Yii::$app->controller->getOnlineModuleManager()->getModuleUpdates());
        if ($updatesCount > 0) {
            $updatesBadge = '&nbsp;&nbsp;<span class="label label-danger">' . $updatesCount . '</span>';
        } else {
            $updatesBadge = '&nbsp;&nbsp;<span class="label label-default">0</span>';
        }
    }
}
?>
<p><?php echo Yii::t('AdminModule.views_module_header', 'Modules extend the functionality of HumHub. Here you can install and manage modules from the HumHub Marketplace.') ?></p>
<hr/>
<ul class="nav nav-pills" id="moduleTabs">
    <li <?php if ($this->context->action->id == 'list') echo 'class="active"'; ?>><?php echo Html::a(Yii::t('AdminModule.views_module_header', 'Installed'), Url::to(['list'])); ?></li>
    <?php if (Yii::$app->getModule('admin')->marketplaceEnabled) : ?>
        <li <?php if ($this->context->action->id == 'listOnline') echo 'class="active"'; ?>><?php echo Html::a(Yii::t('AdminModule.views_module_header', 'Browse online'), Url::to(['list-online'])); ?></li>
        <li <?php if ($this->context->action->id == 'listUpdates') echo 'class="active"'; ?>><?php echo Html::a(Yii::t('AdminModule.views_module_header', 'Available updates') . $updatesBadge, Url::to(['list-updates'])); ?></li>
    <?php endif; ?>
</ul>

