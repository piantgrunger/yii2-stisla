<?php
namespace app\widgets\grid;

use Yii;
use yii\helpers\Html;

/**
 * GridView Bootstrap4 Widget.
 *
 * @author Basil Suter <basil@nadar.io>
 * @since 1.0.0
 */
class ActionColumn extends \yii\grid\ActionColumn
{
    public function init()
    {
    // do not call parent is then the glyphicons button would be added
        $this->initBs4Icons('view', 'fa-eye', ['class'=>'btn btn-info btn-sm btn-round ']);
        $this->initBs4Icons('update', 'fa-edit', ['class'=>'btn btn-primary btn-sm btn-round ']);
        $this->initBs4Icons('delete', 'fa-trash', [
        'data-confirm' => Yii::t('yii', 'Are you sure you want to delete this item?'),
        'data-method' => 'post',
        'class'=>'btn btn-sm btn-danger btn-round '
        ]);
    }

    protected function initBs4Icons($name, $iconName, $options = [])
    {
        if (!isset($this->buttons[$name]) && strpos($this->template, '{' . $name . '}') !== false) {
            $this->buttons[$name] = function ($url, $model, $key) use ($name, $iconName, $options) {
                $title = Yii::t('yii', ucfirst($name));
                $options = array_merge([
                'title' => $title,
                'aria-label' => $title,
                'data-pjax' => '0',
                ], $options, $this->buttonOptions);
                $icon = Html::tag('i', '', ['class' => "fa $iconName", 'aria-hidden' => true]);
                return Html::a($icon, $url, $options);
            };
        }
    }
}
