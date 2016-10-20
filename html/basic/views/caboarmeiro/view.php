<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CaboArmeiro */

$this->title = $model->idusuario;
$this->params['breadcrumbs'][] = ['label' => 'Cabo Armeiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabo-armeiro-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idusuario], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idusuario], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idusuario',
            'nome_completo',
            'login',
            'senha',
            'email:email',
        ],
    ]) ?>

</div>
