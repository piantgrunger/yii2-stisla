<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$nameAttribute = $generator->getNameAttribute();
$model = $generator->modelClass;

echo "<?php\n";
?>


use hscstudio\mimin\components\Mimin;
use yii\helpers\Html;
use <?= $generator->indexWidgetType === 'grid' ? "kartik\\grid\\GridView" : "yii\\widgets\\ListView" ?>;
<?= $generator->enablePjax ? 'use yii\widgets\Pjax;' : '' ?>
<?=" use kartik\\export\\ExportMenu;";?>

<?php echo'$gridColumns=[[\'class\' => \'yii\grid\SerialColumn\'], ';?>

<?php
$count = 0;
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name) {
        if (++$count < 6) {
            echo "            '" . $name . "',\n";
        } else {
            echo "            // '" . $name . "',\n";
        }
    }
} else {
    foreach ($tableSchema->columns as $column) {
        $format = $generator->generateColumnFormat($column);
        if (++$count < 6) {
          if ((!in_array($column->name,$model::primaryKey()))
          &&
          (!in_array($column->name,['created_at','updated_at']))
          )
          {
            echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
          }
        }
         else {
            echo "            // '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
        }
    }
}
?>

        <?php echo  " ['class' => 'yii\grid\ActionColumn',   'template' => Mimin::filterActionColumn([
              'update','delete','view'],".
                '$this->context->route),    ],    ];'?>
<?php  
 echo ' echo ExportMenu::widget(['.
    '\'dataProvider\' => $dataProvider,'.
    '\'columns\' => $gridColumns';
   echo "]);";
?>


/* @var $this yii\web\View */
<?= !empty($generator->searchModelClass) ? "/* @var \$searchModel " . ltrim($generator->searchModelClass, '\\') . " */\n" : '' ?>
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = <?= $generator->generateString('Daftar './*Inflector::pluralize*/(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-index">

    <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>
<?= $generator->enablePjax ? "    <?php Pjax::begin(); ?>\n" : '' ?>
<?php if(!empty($generator->searchModelClass)): ?>
<?= "    <?php " . ($generator->indexWidgetType === 'grid' ? "// " : "") ?>echo $this->render('_search', ['model' => $searchModel]); ?>
<?php endif; ?>

    <p> <?php echo '<?php if ((Mimin::checkRoute($this->context->id."/create"))){ ?>'; ?>
        <?= "<?=  " ?>Html::a(<?= $generator->generateString(Inflector::camel2words(StringHelper::basename($generator->modelClass).' Baru')) ?>, ['create'], ['class' => 'btn btn-success']) ?>
    <?="<?php } ?>" ?>
    </p>

<?php if ($generator->indexWidgetType === 'grid'): ?>
    <?= "<?= " ?>GridView::widget([
        'dataProvider' => $dataProvider,
        <?= !empty($generator->searchModelClass) ? "'filterModel' => \$searchModel,\n        'columns' => \$gridColumns," : "'columns' => \$gridColumns, "; ?>
        'responsive'=>true,
        'hover'=>true,
         'resizableColumns'=>true,    
    ]); ?>
<?php else: ?>
    <?= "<?= " ?>ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'item'],
        'itemView' => function ($model, $key, $index, $widget) {
            return Html::a(Html::encode($model-><?= $nameAttribute ?>), ['view', <?= $urlParams ?>]);
        },
    ]) ?>
<?php endif; ?>
<?= $generator->enablePjax ? "    <?php Pjax::end(); ?>\n" : '' ?>
</div>
