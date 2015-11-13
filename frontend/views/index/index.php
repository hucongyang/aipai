<?php
use yii\helpers\Html;
?>
<?= Html::jsFile('@web/assets/14506357/jquery.min.js') ?>
<?= Html::jsFile('@web/assets/frontend/js/test.js') ?>
<div class="row">
    <table class="table table-hover">
        <caption>测试用例</caption>
        <thead>
            <tr>
                <th>编号</th>
                <th>编号</th>
                <th>编号</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($id as $row): ?>
            <tr>
                <td><?php echo $row['id'] ?></td>
                <td><?php echo $row['username'] ?></td>
                <td>1</td>
            </tr>
        <?php endforeach ?>
            <tr>
                <td id="time">1</td>
                <td>1</td>
                <td>1</td>
            </tr>
            <tr>
                <td id="file" >
                    <?php echo __FILE__; ?>
                </td>
                <td>
                    <?php echo $model_time; ?>
                </td>
                <td>
                    <?php echo Html::encode($model) ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="row">
    <div class="col-md-2">
        <button type="button" class="btn btn-danger" id="test">
            button
        </button>
    </div>
    <div class="col-md-10">
        <span id="span"></span>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <?php echo $server ?>
    </div>
</div>