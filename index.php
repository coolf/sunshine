<?php
/**
 * @package sunshine Theme
 * @author chuxia
 * @version 1.1
 * @link https://blog.teqiyi.com
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
require_once('Base.php');
require_once('header.php');

$post = [];

while ($this->next()) {
    $_ = [
        'title' => $this->title,
        'url' => $this->permalink,
        'author' => $this->author->user->screenName,
        'date' => $this->date->timeStamp,
        'category' => [
            'mid' => $this->categories[0]['mid'],
            'name' => $this->categories[0]['name'],
            'permalink' => $this->categories[0]['permalink'],
        ],
        'commentsNum' => $this->commentsNum,
        'content' => $this->content
    ];
    array_push($post, $_);
}


$total = $this->getTotal();
$nav = new Typecho_Widget_Helper_PageNavigator_Box($total,
    $this->_currentPage, $this->parameter->pageSize, $query);
$splitPage = 3;
$from = max(1, $this->_currentPage - $splitPage);
$to = min($this->getTotalPage(), $this->_currentPage + $splitPage);
$home = null;
if ($this->_currentPage > 1) {
    $home = 1;
}
$end = null;
if ($to < $this->getTotalPage()) {
    $end = $this->getTotalPage();
}

$pageInfo = [
    'current' => $this->_currentPage,
    'end' => $end,
    'query' => $query = Typecho_Router::url($this->parameter->type .
        (false === strpos($this->parameter->type, '_page') ? '_page' : NULL),
        $this->_pageRow, $this->options->index),
    'from' => $from,
    'to' => $to,
    'home' => $home
];

$data = [
    'post' => $post,
    'page' => $pageInfo,
    'categories' => ['name' => $this->categories[0]['name'], 'description' => $this->categories[0]['description']],
    'index' => $this->is('index')
];

//var_dump($this->categories);
//exit();

echo $twig->render('index.html',
    [
        'data' => $data,
        'header' => $header
    ]
);


