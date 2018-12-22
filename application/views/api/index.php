<?php
$assets = isset($assets) ? $assets : array();
$assets['cssList'] = isset($assets['cssList']) ? $assets['cssList'] : array();
$assets['jsList'] = isset($assets['jsList']) ? $assets['jsList'] : array();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <base href="<?= base_url(); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= WEB_NAME ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="assets/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/css/skins/all-skins.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
    <!-- 开始页面级样式 -->
    <?php foreach ($assets['cssList'] as $css): ?>
        <link href="<?= $css ?>" rel="stylesheet" type="text/css">
    <?php endforeach; ?>
    <style type="text/css">
        html {
            overflow: hidden;
        }
    </style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="./plugins/ie9/html5shiv.min.js"></script>
    <script src="./plugins/ie9/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-<?= THEME ?> sidebar-mini fixed">
<input type="hidden" id="input-baseUrl" value="<?= base_url() ?>">
<input type="hidden" id="input-siteUrl" value="<?= site_url() ?>">
<div class="wrapper">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" style="padding-top: 0px;">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">

                <div class="info" style="position: relative;padding-left: 0px;left: 0px;">
                    <a><i class="fa fa-circle text-success"></i> <?= $apiInfo['title']?></a>
                </div>
            </div>
            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="输入接口名称">
                    <span class="input-group-btn">
                <button type="button" name="search" id="search-btn" class="btn btn-flat" onclick="search_menu()"><i
                        class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <!-- 侧边菜单 -->
            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper" style="min-height: 421px;padding-top: 0px;">
        <!--bootstrap tab风格 多标签页-->
        <div class="content-tabs">
            <button class="roll-nav roll-left tabLeft" onclick="scrollTabLeft()">
                <i class="fa fa-backward"></i>
            </button>
            <nav class="page-tabs menuTabs tab-ui-menu" id="tab-menu">
                <div class="page-tabs-content" style="margin-left: 0px;">

                </div>
            </nav>
            <button class="roll-nav roll-right tabRight" onclick="scrollTabRight()">
                <i class="fa fa-forward" style="margin-left: 3px;"></i>
            </button>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown tabClose" data-toggle="dropdown">
                    页签操作<i class="fa fa-caret-down" style="padding-left: 3px;"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-right" style="min-width: 128px; font-size: 9pt;">
                    <li><a class="tabReload" href="javascript:refreshTab();">刷新当前</a></li>
                    <li><a class="tabCloseCurrent" href="javascript:closeCurrentTab();">关闭当前</a></li>
                    <li><a class="tabCloseAll" href="javascript:closeOtherTabs(true);">全部关闭</a></li>
                    <li><a class="tabCloseOther" href="javascript:closeOtherTabs();">除此之外全部关闭</a></li>
                </ul>
            </div>
            <button class="roll-nav roll-right fullscreen" onclick="App.handleFullScreen()"><i
                    class="fa fa-arrows-alt"></i></button>
        </div>
        <div class="content-iframe " style="background-color: #ffffff; ">
            <div class="tab-content " id="tab-content"></div>
        </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="assets/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="assets/plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/app.js"></script>
<!--tabs-->
<script src="assets/js/app_iframe.js"></script>
<script src="assets/js/utils.js"></script>
<!-- 开始页面级插件-->
<?php foreach ($assets['jsList'] as $js): ?>
    <script src="<?= $js ?>" type="text/javascript"></script>
<?php endforeach; ?>
<!-- 结束页面级插件-->

<script type="text/javascript">


    $(function () {
        App.setbasePath("./");
        App.setGlobalImgPath("assets/img/");
        addTabs({
            id: '0',
            title: '首页',
            close: false,
            url: '<?=site_url('api/welcome/'.$apiInfo['id'])?>?code=<?= $apiInfo['code']?>',
            urlType: 'absolute'
        });
        App.fixIframeCotent();
        var menus = <?=$menu?>;

        $('.sidebar-menu').sidebarMenu({data: menus});

        // 动态创建菜单后，可以重新计算 SlimScroll
        // $.AdminLTE.layout.fixSidebar();

        if ($.AdminLTE.options.sidebarSlimScroll) {
            if (typeof $.fn.slimScroll != 'undefined') {
                //Destroy if it exists
                var $sidebar = $(".sidebar");
                $sidebar.slimScroll({destroy: true}).height("auto");
                //Add slimscroll
                $sidebar.slimscroll({
                    height: ($(window).height() - $(".main-header").height()) + "px",
                    color: "rgba(0,0,0,0.2)",
                    size: "2px"
                });
            }
        }
    });


</script>

</body>
</html>