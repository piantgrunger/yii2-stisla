<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use kartik\nav\NavX;
use yii\bootstrap4\NavBar;
use yii\bootstrap4\Breadcrumbs;
use app\widgets\Alert;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?= Html::csrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body>
  <?php $this->beginBody() ?>
  <script>
  window.FontAwesomeConfig = {
    searchPseudoElements: true
  }
</script>

    <div id="app">
      <div class="main-wrapper">
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
          <?= $this->render("topnav") ?>
        </nav>

        <div class="main-sidebar">
          <?= $this->render("sidebar") ?>
        </div>

        <!-- Main Content -->
        <div class="main-content">
          <section class="section section-success">
            <div class="section-header">
              <?php if (isset($this->blocks['content-header'])) { ?>
                <h1><?= $this->blocks['content-header'] ?></h1>
              <?php } else { ?>
                <h1>
                  <?php
                  if ($this->title !== null) {
                    echo \yii\helpers\Html::encode($this->title);
                  } else {
                    echo \yii\helpers\Inflector::camel2words(
                      \yii\helpers\Inflector::id2camel($this->context->module->id)
                    );
                    echo ($this->context->module->id !== \Yii::$app->id) ? '<small>Module</small>' : '';
                  } ?>
                </h1>
              <?php } ?>
              <div class="section-header-breadcrumb">
            
              <?=
                Breadcrumbs::widget(
                  [
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                  ]
                ) ?>
              </div>
            </div>
            <div class="section-body">
            <?=Alert::widget()?>
          
              <?= $content ?>
            </div>
          </section>


        </div>
        <footer class="main-footer">

        </footer>
      </div>
    </div>

    <?php $this->endBody() ?>
  </body>

</html>
<?php $this->endPage() ?>