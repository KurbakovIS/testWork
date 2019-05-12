<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "service".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $price
 * @property string $description
 * @property int $status
 * @property string $city
 * @property string $validity
 * @property string $created_at
 * @property string $updated_at
 */
class Service extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'service';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['status'], 'integer'],
            [['validity', 'created_at', 'updated_at'], 'safe'],
            [['name', 'code', 'price', 'city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'code' => 'Code',
            'price' => 'Price',
            'description' => 'Description',
            'status' => 'Status',
            'city' => 'City',
            'validity' => 'Validity',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
