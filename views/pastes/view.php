<?php

use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\grid\GridView;
use yii\data\ActiveDataProvider;

/* @var $this yii\web\View */
/* @var $model app\models\Pastes */

$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;

?>
<section class="pastes-view">

    <h1><?= Html::encode($this->title); ?></h1>
	<h3><?=Html::encode("By ".$model->who." at ".date("j/m/Y @ G:i",$model->date)); ?></h3>
	
   	<pre style="border:solid ">
   	<code><?=Html::encode($model->paste);?></code>
   	</pre>
    
 	<p>
        <?= Html::a('New <strong>Related</strong> Paste', ['create', 'refers' => $model->idpastes], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('New Paste', ['create'], ['class' => 'btn btn-primary']) ?>
    </p>
    <p>
    	<?php
    		$related=$model->getPastes();
    		if($related->count()>0)
			{
		?>
		    <h3>Related pastes</h3>
		<?php
    			echo GridView::widget([
									'dataProvider' => new ActiveDataProvider(['query'=>$related]),
									'columns'=>[
													[
														'attribute'=>'title',
														'value'=>function($data)
																{
																	return Html::a(Html::encode($data->title),BaseUrl::to(['pastes/view','id'=>$data->idpastes]));
																},
														'format'=>'raw',
													],
													'who',
													['attribute'=>'date', 'format'=>['date','d/m/Y H:i a']],
												]
				   				]);
			}?>
    </p>
</section>
