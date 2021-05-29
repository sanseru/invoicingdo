<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "bisnis_partner".
 *
 * @property int $id
 * @property string|null $CardName
 * @property string|null $alamat
 * @property string|null $attention
 * @property string|null $createdDate
 * @property string|null $createdBy
 */
class BisnisPartner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bisnis_partner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alamat', 'attention'], 'string'],
            [['createdDate'], 'safe'],
            [['CardName', 'createdBy'], 'string', 'max' => 150],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'CardName' => 'Card Name',
            'alamat' => 'Alamat',
            'attention' => 'Attention',
            'createdDate' => 'Created Date',
            'createdBy' => 'Created By',
        ];
    }
}
