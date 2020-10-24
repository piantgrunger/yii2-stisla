<?php
 use yii\helpers\Url;
  use yii\bootstrap4\Dropdown;
?>
<form class="form-inline mr-auto" action="">
  <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
  </ul>
  <div class="search-element">
    <input class="form-control" value="" name="query" type="search" placeholder="Search" aria-label="Search" data-width="250">
    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
    <div class="search-backdrop"></div>

  </div>
</form>
<ul class="navbar-nav navbar-right">
  <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg"><i class="far fa-bell"></i></a>
    <div class="dropdown-menu dropdown-list dropdown-menu-right">
      <div class="dropdown-header">Notifications
        <div class="float-right">
          <a href="#">Mark All As Read</a>
        </div>
      </div>
      <div class="dropdown-list-content dropdown-list-icons">
        <a href="#" class="dropdown-item dropdown-item-unread">
          <div class="dropdown-item-icon bg-primary text-white">
            <i class="fas fa-code"></i>
          </div>
          <div class="dropdown-item-desc">
            Template update is available now!
            <div class="time text-primary">2 Min Ago</div>
          </div>
        </a>

    </div>
  </li>
  <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    <img alt="image" src="<?=Url::to(["img/avatar/avatar-1.png"])?>" class="rounded-circle mr-1">
    <div class="d-sm-none d-lg-inline-block">Hi, <?=yii::$app->user->identity->username?> </div></a>
       <?php
          echo Dropdown::widget([
              'items' => [
                  ['label' => '<i class="far fa-user"></i> Profile Settings
      </a>', 'encode' =>false, 'url' => '#',
      "linkOptions" =>["class" =>"dropdown-item has-icon"]
      ],
      [
      'label' => '<i class="fas fa-sign-out-alt"></i> Logout
      </a>', 'encode' => false, 'url' => ['/site/logout'],

      "linkOptions" => [ "data-method" => "POST", "class" => "dropdown-item has-icon text-danger"]

    ],
              ],
            "class" => "dropdown-menu dropdown-menu-right"
          ]);


      ?>

  </li>
</ul>
