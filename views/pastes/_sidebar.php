<?php
use yii\helpers\Html;
use yii\helpers\BaseUrl;
use yii\data\ActiveDataProvider;
?>
<aside>
	<ul style="list-style-type:none; margin-left:-10%;">
	<?php
	    $query=$model->top10();
		$data=new ActiveDataProvider(['query'=>$query]);
		 
		  //var_dump($query->createCommand());
		
		foreach($data->getModels() as $item)
		{
	?>
			<li>
				<?=Html::a(Html::encode($item['who']." : ".$item['title']),BaseUrl::to(['pastes/view','id'=>$item['idpastes']]));?><br>
				<?=Html::encode('Στις:'.date('d/m/Y H:i a'),$item['date']);?>
			</li>
	<?php
		}
	?>
	</ul>
</aside>