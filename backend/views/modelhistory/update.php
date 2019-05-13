<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Modelhistory */

$this->title = 'Обновление истории изменений: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Modelhistories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modelhistory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
