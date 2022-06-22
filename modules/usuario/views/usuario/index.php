<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Nucleo;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Criar Usuario', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

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
            'nome',
            'login',
            'senha',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
