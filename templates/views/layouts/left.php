<?php
use hscstudio\mimin\components\Mimin;
$menuItems =
        [
                    ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii/'],'visible' => !Yii::$app->user->isGuest],
                    [
                        'visible' => !Yii::$app->user->isGuest,
                        'label' => 'Manajemen User / Group',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                    ['label' => 'App. Route', 'icon' =>  'fa fa-circle-o', 'url' => ['/mimin/route/'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'Role', 'icon' =>  'fa fa-circle-o', 'url' => ['/mimin/role/'],'visible' => !Yii::$app->user->isGuest],
                    ['label' => 'User', 'icon' => ' fa fa-circle-o', 'url' => ['/mimin/user/'],'visible' => !Yii::$app->user->isGuest],
                   ]]
                        ,
                ];     
                
 if (!Yii::$app->user->isGuest)
{             
 if (Yii::$app->user->identity->username !== 'admin') 
{
  $menuItems = Mimin::filterMenu($menuItems);
};
}        
?>
<aside class="main-sidebar">

    <section class="sidebar">



        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => $menuItems,
            ]
        ) ?>

    </section>

</aside>
