<?php

/* @var $this yii\web\View */
/* @var $model News */

use common\models\News;
use yii\helpers\Html;
use \common\models\NewsSource;
use \common\models\NewsComment;

$this->title = 'My Yii Application';
?>

<h4 class="comments-count" style="font-size: 24px"><?=$model->getNewsCommentNum()?> Comments</h4>

<?php $news_comments = $model->getNewsComments()->all(); ?>
<?php foreach ($news_comments as $comment):?>
    <div class="comment">
        <div class="d-flex">
            <div class="comment-img"><img src="../../common/static/images/users/default1.png" alt=""></div>
            <div>
                <?php $user = $comment->getCommentUser()->one(); ?>
                <h5 style="font-size: 20px"><a><?=$user->username?></a> <a href="#" class="reply"><i class="bi bi-reply-fill"></i> Reply</a></h5>
                <time style="font-size: 16px"><?=$comment->comment_time?></time>
                <p style="font-size: 15px">
                    <?=$comment->comment_content?>
                </p>
            </div>
        </div>
    </div>
<?php endforeach;?>

<div class="reply-form">
    <h4>Leave a Comment</h4>
    <?= Html::beginForm('@web/index.php?r=site/add-news-comment') ?>
        <div class="row">
            <div class="col form-group">
                <textarea name="comment" class="form-control" placeholder="Your Comment*"></textarea>
            </div>
        </div>
        <input type="hidden" name="news_id" value="<?=$model->news_id?>">
        <input type="hidden" name="user_id" value="<?=Yii::$app->user->id?>">
        <button type="submit" class="btn btn-primary">Post Comment</button>
    <?= Html::endForm() ?>

</div>
