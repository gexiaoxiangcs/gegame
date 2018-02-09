<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gx_ad_list".
 *
 * @property integer $id
 * @property string $name
 * @property string $ad_pic_url
 * @property string $link_url
 */
class GxAdList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gx_ad_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'ad_pic_url', 'link_url'], 'required'],
            [['name'], 'string', 'max' => 10],
            [['ad_pic_url', 'link_url'], 'string', 'max' => 255],
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
            'ad_pic_url' => 'Ad Pic Url',
            'link_url' => 'Link Url',
        ];
    }

    public function getlist() {
        return GxAdList::find()->asArray()->all();
    }
}
