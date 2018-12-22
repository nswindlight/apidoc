<?php
/**
 * Created by PhpStorm.
 * User: shengjie
 * Date: 2018/12/19
 * Time: 16:12
 */
?>
<style>
    .box-header-btn{
        float: right;
    }
    .box-title input {
        min-width: 300px;
    }
    .field_more{
        min-width: 400px;
    }
</style>
<form id="submitForm">
    <div class="box box-default">
        <div class="box-header with-border">
            <h3 class="box-title">接口信息</h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered">
                <tr>
                    <th style="width: 100px;">分组</th>
                    <td>
                        <input type="text" id="api_group" value="" class="form-control" placeholder="如：/ucenter,/order...">
                    </td>
                </tr>
                <tr>
                    <th>接口名称</th>
                    <td>
                        <input type="text" id="api_name" value="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th>接口地址</th>
                    <td>
                        <input type="text" id="api_link" value="" class="form-control">
                    </td>
                </tr>
                <tr>
                    <th>获取方式</th>
                    <td>
                        <input type="text" id="api_method" value="" class="form-control" placeholder="如：POST,GET,DELETE,PUT...">
                    </td>
                </tr>
                <tr>
                    <th>描述信息</th>
                    <td>
                        <textarea id="api_descript" class="form-control" style="min-height: 120px;"></textarea>
                    </td>
                </tr>

            </table>
        </div>
    </div>
    <div class="box box-default" id="request_info">
        <div class="box-header with-border">
            <button type="button" class="btn btn-success box-header-btn" id="add_request_group"><i class="fa fa-plus"></i> 添加分组</button>
            <button type="button" class="btn btn-info box-header-btn margin-r-5" id="import_request_group"><i class="fa fa-arrow-circle-down"></i> JSON导入参数</button>
            <h3 class="box-title">
                提交参数
            </h3>
        </div>
        <div class="box-body request_group">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <button type="button" class="btn btn-danger box-header-btn del-group-btn"><i class="fa fa-trash"></i> 删除分组</button>
                    <h3 class="box-title"><input type="text" class="group_name form-control" placeholder="分组名称"></h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered param_list">
                        <thead>
                            <tr>
                                <th>请求参数</th>
                                <th>数据类型</th>
                                <th>是否必须</th>
                                <th>备注</th>
                                <th>描述</th>
                                <th>操作 <button type="button" class="btn btn-success btn-xs add-param-btn"><i class="fa fa-plus"></i> 添加参数</button></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-control field_name" value=""></td>
                                <td><input class="form-control field_type" value=""></td>
                                <td><input class="field_is_must" type="checkbox"/> 必须</td>
                                <td><input class="form-control field_info" value=""></td>
                                <td><input class="form-control field_more" value=""></td>
                                <td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-default" id="response_info">
        <div class="box-header with-border">
            <button type="button" class="btn btn-success box-header-btn pull-right" id="add_response_group"><i class="fa fa-plus"></i> 添加分组</button>
            <button type="button" class="btn btn-info box-header-btn margin-r-5" id="import_response_group"><i class="fa fa-arrow-circle-down"></i> JSON导入参数</button>
            <h3 class="box-title">
                返回参数
            </h3>
        </div>
        <div class="box-body response_group">
            <div class="box box-success">
                <div class="box-header with-border">
                    <button type="button" class="btn btn-danger box-header-btn del-group-btn"><i class="fa fa-trash"></i> 删除分组</button>
                    <h3 class="box-title"><input type="text" class="group_name form-control" placeholder="分组名称"></h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered param_list">
                        <thead>
                        <tr>
                            <th>返回参数</th>
                            <th>数据类型</th>
                            <th>描述</th>
                            <th>操作 <button type="button" class="btn btn-success btn-xs add-rs-param-btn pull-right"><i class="fa fa-plus"></i> 添加参数</button></th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><input class="form-control field_name" value=""></td>
                            <td><input class="form-control field_type" value=""></td>
                            <td><input class="form-control field_more" value=""></td>
                            <td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="box box-danger" id="err_code">
        <div class="box-header with-border">
            <h3 class="box-title">
                返回错误编码
            </h3>
        </div>
        <div class="box-body">
            <table class="table table-bordered param_list">
                <thead>
                <tr>
                    <th>错误编码</th>
                    <th>描述</th>
                    <th>操作 <button type="button" class="btn btn-success btn-xs add-err-code-btn pull-right"><i class="fa fa-plus"></i> 添加编码</button></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><input class="form-control field_code" value=""></td>
                    <td><input class="form-control field_more" value=""></td>
                    <td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center" style="margin-top: 50px; margin-bottom: 150px;">
        <button class="btn btn-success" style="width: 120px;" type="button" id="save-btn">保存</button>
    </div>
</form>
<script>
    $("#submitForm .box").on('click','.del-group-btn',function(){
        var obj = this;
        var op = {
            title:'删除操作',
            text:'确认删除此分组？',
            confirm:function(){
                $(obj).parent().parent().remove();
            }
        };
        Utils.confirm(op);
    })
    $("#submitForm .box table tbody").on('click','.del_field',function(){
        var obj = this;
        var op = {
            title:'删除操作',
            text:'确认删除此字段？',
            confirm:function(){
                $(obj).parent().parent().remove();
            }
        };
        Utils.confirm(op);
    })
    $("#save-btn").click(function(){
        var apiData  = {
            group:$("#api_group").val(),
            name:$("#api_name").val(),
            link:$("#api_link").val(),
            method:$("#api_method").val(),
            descript:$("#api_descript").val(),
        }
        var requestParam = new Array();
        var err = 0;
        $("#request_info .request_group .box-primary").each(function(n,val){
            var group_name = $(this).find('.group_name').val();
            $(this).find('.param_list tbody tr').each(function(tr_n,tr_val){
                var pa = {
                    group_name:group_name,
                    param_name:$(this).find('.field_name').val(),
                    param_type:$(this).find('.field_type').val(),
                    is_must:$(this).find('.field_is_must').is(":checked")? 1:0,
                    info:$(this).find('.field_info').val(),
                    more:$(this).find('.field_more').val(),
                    level:n
                };
                requestParam.push(pa);
                if(!pa.param_name){
                    $(this).find('.field_name').parent().addClass("has-error");
                    err ++;
                }else{
                    $(this).find('.field_name').parent().removeClass("has-error");
                }
            })
        })
        var responseParam = new Array();
        $("#response_info .response_group .box").each(function(n,val){
            var group_name = $(this).find('.group_name').val();
            $(this).find('.param_list tbody tr').each(function(tr_n,tr_val){
                var pa = {
                    group_name:group_name,
                    param_name:$(this).find('.field_name').val(),
                    param_type:$(this).find('.field_type').val(),
                    info:$(this).find('.field_more').val(),
                    level:n
                };
                responseParam.push(pa);
                if(!pa.param_name){
                    $(this).find('.field_name').parent().addClass("has-error");
                    err ++;
                }else{
                    $(this).find('.field_name').parent().removeClass("has-error");
                }
            })
        })
        var err_code = new Array();
        $("#err_code .param_list tbody tr").each(function(n,val){
            var pa = {
                code:$(this).find('.field_code').val(),
                info:$(this).find('.field_more').val()
            };
            err_code.push(pa);
            if(!pa.code){
                $(this).find('.field_name').parent().addClass("has-error");
                err ++;
            }else{
                $(this).find('.field_name').parent().removeClass("has-error");
            }
        })
        if(err > 0){
            Utils.alertError("数据存在错误，请检查");
            return false;
        }
        var form_data = {
            apiData:apiData,
            requestParam:requestParam,
            responseParam:responseParam,
            err_code:err_code
        }
        var op = {
            url:'<?= site_url("doc/create") ?>',
            data: form_data,
            success:function(data){
                if(data.success){
                    var op = {
                        title:'保存成功',
                        text:'返回列表页面？',
                        confirm:function(){
                            window.location.href="<?= site_url('doc/index') ?>"
                        },
                        cancel:function(){
                            window.location.reload();
                        }
                    };
                    Utils.confirm(op);
                }
            }
        };
        Utils.ajax(op)

    })
    $("#add_response_group").click(function(){
        var html = '<div class="box box-success">' +
            '                <div class="box-header with-border">' +
            '                    <button type="button" class="btn btn-danger box-header-btn del-group-btn"><i class="fa fa-trash"></i> 删除分组</button>' +
            '                    <h3 class="box-title"><input type="text" class="group_name form-control" placeholder="分组名称"></h3>' +
            '                </div>' +
            '                <div class="box-body">' +
            '                    <table class="table table-bordered param_list">' +
            '                        <thead>' +
            '                        <tr>' +
            '                            <th>返回参数</th>' +
            '                            <th>数据类型</th>' +
            '                            <th>描述</th>' +
            '                            <th>操作 <button type="button" class="btn btn-success btn-xs add-rs-param-btn pull-right"><i class="fa fa-plus"></i> 添加参数</button></th>' +
            '                        </tr>' +
            '                        </thead>' +
            '                        <tbody>' +
            '                        <tr>' +
            '                            <td><input class="form-control field_name" value=""></td>' +
            '                            <td><input class="form-control field_type" value=""></td>' +
            '                            <td><input class="form-control field_more" value=""></td>' +
            '                            <td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>' +
            '                        </tr>' +
            '                        </tbody>' +
            '                    </table>' +
            '                </div>' +
            '            </div>';
        $(this).parent().parent().find('.response_group').append(html);
    })
    $("#add_request_group").click(function(){
        var html = '<div class="box box-primary">' +
            '                <div class="box-header with-border">' +
            '                    <button type="button" class="btn btn-danger box-header-btn del-group-btn"><i class="fa fa-trash"></i> 删除分组</button>' +
            '                    <h3 class="box-title"><input type="text" class="group_name form-control" placeholder="分组名称"></h3>' +
            '                </div>' +
            '                <div class="box-body">' +
            '                    <table class="table table-bordered param_list">' +
            '                        <thead>' +
            '                            <tr>' +
            '                                <th>请求参数</th>' +
            '                                <th>数据类型</th>' +
            '                                <th>是否必须</th>' +
            '                                <th>备注</th>' +
            '                                <th>描述</th>' +
            '                                <th>操作 <button type="button" class="btn btn-success btn-xs add-param-btn"><i class="fa fa-plus"></i> 添加参数</button></th>' +
            '                            </tr>' +
            '                        </thead>' +
            '                        <tbody>' +
            '                            <tr>' +
            '                                <td><input class="form-control field_name" value=""></td>' +
            '                                <td><input class="form-control field_type" value=""></td>' +
            '                                <td><input type="checkbox" class="field_is_must" />  必须</td>' +
            '                                <td><input class="form-control field_info" value=""></td>' +
            '                                <td><input class="form-control field_more" value=""></td>' +
            '                                <td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>' +
            '                            </tr>' +
            '                        </tbody>' +
            '                    </table>' +
            '                </div>' +
            '            </div>';
        $(this).parent().parent().find('.request_group').append(html);
    })

    $("#response_info .response_group").on('click','.add-rs-param-btn',function(){
        var html = '<tr>' +
            '<td><input class="form-control field_name" value=""></td>' +
            '<td><input class="form-control field_type" value=""></td>' +
            '<td><input class="form-control field_more" value=""></td>' +
            '<td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>' +
            '</tr>';
        $(this).parent().parent().parent().parent().find('tbody').append(html);
    })
    $("#request_info .request_group").on('click','.add-param-btn',function(){
        var html = '<tr>' +
            '<td><input class="form-control field_name" value=""></td>' +
            '<td><input class="form-control field_type" value=""></td>' +
            '<td><input class="field_is_must" type="checkbox" /> 必须</td>' +
            '<td><input class="form-control field_info" value=""></td>' +
            '<td><input class="form-control field_more" value=""></td>' +
            '<td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>' +
            '</tr>';
        $(this).parent().parent().parent().parent().find('tbody').append(html);
    })
    $("#err_code .param_list").on('click','.add-err-code-btn',function(){
        var html ='<tr>' +
            '<td><input class="form-control field_code" value=""></td>' +
            '<td><input class="form-control field_more" value=""></td>' +
            '<td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>' +
            '</tr>';
        $(this).parent().parent().parent().parent().find('tbody').append(html);
    })
    $("#import_request_group").click(function(){
        var html ='<div class="modal-dialog modal-lg">' +
            '<div class="modal-content"><div class="modal-header">' +
            '<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>' +
            '<h4 class="modal-title">JSON导入请求字段</h4>' +
            '</div>' +
            '<div class="modal-body"><textarea  id="import_json" class="form-control" style="min-height:200px;"></textarea ></div>' +
            '<div class="modal-footer">' +
            '<button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>' +
            '<button onclick="implode_request_json()" type="button" name="doSubmit" class="btn btn-primary">确认</button>' +
            '</div></div></div>';
        $("#div-modal").html(html);
        $("#div-modal").modal();
    })

    $("#import_response_group").click(function(){
        var html ='<div class="modal-dialog modal-lg">' +
            '<div class="modal-content"><div class="modal-header">' +
            '<button aria-label="Close" data-dismiss="modal" class="close" type="button"><span aria-hidden="true">×</span></button>' +
            '<h4 class="modal-title">JSON导入返回字段</h4>' +
            '</div>' +
            '<div class="modal-body"><textarea  id="import_json" class="form-control" style="min-height:200px;"></textarea ></div>' +
            '<div class="modal-footer">' +
            '<button data-dismiss="modal" class="btn btn-default" type="button">关闭</button>' +
            '<button onclick="implode_response_json();" type="button" name="doSubmit" class="btn btn-primary">确认</button>' +
            '</div></div></div>';
        $("#div-modal").html(html);
        $("#div-modal").modal();
    })

    function implode_response_json(){
        var json_str = $("#import_json").val();
        try{
            var obj = JSON.parse(json_str);
            if(!obj){
                Utils.alertError('未解析到数据');
                return false;
            }
            syResponsedata(obj,'OBJ')
            $("#div-modal").modal('hide');
        }catch (e) {
            Utils.alertError('解析失败');
        }
    }

    function syResponsedata(obj,name){
        var json_str = $("#import_json").val();
        try{
            var obj = JSON.parse(json_str);
            if(!obj){
                Utils.alertError('未解析到数据');
                return false;
            }
            syResponseData(obj,'OBJ')
            $("#div-modal").modal('hide');
        }catch (e) {
            Utils.alertError('解析失败');
        }
    }

    function implode_request_json(){
        var json_str = $("#import_json").val();
        try{
            var obj = JSON.parse(json_str);
            if(!obj){
                Utils.alertError('未解析到数据');
                return false;
            }
            sydata(obj,'OBJ')
            $("#div-modal").modal('hide');
        }catch (e) {
            Utils.alertError('解析失败');
        }
    }
    function syResponseData(obj,name) {
        var groups = new Array();
        var groups_name = new Array();
        var html = '<div class="box box-primary">' +
            '                <div class="box-header with-border">' +
            '                    <button type="button" class="btn btn-danger box-header-btn del-group-btn"><i class="fa fa-trash"></i> 删除分组</button>' +
            '                    <h3 class="box-title"><input type="text" class="group_name form-control" value="'+name+'参数" placeholder="分组名称"></h3>' +
            '                </div>' +
            '                <div class="box-body">' +
            '                    <table class="table table-bordered param_list">' +
            '                        <thead>' +
            '                        <tr>' +
            '                            <th>返回参数</th>' +
            '                            <th>数据类型</th>' +
            '                            <th>描述</th>' +
            '                            <th>操作 <button type="button" class="btn btn-success btn-xs add-rs-param-btn pull-right"><i class="fa fa-plus"></i> 添加参数</button></th>' +
            '                        </tr>' +
            '                        </thead>' +
            '                        <tbody>';
        $.each(obj,function(n,v){

            var v_type = typeof v;
            if(v_type == 'object' && !isNaN(v.length)){
                groups.push(v[0]);
                groups_name.push(n);
            }else if(v_type == 'object' && isNaN(v.length)){
                groups.push(v);
                groups_name.push(n);
            }
            html += '<tr>' +
            '<td><input class="form-control field_name" value="'+ n +'"></td>' +
            '<td><input class="form-control field_type" value="'+v_type.toLocaleUpperCase()+'"></td>' +
            '<td><input class="form-control field_more" value=""></td>' +
            '<td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>' +
            '</tr>';
        })
        html += '</tbody>' +
            '</table>' +
            '</div>' +
            '</div>';
        $("#response_info .response_group").append(html);
        if(groups.length > 0){
            $.each(groups,function(n,v){
                syResponseData(v,name+'.'+groups_name[n]);
            })
        }
    }
    function sydata(obj,name){
        var groups = new Array();
        var groups_name = new Array();
        var html = '<div class="box box-primary">' +
            '                <div class="box-header with-border">' +
            '                    <button type="button" class="btn btn-danger box-header-btn del-group-btn"><i class="fa fa-trash"></i> 删除分组</button>' +
            '                    <h3 class="box-title"><input type="text" class="group_name form-control" value="'+name+'参数" placeholder="分组名称"></h3>' +
            '                </div>' +
            '                <div class="box-body">' +
            '                    <table class="table table-bordered param_list">' +
            '                        <thead>' +
            '                            <tr>' +
            '                                <th>请求参数</th>' +
            '                                <th>数据类型</th>' +
            '                                <th>是否必须</th>' +
            '                                <th>备注</th>' +
            '                                <th>描述</th>' +
            '                                <th>操作 <button type="button" class="btn btn-success btn-xs add-param-btn"><i class="fa fa-plus"></i> 添加参数</button></th>' +
            '                            </tr>' +
            '                        </thead>' +
            '                        <tbody>';
        $.each(obj,function(n,v){

            var v_type = typeof v;
            if(v_type == 'object' && !isNaN(v.length)){
                groups.push(v[0]);
                groups_name.push(n);
            }else if(v_type == 'object' && isNaN(v.length)){
                groups.push(v);
                groups_name.push(n);
            }


            html += '<tr>' +
            '<td><input class="form-control field_name" value="'+n+'"></td>' +
            '<td><input class="form-control field_type" value="'+v_type.toLocaleUpperCase()+'"></td>' +
            '<td><input type="checkbox" class="field_is_must" />  必须</td>' +
            '<td><input class="form-control field_info" value=""></td>' +
            '<td><input class="form-control field_more" value=""></td>' +
            '<td><button type="button" class="btn btn-danger btn-sm del_field"><i class="fa fa-trash"></i>删除</button></td>'+
            '</tr>';
        })
        html += '</tbody>' +
            '</table>' +
            '</div>' +
            '</div>';
        $("#request_info .request_group").append(html);
        if(groups.length > 0){
            $.each(groups,function(n,v){
                sydata(v,name+'.'+groups_name[n]);
            })
        }
    }
</script>