<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var api\modules\v1\models\Address $model */

$this->title = $model->idaddress;
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="address-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idaddress' => $model->idaddress], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idaddress' => $model->idaddress], [
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
            'idaddress',
            'city',
            'state',
            'zipcode',
            'country',
            'created_ad',
        ],
    ]) ?>

</div>
