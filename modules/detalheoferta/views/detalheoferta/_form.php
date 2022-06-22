<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Disciplina;
use app\models\Oferta;

/* @var $this yii\web\View */
/* @var $model app\models\Detalheoferta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="detalheoferta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'semestre_ano')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'disciplina_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Disciplina::find()
                ->select(['id', 'nome'])
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

    <?= $form->field($model, 'oferta_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Oferta::find()
                ->select(['id', 'semestre_ano_inicio'])
                ->orderBy('semestre_ano_inicio')
                ->all(), 
            'id', 'semestre_ano_inicio'),
            'language' => 'pt',
            'options' => ['placeholder' => 'Selecione um núcleo ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>


    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
