<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "masterperusahaan".
 *
 * @property int $id
 * @property string|null $nama_perusahaan
 * @property string|null $alamat
 * @property string|null $kontak
 * @property resource|null $logo
 * @property string|null $createdBy
 * @property string|null $createdTime
 */
class Masterperusahaan extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'masterperusahaan';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['alamat', 'kontak', 'logo'], 'string'],
            [['createdTime'], 'safe'],
            [['nama_perusahaan'], 'string', 'max' => 255],
            [['createdBy'], 'string', 'max' => 22],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama_perusahaan' => 'Nama Perusahaan',
            'alamat' => 'Alamat',
            'kontak' => 'Kontak',
            'logo' => 'Logo',
            'createdBy' => 'Created By',
            'createdTime' => 'Created Time',
        ];
    }
}
