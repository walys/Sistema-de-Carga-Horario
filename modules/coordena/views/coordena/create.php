<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Coordena */

$this->title = 'Criar Coordena';
$this->params['breadcrumbs'][] = ['label' => 'Coordenas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coordena-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
