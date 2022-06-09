<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string|null $service_name
 * @property string|null $category_name
 * @property string|null $doctor
 * @property int|null $price
 */
class Services extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['price'], 'integer'],
            [['service_name', 'category_name', 'doctor'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'service_name' => 'Service Name',
            'category_name' => 'Category Name',
            'doctor' => 'Doctor',
            'price' => 'Price',
        ];
    }
}
