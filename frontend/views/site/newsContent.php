<?php

/**
 * Team: 明天上线队
 * Created by 刘宇轩.
 * 新闻内容展示模块
 */

/* @var $this yii\web\View */
/* @var $model News */

use common\models\News;
use yii\helpers\Html;
use \common\models\NewsSource;
use \common\models\NewsComment;

$this->title = 'My Yii Application';
?>

<div class="col-lg-8 entries">
    <article class="entry entry-single">
        <div class="entry-img">
            <img src="<?="../../common/static/images/news/" . $model->news_photo?>" alt="" class="img-fluid">
        </div>
        <h2 class="entry-title">
            <a><?=$model->news_title?></a>
        </h2>
        <div class="entry-meta">
            <ul>
                <li class="d-flex align-items-center">
                    <i class="bi bi-person"></i>
                    <a><?=$model->news_source?></a>
                </li>
                <li class="d-flex align-items-center">
                    <i class="bi bi-clock"></i>
                    <a><?=$model->news_date?></a>
                </li>
                <li class="d-flex align-items-center">
                    <i class="bi bi-clock-history"></i>
                    <a><?=$model->news_views?></a>
                </li>
                <li class="d-flex align-items-center">
                    <i class="bi bi-chat-dots"></i>
                    <a><?=$model->getNewsCommentNum()?></a>
                </li>
            </ul>
        </div>

        <div class="entry-content">
            <?php $news_content = $model->getNewsContent() ?>
            <?php foreach ($news_content as $content):?>
                <p style="font-size: 15px"><?=$content?></p>
            <?php endforeach;?>
        </div>

    </article><!-- End blog entry -->

    <div class="blog-author d-flex align-items-center">
        <?php $news_source = $model->getNewsSource()?>
        <img src="<?="../../common/static/images/news_source/" . $news_source->source_photo ?>" class="rounded-circle float-left" alt="">
        <div>
            <h4><?=$news_source->source_name?></h4>
            <div class="social-links">
                <a href="<?=$news_source->source_twitter?>"><i class="bi bi-twitter"></i></a>
                <a href="<?=$news_source->source_facebook?>"><i class="bi bi-facebook"></i></a>
                <a href="<?=$news_source->source_instagram?>"><i class="biu bi-instagram"></i></a>
            </div>
            <p><?=$news_source->source_introduction?></p>
        </div>
    </div><!-- End blog author bio -->

    <div class="blog-comments">

        <?= $this->render('newsComment', ['model' => $model]) ?>

    </div><!-- End blog comments -->

</div><!-- End blog entries list -->