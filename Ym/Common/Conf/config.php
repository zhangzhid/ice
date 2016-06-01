<?php
return array(

    'SESSION_EXPIRE'  =>'600',   // 默认Session有效期（10分钟）
	'SHOW_PAGE_TRACE'=>false, //开启调试为True 关闭false
    'DB_TYPE'               =>  'mysql',     // 数据库类型
    'DB_HOST'               =>  'localhost', // 服务器地址
    'DB_NAME'               =>  'ice',          // 数据库名
    'DB_USER'               =>  'root',      // 用户名
    'DB_PWD'                =>  'root',          // 密码
    'DB_PORT'               =>  '3306',        // 端口
    'DB_PREFIX'             =>  'yf_',    // 数据库表前缀
    
    'URL_MODEL'             =>  2,       // URL访问模式,可选参数0、1、2、3,代表以下四种模式：
    'URL_PATHINFO_DEPR'     =>  '/',	// PATHINFO模式下，各参数之间的分割符号
	/********* MD5时用来复杂化的 ****************/
	'MD5_KEY' => 'yf2018#@90#_jl329$9lfds!129',
    'TMPL_ACTION_ERROR'     =>  'ts/ok', // 默认错误跳转对应的模板文件
    'TMPL_ACTION_SUCCESS'   =>  'ts/ok', // 默认成功跳转对应的模板文件

);