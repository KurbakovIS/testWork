<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\jui\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <!--    --><? //= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
    <?php
    echo $form->field($model, 'description')->widget(CKEditor::class, [
        'editorOptions' => [
            'preset' => 'basic', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
            'inline' => false, //по умолчанию false
        ],
    ]);

    ?>

    <?= $form->field($model, 'status')->checkbox(['0', '1']) ?>

    <?= $form->field($model, 'validity')->widget(DatePicker::class, [
        'language' => 'ru',
        'value' => date('d-M-Y', strtotime('+2 days')),
        'dateFormat' => 'dd.MM.yy',
        'options' => [
            'class' => 'form-control',
            'todayHighlight' => true
        ],
        'clientOptions' => [
            'changeMonth' => true,
            'changeYear' => true,
//            'yearRange' => '2015:2050',
            'showOn' => 'button',
            'buttonText' => 'Выбрать дату',
            //'buttonImageOnly' => true,
            //'buttonImage' => 'images/calendar.gif'
        ]]) ?>
    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
