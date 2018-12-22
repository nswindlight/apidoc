<?php
/**
 * Created by PhpStorm.
 * User: shengjie
 * Date: 2018/12/22
 * Time: 11:18
 */

?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">接口信息</h3>
    </div>
    <div class="box-body">
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th style="width: 80px;">接口名称</th>
                <td>
                    <?= $apiData['name'] ?>
                </td>
            </tr>
            <tr>
                <th>接口地址</th>
                <td>
                    <?= $apiData['link'] ?>
                </td>
            </tr>
            <tr>
                <th>获取方式</th>
                <td>
                    <?= $apiData['method'] ?>
                </td>
            </tr>
            <tr>
                <th>描述信息</th>
                <td>
                    <?= $apiData['descript'] ?>
                </td>
            </tr>

            </tbody>
        </table>
    </div>
</div>
<div class="box box-default" id="request_info">
    <div class="box-header with-border">
        <h3 class="box-title">
            调用参数
        </h3>
    </div>
    <?php if($requestGroup) :?>
    <?php foreach ($requestGroup as $gname=>$group): ?>
    <div class="box-body request_group">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $gname?></h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered param_list">
                    <thead>
                    <tr>
                        <th style="width: 200px;">请求参数</th>
                        <th style="width: 80px;">数据类型</th>
                        <th style="width: 80px;">是否必须</th>
                        <th>备注</th>
                        <th>描述</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($group as $param): ?>
                    <tr>
                        <td><?= $param['param_name'] ?></td>
                        <td><?= $param['param_type'] ?></td>
                        <td><?= $param['is_must'] > 0? '是':'' ?></td>
                        <td><?= $param['info'] ?></td>
                        <td><?= $param['more'] ?></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <?php endif; ?>
</div>

<div class="box box-default" id="response_info">
    <div class="box-header with-border">
        <h3 class="box-title">
            返回参数
        </h3>
    </div>
    <?php if($returnGroup) :?>
    <?php foreach ($returnGroup as $gname=>$group): ?>
    <div class="box-body response_group">
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title"><?= $gname?></h3>
            </div>
            <div class="box-body">
                <table class="table table-bordered param_list">
                    <thead>
                    <tr>
                        <th style="width: 200px;">返回参数</th>
                        <th style="width: 80px;">数据类型</th>
                        <th>描述</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($group as $param): ?>
                    <tr>
                        <td><?= $param['param_name'] ?></td>
                        <td><?= $param['param_type'] ?></td>
                        <td><?= $param['info'] ?></td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php endforeach;?>
    <?php endif; ?>
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
            </tr>
            </thead>
            <tbody>
            <?php if($errCode) :?>
            <?php foreach ($errCode as $v): ?>
            <tr>
                <td  style="width: 200px;"><?= $v['code'] ?></td>
                <td><?= $v['info'] ?></td>
            </tr>
            <?php endforeach;?>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
