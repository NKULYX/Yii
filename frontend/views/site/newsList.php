<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use frontend\models\NewsListUtil;
use common\models\News;

$this->title = 'My Yii Application';
?>
<div class="col-lg-8 entries">
    <?php $newsList = NewsListUtil::getNewsList(); ?>
    <?php for($i = NewsListUtil::$current_news_page; $i < 4 + NewsListUtil::$current_news_page && $i < NewsListUtil::$news_num; $i++):?>
        <?php $news = $newsList[$i]; ?>
        <article class="entry">
            <div class="entry-img">
                <img src="<?='../../common/static/images/news/' . $news->news_photo ?>" alt="" class="img-fluid">
            </div>
            <h2 class="entry-title">
                <a><?=$news->news_title?></a>
            </h2>
            <div class="entry-meta">
                <ul>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-person"></i>
                        <a><?=$news->news_source?></a>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-clock"></i>
                        <a><?=$news->news_date?></a>
                    </li>
                    <li class="d-flex align-items-center">
                        <i class="bi bi-chat-dots"></i>
                        <a><?=$news->getNewsCommentNum()?></a>
                    </li>
                </ul>
            </div>
            <div class="entry-content">
                <p><?=$news->news_abstract?></p>
                <div class="read-more">
                    <?= Html::a('Read More', ['site/show-news-content','news_id' => $news->news_id]) ?>
                </div>
            </div>
        </article><!-- End blog entry -->
    <?php endfor;?>

    <div class="blog-pagination">
        <ul class="justify-content-center">
            <?php for($i = 0; $i < NewsListUtil::$news_page_num; $i++):?>
                <?php if($i === NewsListUtil::$current_news_page):?>
                    <li class="active">
                        <a class="page-num"><?=$i + 1?></a>
                    </li>
                <?php else:?>
                    <li>
                        <a class="page-num"><?=$i + 1?></a>
                    </li>
                <?php endif;?>
            <?php endfor;?>
            <li><a class="next-page" href="#">Next</a></li>
        </ul>
    </div>

</div><!-- End blog entries list -->