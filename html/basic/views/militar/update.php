<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Militar */

$this->title = 'Update Militar: ' . $model->id_militar;
$this->params['breadcrumbs'][] = ['label' => 'Militars', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_militar, 'url' => ['view', 'id' => $model->id_militar]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="militar-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
