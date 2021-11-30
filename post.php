<?php
/**
 * User: dingding
 * Date: 2021/11/25
 * Time: 4:08 下午
 * Blog: https://blog.teqiyi.com
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once('Base.php');
require_once('header.php');

$referrer = strpos($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) ? $_SERVER['HTTP_REFERER'] : $header['url'];
$data = [
    'referrer' => $referrer,
    'author'=>$this->author->user->screenName,
    'data'=> $this->date->timeStamp,
    'title' => $this->title,
    'tags'=>$this->tags,
    'content' => $this->content
];
echo $twig->render('post.html',
    [
        'data' => $data,
        'header' => $header
    ]
);
exit();

?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline"><a itemprop="url"
                                                           href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </h1>
        <ul class="post-meta">
            <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name"
                                                                                                       href="<?php $this->author->permalink(); ?>"
                                                                                                       rel="author"><?php $this->author(); ?></a>
            </li>
            <li><?php _e('时间: '); ?>
                <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
            </li>
            <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
        </ul>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
        <p itemprop="keywords" class="tags"><?php _e('标签: '); ?><?php $this->tags(', ', true, 'none'); ?></p>
    </article>
    <ul class="post-near">
        <li>上一篇: <?php $this->thePrev('%s', '没有了'); ?></li>
        <li>下一篇: <?php $this->theNext('%s', '没有了'); ?></li>
    </ul>
</div><!-- end #main-->
