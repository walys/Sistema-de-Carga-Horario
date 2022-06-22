<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Usuario;
use app\models\Matriz;

/* @var $this yii\web\View */
/* @var $model app\models\Oferta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="oferta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'matriz_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Matriz::find()
                ->select(['matriz.id', 'concat(matriz.sigla, " - ", curso.nome) as sigla'])
                ->leftJoin('curso', 'curso.id = matriz.curso_id')
                ->orderBy('sigla')
                ->all(), 
            'id', 'sigla'),
            'language' => 'pt',
            'options' => ['placeholder' => 'Selecione uma matriz ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>

    <?= $form->field($model, 'usuario_id')->widget(Select2::classname(), [
            'data' => ArrayHelper::map(Usuario::find()
                ->select(['id', 'nome'])
                ->orderBy('nome')
                ->all(), 
            'id', 'nome'),
            'language' => 'pt',
            'options' => ['placeholder' => 'Selecione uma matriz ...'],
            'pluginOptions' => [
                'allowClear' => true
            ],
        ]);
    ?>


    <?= $form->field($model, 'semestre_ano_inicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'data_registro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
        <?= Html::a('Voltar', ['index'], ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
