<?php

/**
 * Team: 明天上线队
 * Created by 刘宇轩.
 * 后台新闻评论更新页面
 */

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\NewsComment */

$this->title = 'Update News Comment: ' . $model->comment_id;
$this->params['breadcrumbs'][] = ['label' => 'News Comments', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->comment_id, 'url' => ['view', 'id' => $model->comment_id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<?= $this->render('_form', [
    'model' => $model,
    'to' => 'update'
]) ?>
