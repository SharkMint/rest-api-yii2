<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var api\modules\v1\models\Address $model */

$this->title = 'Update Address: ' . $model->idaddress;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idaddress, 'url' => ['view', 'idaddress' => $model->idaddress]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
