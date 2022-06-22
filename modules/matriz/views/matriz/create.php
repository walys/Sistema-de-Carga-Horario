<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Matriz */

$this->title = 'Criar Matriz';
$this->params['breadcrumbs'][] = ['label' => 'Matrizs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="matriz-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
