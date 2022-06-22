<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nucleo */

$this->title = 'Criar Nucleo';
$this->params['breadcrumbs'][] = ['label' => 'Nucleos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nucleo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
