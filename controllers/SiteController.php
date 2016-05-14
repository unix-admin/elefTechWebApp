<?php

namespace app\controllers;

use app\models\Companies;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{


    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $parent = null;
        $arrayOfModels =$this->buildCompaniesTree(0,$parent);
        return $this->render('index',['arrayOfModels' =>$arrayOfModels]);
    }

    private function buildCompaniesTree($id, &$parentnode){

        $arrayOfCompanies = Companies::find()->where(['parent_id'=>$id])->all();
        if (count($arrayOfCompanies) >0)
        {
            foreach($arrayOfCompanies as $item)
            {
                $item->childCompany = $arrayOfCompanies;
                $parentItem = $item;
                $this->buildCompaniesTree($item->id, $parentItem);
                if ($parentnode !=null) {
                    $parentnode->childCompany = $arrayOfCompanies;
                    $parentnode->EstimatedWithChild += $item->EstimatedWithChild + $item->estimated_earnings;
                }
                if (count (Companies::find()->where(['parent_id'=>$item->id])->all())!=0)
                    $item->EstimatedWithChild = $item->estimated_earnings + $item->EstimatedWithChild;
                else
                    $item->childCompany = null;
            }
        }
        return $arrayOfCompanies;
    }
}
