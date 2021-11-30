<?php
/**
 * User: dingding
 * Date: 2021/11/25
 * Time: 4:21 下午
 * Blog: https://blog.teqiyi.com
 */

require_once __TYPECHO_ROOT_DIR__ . '/vendor/autoload.php';

$loader = new \Twig\Loader\FilesystemLoader($this->getThemeDir() . '/templates');
$twig = new \Twig\Environment($loader, [
    'cache' => $this->getThemeDir() . '/compilation_cache',
    'auto_reload' => true,  //根据文件更新时间，自动更新缓存
]);

