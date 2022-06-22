<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Curso;

/* @var $this yii\web\View */
/* @var $model app\models\Matriz */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="matriz-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'curso_id')->textInput() ?>

    <?= $form->field($model, 'curso_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Curso::find()
                ->orderBy('nome')
                ->all(), 
            'id', 'nome'),
            'language' => 'pt',
            'options' => ['placeholder' => 'Selecione um núcleo ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'ch_total')->textInput(['type' => 'number']) ?>

    <?= $form->field($model, 'sigla')->textInput(['maxlength' => true]) ?>
    

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
