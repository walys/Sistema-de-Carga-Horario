<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Nucleo;
use app\models\Matriz;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DisciplinaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Disciplinas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disciplina-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Disciplina', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'nome',
            [
                'attribute' => 'nome',
                'filterInputOptions' => [
                    'class' => 'form-control',
                    'placeholder' => 'Digite um termo de busca'
                ]
            ],
            'ch',
            'periodo',
            [
                'attribute' => 'nucleo.nome',
                'label' => 'Núcleo',
                'filter' => 
                    Html::activeDropDownList($searchModel, 'nucleo.nome', 
                    ArrayHelper::map(Nucleo::find()
                        ->asArray()
                        ->orderBy('nome')
                        ->all(), 'nome', 'nome'),
                        ['class' => 'form-control', 'prompt' => 'Selecione um Núcleo']),
                
            ],
            [
                'attribute' => 'matriz.sigla',
                'label' => 'Matriz',
                'filter' => 
                    Html::activeDropDownList($searchModel, 'matriz.sigla', 
                    ArrayHelper::map(Matriz::find()
                        ->asArray()
                        ->orderBy('sigla')
                        ->all(), 'sigla', 'sigla'),
                        ['class' => 'form-control', 'prompt' => 'Selecione um Matriz']),
                
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
