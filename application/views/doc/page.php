<?php
/**
 * Created by PhpStorm.
 * User: shengjie
 * Date: 2018/12/21
 * Time: 13:12
 */
?>
<div class="row table-responsive no-padding">
    <div class="col-md-12">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>分组</th>
                <th>名称</th>
                <th>方式</th>
                <th>接口地址</th>
                <th width="250px">操作</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!$dataList) {
                echo "<td>当前没有数据</td>";
            } else {
                $i = 1;
                foreach ($dataList as $data): ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $data['group'] ?></td>
                        <td><?= $data['name'] ?></td>
                        <td><?= $data['method'] ?></td>
                        <td><?= $data['link'] ?></td>
                        <td>
                            <a class="btn btn-primary btn-sm btn-edit" href="<?= site_url('doc/edit/'.$data['id']) ?>"><i class="fa fa-edit"></i> 编辑</a>
                            <button data-id="<?=$data['id']?>" class="btn btn-danger btn-sm btn-del"><i class="fa fa-trash-o"></i> 删除</button>
                        </td>
                    </tr>
                    <?php $i++; endforeach;
            } ?>
            </tbody>
        </table>
    </div>
</div><!-- /.row -->
<div class="row">
    <div class="text-center">
        <?php if (isset($pageHtml)) {
            echo $pageHtml;
        } ?>
    </div>
</div><!-- /.row -->

<script>
    $(function () {
        // 删除操作绑定
        $(".btn-del").on('click', function () {
            var id = $(this).data('id');
            Utils.confirm({
                title: "温馨提示",
                text: "你确定要删除此管理员吗",
                confirm: function () {
                    Utils.ajax({
                        url: "<?=site_url('admin/del')?>/" + id,
                        success: function (data) {
                            Utils.noticeSys(data);
                            if(data.success){
                                getListByPage(now_page);
                            }
                        }
                    });
                }
            });
        });
    })
</script>