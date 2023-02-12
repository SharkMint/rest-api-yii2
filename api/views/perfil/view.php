<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var api\modules\v1\models\Perfil $model */

$this->title = $model->idperfil;
$this->params['breadcrumbs'][] = ['label' => 'Perfils', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="perfil-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'idperfil' => $model->idperfil], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'idperfil' => $model->idperfil], [
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
            'idperfil',
            'firstname',
            'lastname',
            'email:email',
            'phone',
            'Created_ad',
        ],
    ]) ?>

</div>
