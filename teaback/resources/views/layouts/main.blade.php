<!doctype html>
<html class="no-js">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Amaze UI Admin index Examples</title>
<meta name="description" content="这是一个 index 页面">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<link rel="icon" type="image/png" href="{{ url('/') }}/i/favicon.png">
<link rel="apple-touch-icon-precomposed" href="{{ url('/') }}/i/app-icon72x72@2x.png">
<meta name="apple-mobile-web-app-title" content="Amaze UI" />
<link rel="stylesheet" href="{{ url('/') }}/css/amazeui.min.css"/>
<link rel="stylesheet" href="{{ url('/') }}/css/admin.css">
<script src="{{ url('/') }}/js/jquery.min.js"></script>
<script src="{{ url('/') }}/js/app.js"></script>
</head>
<body>
<!--[if lte IE 9]><p class="browsehappy">升级你的浏览器吧！ <a href="http://se.360.cn/" target="_blank">升级浏览器</a>以获得更好的体验！</p><![endif]-->
</head>

<body>

@include('layouts.header')

<div class="am-cf admin-main">

@include('layouts.menu')

<div class=" admin-content">
		@include('layouts.daohang')

@yield('content')

</div>

</div>

<!--[if lt IE 9]>
<script src="http://libs.baidu.com/jquery/1.11.1/jquery.min.js"></script>
<script src="http://cdn.staticfile.org/modernizr/2.8.3/modernizr.js"></script>
<script src="{{ url('/') }}/js/polyfill/rem.min.js"></script>
<script src="{{ url('/') }}/js/polyfill/respond.min.js"></script>
<script src="{{ url('/') }}/js/amazeui.legacy.js"></script>
<![endif]-->

<!--[if (gte IE 9)|!(IE)]><!-->
<script src="{{ url('/') }}/js/amazeui.min.js"></script>
<script type="text/javascript">
  jQuery(".sideMenu").slide({
    titCell:"h3", //鼠标触发对象
    targetCell:"ul", //与titCell一一对应，第n个titCell控制第n个targetCell的显示隐藏
    effect:"slideDown", //targetCell下拉效果
    delayTime:300 , //效果时间
    triggerTime:150, //鼠标延迟触发时间（默认150）
    defaultPlay:true,//默认是否执行效果（默认true）
    returnDefault:true //鼠标从.sideMen移走后返回默认状态（默认false）
    });
</script>
<!--<![endif]-->
</body>
</html>
