<?php

use yii\helpers\Html;
use app\widgets\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\administrator\models\AuthItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="auth-item-index">

	<h1><?= Html::encode($this->title) ?></h1>
	<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

	<p>
		<?= Html::a('Create Role', ['create'], ['class' => 'btn btn-success']) ?>
	</p>

	<?= GridView::widget([
		'dataProvider' => $dataProvider,
		'filterModel' => $searchModel,
		'columns' => [
			['class' => 'yii\grid\SerialColumn'],

			'name',
			/*
			'type',
			'description:ntext',
			'rule_name',
			'data:ntext',
			// 'created_at',
			// 'updated_at',
			*/
			[
				'options' => [
					'width' => '80px',
				],
				'class' => 'app\widgets\grid\ActionColumn'
			],
		],
	]); ?>

</div>
