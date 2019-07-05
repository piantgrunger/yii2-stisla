<?php
namespace app\widgets;
use Yii;
use yii\helpers\Html;
use yii\web\View;
use app\widgets\Assets;
/**
 *
 * 
 * @author Alfian Naufal
 * @since 1.0
 */
class TreeImage extends \yii\bootstrap\Widget
{
      
    
    public $root = 'Root';
    public $icon = 'user';
    public $iconRoot = 'tree-conifer';
    public $nameFieldname = 'name';
    public $idFieldname = 'id';
    
    
    public $query;
    public function init()
    {
        Assets::register($this->getView());
        $this->initTreeView(0);
    }
    
 public   function generate_list($array,$parent_id,$level)
{

  foreach ($array as $value)
  {
    $has_children=false;

    if ($value['parent_id']==$parent_id)
    {

      if ($has_children==false)
      {
        $has_children=true;
         echo Html::beginTag('ul'). "\n";
         
      }

      echo Html::beginTag('li') . "\n" ;
      echo  Html::a(Yii::t('app',$value[$this->nameFieldname]), ['index','parent_id'=>$value[$this->idFieldname]] );

      $this->generate_list($array,$value[$this->idFieldname],$level);

      echo Html::endTag('li') . "\n" ;
    }

    if ($has_children==true)   
        echo Html::endTag('ul'). "\n";

   
  }

}
    
    protected function initTreeView($parent_id)
    {   
        $icon1 = '<span class="glyphicon glyphicon-'.$this->icon.'"></span>';
        $iconRoot = '<span class="glyphicon glyphicon-'.$this->iconRoot.'"></span>';
        $dataArray = $this->query->asArray()->all();
        $nodeDepth = $currDepth = $counter = 0;
        echo Html::beginTag('div', ['class' => 'tree']);
       echo Html::beginTag('ul') . "\n" .Html::beginTag('li') . "\n" ;
        echo Html::a(Yii::t('app', $iconRoot.'  '.$this->root), ['index','parent_id'=>0] );   // echo '<a href="#">'.$iconRoot.'  '.$this->root.'</a>' . "\n" ;
        $this->generate_list($dataArray, 0,1); 
        /*
                echo Html::beginTag('ul') . "\n" .Html::beginTag('li') . "\n" ;
                echo Html::a(Yii::t('app', $iconRoot.'  '.$this->root), ['index1','parent_id'=>0] );   // echo '<a href="#">'.$iconRoot.'  '.$this->root.'</a>' . "\n" ;
        foreach ($dataArray as $key) {
            if ($key['parent_id'] == $parent_id ) 
            {
                echo Html::beginTag('ul') . "\n" .Html::beginTag('li') . "\n" ;
                echo Html::a(Yii::t('app', $icon1.'  '.$key[$this->nameFieldname]), ['index1','parent_id'=>$key['parent_id']] );   // echo '<a href="#">'.$iconRoot.'  '.$this->root.'</a>' . "\n" ;
            }  else
            {
                $as = $currDepth-1;
                $sa = ${'x'.$as}+1;
                if ($key['lvl'] == ${'x'.$as}) {
                    echo Html::beginTag('li') . "\n";
                    echo '<a href="#">'.$icon1.'  '.$key[$this->nameFieldname].'</a>' . "\n" ;
                    echo  Html::endTag('/li') . "\n";
                } else if ($key['lvl'] == $sa){
                    echo Html::beginTag('ul') . "\n" .Html::beginTag('li') . "\n" ;
                    echo '<a href="#">'.$icon1.'  '.$key[$this->nameFieldname].'</a>' . "\n" ;
                } else
                {
                    $da = ${'x'.$as}-1;
                    if ($key['lvl'] == $da) {
                        echo Html::endTag('li') . "\n" ;
                        echo Html::endTag('ul') . "\n" ;
                        echo Html::beginTag('li') . "\n" ;
                        echo '<a href="#">'.$icon1.'  '.$key[$this->nameFieldname].'</a>' . "\n" ;
                    }else
                    {
                        $hasil = ${'x'.$as} - $key['lvl'];
                        for ($i=0; $i < $hasil ; $i++) { 
                            echo Html::endTag('li') . "\n" ;
                            echo Html::endTag('ul') . "\n" ;
                        }
                        echo Html::beginTag('li') . "\n" ;
                        echo '<a href="#">'.$icon1.'  '.$key[$this->nameFieldname].'</a>' . "\n" ;
                    }
                }
            }      
            ${'x'.$currDepth} = $key['lvl'];    
            ++$currDepth;
            ++$nodeDepth;
        }
          
         */
        echo Html::endTag('div');
    }
}