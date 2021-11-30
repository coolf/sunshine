<?php
/**
 * User: dingding
 * Date: 2021/11/25
 * Time: 2:50 下午
 * Blog: https://blog.teqiyi.com
 */


$blogTitle = $this->options->title;
$blogDescription = $this->options->description;
$blogLogoUrl = $this->options->logoUrl;

$navMenu = [

];
array_push($navMenu, [
    'title' => '首页',
    'select' => $this->is('index'),
    'url' => $this->options->siteUrl
]);
$category = null;
$this->widget('Widget_Metas_Category_List')->to($category);
while ($category->next()) {
    $select = false;
    if ($this->is('category', $category->slug)) {
        $select = true;
    }
    array_push($navMenu, [
        'title' => $category->name,
        'select' => $select,
        'url' => $category->permalink
    ]);
}

$pages = null;
$this->widget('Widget_Contents_Page_List')->to($pages);
while ($pages->next()) {
    $select = false;
    if ($this->is('page', $pages->slug)) {
        $select = true;
    }
    array_push($navMenu, [
        'title' => $pages->title,
        'select' => $select,
        'url' => $pages->permalink
    ]);
}

$header = [
    'title' => $blogTitle,
    'url'=>$this->options->siteUrl,
    'description' => $blogDescription,
    'logoUrl' => $blogLogoUrl,
    'navMenu' => $navMenu,
    'themeUrl' => $this->options->themeUrl
];

