<?php
/**
 * Created by PhpStorm.
 * User: shengjie
 * Date: 2018/12/19
 * Time: 15:09
 */
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">筛选</h3>

                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row col-md-12">
                    <div class="form-body">

                        <div class="col-md-3">
                            <label>分组</label>
                            <input id="search-group" type="text" class="form-control value="">
                        </div>
                        <div class="col-md-3">
                            <label>名称</label>
                            <input id="search-name" type="text" class="form-control value="">
                        </div>
                        <div class="col-md-2">
                            <button id="btn-search" class="btn btn-primary btn-block" type="button"><i class="fa fa-search"></i> 搜索</button>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.row -->
            </div><!-- ./box-body -->
            <div class="box-footer">
                <div class="row col-md-12">
                    <div class="col-md-2 col-md-offset-4">
                        <a href="<?= site_url('doc/setting') ?>" class="btn btn-info btn-block"><i class="fa fa-gears"></i> 接口设置</a>
                    </div>
                    <div class="col-md-2">
                        <a href="<?= site_url('doc/create') ?>" class="btn btn-info btn-block"><i class="fa fa-plus"></i> 添加接口</a>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.box-footer -->
        </div><!-- /.box -->
    </div><!-- /.col -->
    <div class="col-md-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">列表</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div id="dataList" class="row col-md-12">
                    <!--动态ajax加载博文-->
                </div>
            </div>
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

<script>
    var btnSearch = $("#btn-search");
    var now_page = 1;
    $(function () {
        initBind();
        getListByPage(1);
    });

    // DOM 元素绑定事件
    function initBind() {
        btnSearch.on("click", function () {
            getListByPage(1);
        });
    }

    // 获取列表数据
    function getListByPage(page) {
        now_page = page
        Utils.ajax({
            url: "<?=site_url('doc/page')?>/" + page,
            data: {group:$("#search-group").val(),name:$("#search-name").val()},
            success: function (data) {
                if(data.success){
                    $("#dataList").html(data.html);
                } else {
                    Utils.noticeWarning(data.msg);
                }
            }
        });
    }

</script>