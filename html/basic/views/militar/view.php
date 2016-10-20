<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Militar */

$this->title = $model->id_militar;
$this->params['breadcrumbs'][] = ['label' => 'Militars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="militar-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_militar], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_militar], [
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
            'id_militar',
            'posto_graduacao',
            'nome_guerra',
        ],
    ]) ?>

</div>
