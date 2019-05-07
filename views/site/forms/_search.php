<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\filters\TasksFilter */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="task-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "<div class=\"input-group\"><div class=\"input-group-prepend\">{label}</div>\n<div class=\"col-lg-3\">{input}</div></div>\n",
            'labelOptions' => ['class' => 'input-group-text'],
            'options' => [
                'tag' => false,
            ],
        ],
    ]); ?>

    <?= $form->field($model, 'creator_id')->textInput()  ?>

    <?= $form->field($model, 'created')->dropDownList($monthList,['class' => 'custom-select'])  ?>

    <?php
/*    echo DatePicker::widget([
            'language' => 'ru',
            'name' => 'from_date',
            'clientOptions' => [
                'dateFormat' => 'yy-mm',
            ],
        ]
    );
    */?><!--
    --><?php /*echo $form->field($model, 'created')->widget(
        DatePicker::className(),
        ['clientOptions' => [
            'defaultDate' => '2014-01-01'
        ],
        ])
    */?>

    <?php /* echo $form->field($model, 'modified') */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Reset',['site/index'], ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
