CodeIgniter-3.1.7up
===========================

CodeIgniter是一个应用程序开发框架 - 一个工具包 - 用于使用PHP构建网站的人员。它的目标是使您能够比从头开始编写代码更快的速度开发项目，提供丰富的常用任务库以及访问这些库的简单界面和逻辑结构。CodeIgniter通过最小化给定任务所需的代码量，使您可以创造性地专注于您的项目。

## 发布信息

基于 [CodeIgniter3.1.7](https://codeigniter.com) 框架的一个优化版本。

## 服务器要求

PHP>=7.0

## 安装

请参阅 CodeIgniter用户指南的 [安装部分](https://codeigniter.com/user_guide/installation/index.html)

## 更新日志和新功能

#### 0.源框架修改记录：
	* 修正php7+版本中无法正确记录session。
	* 文件夹cache、errors、logs、session、temp已经搬到_writable目录。
	* index.php已经搬到了public目录。


#### 1.全新的HMVC架构(灵感来自[hex-ci](https://github.com/hex-ci/CodeIgniter-HMVC)):


	如果您还不了解什么是 HMVC，请先移步维基百科查看：
	http://zh.wikipedia.org/wiki/HMVC
	
	现在，你可以在application内创建模块文件夹并在config.php配置命名：
```php
$config['module_folder'] = 'modules';
```
	每个模块都可以有一级子目录，
	比如 application/modules/目录/模块名/....

	都有独立的 MVC 结构，像这样:
	application/modules/模块名/controllers
	application/modules/模块名/models
	application/modules/模块名/views

	从 URL 访问某个模块的某个方法，URL 规则是这样的：
	http://domain/index.php/模块名/控制器/方法

	如果要通过 URL 传递参数，则直接加在 URL 后面：
	http://domain/index.php/模块名/控制器/方法/参数1/参数2/..../参数n
	另外，这里的 URI 可以使用路由规则，也就是说什么样的 URL 都可以，
	只要最后路由成符合上面的规则即可，比如要使用这样的 URL：

	http://domain/index.php/m/模块名/控制器/方法
	可以在 routers.php 里添加一个路由规则：

```php
$route['m/(:any)/(:any)/(:any)/(:any)'] = 'module/$1/$2/$3/$4';
```
注意：controllers文件夹已被弃用，而application目录下的models、services、views文件夹将会是公共目录，
系统会根据需要从当前模块出发查找相应文件。未发现文件时，即回到公共目录查找，如果依然未找到，将会展示404错误页面。

配置404路由的方式:
```php
$route['404_override'] = ''; // 模块/路径（可选）/控制器（可选）/方法（可选）
```
最后不要忘记配置默认模块：
```php
$route['default_module'] = '';
```

#### 2.新增file_url方法:

	这个方法的作用是引入外部样式主题文件，跟site_url()、base_url()一样你需要引入$this->load->helper('url');
	你也可以在config.php中统一配置域名。


#### 3.新增service层:
	service($model[, $name = ''[, $params = NULL]]);
```php
$this->load->service('service');
$this->service->test();
```	
	参数:
		$model (mixed) -- 你要引入的service类名。
		$name (string) -- service类别名。
		$params (string) -- 该service的构造函数参数。
	现在你可以把你的业务逻辑丢进services文件夹了，避免产生臃肿的控制器。

#### 4.解决controller、service、model命名冲突:

	你可以在config文件中配置你的类名后缀：
```php
//config.php
$config['controller_suffix'] = '_Controller';
$config['service_suffix'] = '_Service';
$config['model_suffix'] = '_Model';
```
	然后在各类中类名加入以上后缀，注意类的文件命名不含以上后缀。


#### 5.新增了Smarty_Controller与Ajax_Controller两个控制器类：

	Smarty_Controller为smarty模板使用基类，如果你的视图需要用到smarty，
	请配置config目录下smarty.php并在你的控制器里边继承Smarty_Controller。
```php
$this->smarty->assign('string',$string);
$this->smarty->display('index.html');
```
	Ajax_Controller为ajax检测类，继承它可以判断是否为ajax请求，用于前后台数据交互接口。

## 执照

请参阅 [许可协议](https://github.com/bcit-ci/CodeIgniter/blob/develop/user_guide_src/source/license.rst)

## 资源

-  [用户指南](https://codeigniter.com/docs)
-  [语言文件翻译](https://github.com/bcit-ci/codeigniter3-translations)
-  [社区论坛](http://forum.codeigniter.com/)
-  [社区维基](https://github.com/bcit-ci/CodeIgniter/wiki)
-  [社区松弛频道](https://codeigniterchat.slack.com/)

将安全问题报告给我们的 [安全小组](mailto:security@codeigniter.com) 或通过我们的 [HackerOne页面](https://hackerone.com/codeigniter)，谢谢。

## 结语

CodeIgniter3.1.7up团队要感谢EllisLab，CodeIgniter项目的所有贡献者和CodeIgniter团队。
