<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reception".
 *
 * @property int $id
 * @property string|null $user_name
 * @property string $user_phone
 * @property string $service_name
 * @property string|null $date
 * @property string|null $time
 * @property string|null $status
 */
class Reception extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reception';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_phone', 'service_name'], 'required'],
            [['user_name', 'user_phone'], 'string', 'max' => 64],
            [['service_name', 'date', 'time', 'status'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_name' => 'User Name',
            'user_phone' => 'User Phone',
            'service_name' => 'Service Name',
            'date' => 'Date',
            'time' => 'Time',
            'status' => 'Status',
        ];
    }
}
