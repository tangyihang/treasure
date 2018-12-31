<?php
return array (
		
		'LAYOUT_ON' => true, // 开启布局模板支持
		'LAYOUT_NAME' => 'layout', // 布局名称
		'TMPL_TEMPLATE_SUFFIX' => '.tpl', // 视图扩展名
		'DEFAULT_FILTER' => 'strip_tags,stripslashes,trim,strtolower',
		'DB_TYPE' => 'mysql',
		'DB_USER' => 'root',
		'DB_PWD' => 'tyh456852',
		'DB_PREFIX' => 'sh_',
		'DB_DSN' => 'mysql:host=127.0.0.1;dbname=com_app_www;charset=utf8',
		'TMPL_L_DELIM' => '{{',
		'TMPL_R_DELIM' => '}}',
		'LOAD_EXT_CONFIG' => 'const',
		'TMPL_ACTION_ERROR' => 'Public:error',
		'TMPL_ACTION_SUCCESS' => 'Public:error',
		

		// 模块配置
		'MODULE_ALLOW_LIST' => array (
				'Home',
				'Admin',
				'Vip'
		),
		'DEFAULT_MODULE' => 'Home',
		'URL_MODEL' => 2,
		//七牛云存储
		'UPLOAD_SITEIMG_QINIU' => array (
				'maxSize' 		=> 1 * 1024 * 1024,//文件大小
				'rootPath' 		=> './',
				'saveName' 		=> array ('uniqid', ''),
				'driver' 		=> 'Qiniu',
				'driverConfig' 	=> array (
						'secrectKey' 	=> 'jag9hm3XD1Qnubc3LgDXd6HCz8G6aTF_79vqbVZH',
						'accessKey' 	=> 'x-zNaKvYyrrZLjHymq5iusSpkogZkYUwAKhARMI2',
						'domain' 		=> 'pk9qxycsb.bkt.clouddn.com',
						'bucket' 		=> 'imgs',
				),
		),
);

