<?php

use yii\helpers\Url;

?>
<aside id="sidebar-wrapper">
  <div class="sidebar-brand">
    <a href="<?= Url::to(["/"]) ?>">YII2 Stisla</a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm">
    <a href="<?= Url::to(["/"]) ?>">Y-St</a>
  </div>
  <ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="active"><a class="nav-link" href="<?= Url::to(["/"]) ?>"><i class="fa fa-columns"></i> <span>Dashboard</span></a></li>
    <li class="menu-header">User / Group </li>
    <li class="active"><a class="nav-link" href="<?= Url::to(["/route"]) ?>"><i class="fa fa-route"></i> <span>App.Route</span></a></li>
    <li class="active"><a class="nav-link" href="<?= Url::to(["/role"]) ?>"><i class="fa fa-tasks"></i> <span>Role</span></a></li>
    <li class="active"><a class="nav-link" href="<?= Url::to(["/user"]) ?>"><i class="fa fa-user"></i> <span>Users</span></a></li>

  </ul>
</aside>