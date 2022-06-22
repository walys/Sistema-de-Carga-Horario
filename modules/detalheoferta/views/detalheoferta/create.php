<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Detalheoferta */

$this->title = 'Criar Detalhe Oferta';
$this->params['breadcrumbs'][] = ['label' => 'Detalheofertas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="detalheoferta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
