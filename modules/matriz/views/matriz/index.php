<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;
use app\models\Curso;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MatrizSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Matriz';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matriz-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Matriz', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'curso.nome',
                'label' => 'Curso',
                'filter' => 
                    Html::activeDropDownList($searchModel, 'curso.nome', 
                    ArrayHelper::map(Curso::find()
                        ->asArray()
                        ->orderBy('nome')
                        ->all(), 'nome', 'nome'),
                        ['class' => 'form-control', 'prompt' => 'Selecione um Curso']),
                
            ],
            'ch_total',
            'sigla',
            //'create_at',
            //'update_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
