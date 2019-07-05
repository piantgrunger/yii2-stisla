<?php

use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/* @var $this yii\web\View */
/* @var $generator yii\gii\generators\crud\Generator */

$urlParams = $generator->generateUrlParams();
$model = $generator->modelClass;


echo "<?php\n";
?>

use yii\helpers\Html;
use yii\widgets\DetailView;
use hscstudio\mimin\components\Mimin;

/* @var $this yii\web\View */
/* @var $model <?= ltrim($generator->modelClass, '\\') ?> */

$this->title = $model-><?= $generator->getNameAttribute() ?>;
$this->params['breadcrumbs'][] = ['label' => <?= $generator->generateString('Daftar './*Inflector::pluralize*/(Inflector::camel2words(StringHelper::basename($generator->modelClass)))) ?>, 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="<?= Inflector::camel2id(StringHelper::basename($generator->modelClass)) ?>-view">

    <h1><?= "<?= " ?>Html::encode($this->title) ?></h1>

    <p>
             <?php echo '<?php if ((Mimin::checkRoute($this->context->id."/update"))){ ?>'; ?>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Ubah') ?>, ['update', <?= $urlParams ?>], ['class' => 'btn btn-primary']) ?>
        <?php echo '<?php } if ((Mimin::checkRoute($this->context->id."/delete"))){ ?>'; ?>
        <?= "<?= " ?>Html::a(<?= $generator->generateString('Hapus') ?>, ['delete', <?= $urlParams ?>], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => <?= $generator->generateString('Apakah Anda yakin ingin menghapus item ini??') ?>,
                'method' => 'post',
            ],
        ]) ?>
        <?="<?php } ?>"?>
    </p>

    <?= "<?= " ?>DetailView::widget([
        'model' => $model,
        'attributes' => [
<?php
if (($tableSchema = $generator->getTableSchema()) === false) {
    foreach ($generator->getColumnNames() as $name)

     {

        echo "            '" . $name . "',\n";
    }
} else {
    foreach ($generator->getTableSchema()->columns as $column) {
        $format = $generator->generateColumnFormat($column);
      if (!in_array($column->name,$model::primaryKey()))
      {
        echo "            '" . $column->name . ($format === 'text' ? "" : ":" . $format) . "',\n";
      }
    }
}
?>
        ],
    ]) ?>

</div>
