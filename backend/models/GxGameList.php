<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "gx_game_list".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property string $img
 * @property integer $type
 * @property string $description
 * @property integer $order
 * @property integer $created_at
 * @property integer $status
 */
class GxGameList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gx_game_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'url', 'img', 'type', 'description', 'order', 'created_at', 'status'], 'required'],
            [['type', 'order', 'created_at', 'status'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['url', 'img'], 'string', 'max' => 255],
            [['description'], 'string', 'max' => 50],
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
            'url' => 'Url',
            'img' => 'Img',
            'type' => 'Type',
            'description' => 'Description',
            'order' => 'Order',
            'created_at' => 'Created At',
            'status' => 'Status',
        ];
    }

    public function getlist() {
        return GxGameList::find()->asArray()->all();
    }
}
