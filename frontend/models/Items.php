<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "items".
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string|null $description
 * @property float $unitPrice
 * @property int $quantity
 * @property string $dateAdded
 * @property string $lastUpdated
 */
class Items extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'items';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'code', 'unitPrice', 'quantity', 'dateAdded'], 'required'],
            [['description'], 'string'],
            [['unitPrice'], 'number'],
            [['quantity'], 'integer'],
            [['dateAdded', 'lastUpdated'], 'safe'],
            [['name', 'code'], 'string', 'max' => 50],
            [['name'], 'unique'],
            [['code'], 'unique'],
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
            'description' => 'Description',
            'unitPrice' => 'Unit Price',
            'quantity' => 'Quantity',
            'dateAdded' => 'Date Added',
            'lastUpdated' => 'Last Updated',
        ];
    }
}
