<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Modelhistory */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'История изменений', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="modelhistory-view">

    <h1>Просмотр изменения в поле: <?= $model->field_name ?></h1>

    <p>
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'date',
//            'table',
            'field_name',
//            'field_id',
            'old_value:html',
            'new_value:html',
//            'type',
//            'user_id',
            [
                'attribute' => 'user_id',
                'value' => function ($data) {
                    return $data->user->username;
                }
            ],
        ],
    ]) ?>

</div>
