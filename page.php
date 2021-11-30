<?php
/**
 * User: dingding
 * Date: 2021/11/26
 * Time: 10:53 上午
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