<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CaboArmeiro */

$this->title = 'Create Cabo Armeiro';
$this->params['breadcrumbs'][] = ['label' => 'Cabo Armeiros', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cabo-armeiro-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
