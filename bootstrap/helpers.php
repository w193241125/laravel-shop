<?php
/**
 * Created by liuguansheng.
 * Email: w193241125@163.com
 * Time: 2018/6/14 15:42
 */
function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}

function help(){
    return 'ok';
}