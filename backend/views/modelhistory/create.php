<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Modelhistory */

$this->title = 'Create Modelhistory';
$this->params['breadcrumbs'][] = ['label' => 'Modelhistories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modelhistory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
