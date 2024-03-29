<?php

namespace common\models;

use nhkey\arh\ActiveRecordHistoryBehavior;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

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
 * @property string transferred_date
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

// yii migrate --migrationPath=@vendor/nhkey/yii2-activerecord-history/migrations   - Команда для миграции таблицы логирования
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                ],
                'value' => new Expression('NOW()')
            ],
            'history' => [
                'class' => ActiveRecordHistoryBehavior::class,
//                'ignoreFields' => ['updated_at', 'some_other_field'],
            ],
        ];
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
            'id' => '№ услуги',
            'name' => 'Название',
            'code' => 'Код',
            'price' => 'Цена',
            'description' => 'Описание',
            'status' => 'Статус',
            'city' => 'Город действия',
            'validity' => 'Срок действия',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function debug($arr)
    {
        echo '<pre>' . print_r($arr, true) . '</pre>';
    }

}
