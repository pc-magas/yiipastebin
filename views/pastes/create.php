<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Pastes */

$this->title = 'Create Pastes';


?>
<section class="pastes-create">

    <h1><?= Html::encode($this->title); ?></h1>

    <?= $this->render('_form', ['model' => $model,]); ?>

</section>
