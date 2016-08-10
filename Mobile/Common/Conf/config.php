<?php
return array(

    //'配置项'=>'配置值'
    //链接数据库
    'DB_TYPE' => 'mysql',
    'DB_HOST' =>'qdm114542491.my3w.com',
    'DB_NAME' =>'qdm114542491_db',
    'DB_PORT'=>'3306',
    'DB_USER'=>'qdm114542491',
    'DB_PWD'=>'TRYtry888',
    'DB_PREFIX'=>'farm_',
    // 'DB_CHARSET'=>'utf8',

    //开启参数绑定功能
    'URL_PARAMS_BIND' => TRUE,

    //定义静态缓存
    /*
    'HTML_CACHE_ON' =>TRUE,
    'HTML_CFILE_SUFFIX' => '.html',
    'HTML_CACHE_RULES' => array(
        '*' => array('{$_SERVER.REQUEST_URI|md5'),
    ),
    */
    //URL模式 0：普通模式 1：pathinfo模式 2：rewrite模式 3：兼容模式
    'URL_MODEL' =>  1,


//    'URL_MODEL'              => 1,
    //配置可以用模块
    //'MODULE_ALLOW_LIST' => 'Home,Admin',
    // 'CONTROLLER_ALLOWLIST' => 'Index,User',
);