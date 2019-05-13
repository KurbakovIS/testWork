<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "modelhistory".
 *
 * @property int $id
 * @property string $date
 * @property string $table
 * @property string $field_name
 * @property string $field_id
 * @property string $old_value
 * @property string $new_value
 * @property int $type
 * @property string $user_id
 */
class Modelhistory extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'modelhistory';
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date', 'table', 'field_name', 'field_id', 'type', 'user_id'], 'required'],
            [['date'], 'safe'],
            [['old_value', 'new_value'], 'string'],
            [['type'], 'integer'],
            [['table', 'field_name', 'field_id', 'user_id'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => '№ записи в таблице',
            'date' => 'Дата изменения',
            'table' => 'Таблица',
            'field_name' => 'Измененное поле',
            'field_id' => 'Field ID',
            'old_value' => 'Предыдущее значение',
            'new_value' => 'Новое значение',
            'type' => 'Type',
            'user_id' => 'Пользователь обновивший запись',
        ];
    }
}
