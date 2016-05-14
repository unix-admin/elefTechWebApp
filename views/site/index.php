
<h1>Companies tree</h1>

<?php
use yii\helpers\Html;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';


function printTree($arr)
{

    if (count($arr)>0)
    {
        echo '<ul>';
        foreach ($arr as $item)
        {
            echo '<li>'.'<a href="'.\yii\helpers\Url::toRoute(['companies/view','id'=>$item->id]).'"> '.$item->name.' | '.$item->estimated_earnings.'K$ ';if($item->EstimatedWithChild!=0)echo '| '.$item->EstimatedWithChild.'K$</a></li>';else echo '</a></li>';
            if ($item->childCompany !=null)
                printTree($item->childCompany);
        }

        echo '</ul>';
    }

}
printTree($arrayOfModels);

?>

<?= Html::a('Create company', ['companies/create'], ['class' => 'btn btn-primary']) ?>


