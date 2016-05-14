<?php

namespace app\models;

use Yii;



/**
 * This is the model class for table "companies".
 *
 * @property integer $id
 * @property string $name
 * @property string $estimated_earnings
 * @property integer $parent_id
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public  $childCompany;
    public $EstimatedWithChild;

    public static function tableName()
    {
        return 'companies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'estimated_earnings'], 'required'],
            [['estimated_earnings'], 'number'],
            [['parent_id'], 'integer'],
            [['name'], 'unique'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'estimated_earnings' => 'Estimated Earnings',
            'parent_id' => 'Parent ID',
        ];
    }

    public function companyDelete($id)
    {
        $company = Companies::find()->where(['id'=>$id])->one();
        $company->delete();
        $childCompanies  = Companies::find()->where(['parent_id'=>$company->id])->all();
        if (count($childCompanies)>0)
        {
            foreach ($childCompanies as $childCompany )
                $this->companyDelete($childCompany->id);
        }

    }
}
