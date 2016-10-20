<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CaboArmeiro */

$this->title = 'Update Cabo Armeiro: ' . $model->idusuario;
$this->params['breadcrumbs'][] = ['label' => 'Cabo Armeiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idusuario, 'url' => ['view', 'id' => $model->idusuario]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cabo-armeiro-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
