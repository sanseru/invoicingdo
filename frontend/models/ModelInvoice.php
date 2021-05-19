<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property int $id
 * @property string $invoice_number
 * @property string $due_date
 * @property string $name
 * @property string $attn
 * @property string $address
 * @property double $amount
 * @property string $transaction_date
 * @property string $payment_method
 * @property string $transaction_id
 * @property double $payment
 * @property string $status
 * @property string $created_at
 */
class ModelInvoice extends \yii\db\ActiveRecord
{
    const STATUS_CREATED = 'created'; //invoice diterbitkan
    const STATUS_PAID = 'paid'; //invoice dibayar
    const STATUS_CANCELED = 'canceled'; //invoice dicancel

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment','transaction_date','payment_method','transaction_id'],'required','on'=>'payment'],
            [['due_date', 'name', 'attn', 'address', 'status', 'created_at','portof_loading',
            'portof_discharge','vessel_name','no_container','no_seal','idheadcompany'], 'required'],
            [['due_date', 'transaction_date', 'created_at'], 'safe'],
            [['address'], 'string'],
            [['amount', 'payment'], 'number'],
            [['invoice_number', 'transaction_id','deliveryorder'], 'string', 'max' => 20],
            [['name', 'status'], 'string', 'max' => 125],
            [['attn'], 'string', 'max' => 250],
            [['payment_method'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_number' => 'Invoice Number',
            'deliveryorder' => 'Delivery Order',
            'due_date' => 'Due Date',
            'name' => 'Name',
            'attn' => 'Attn',
            'address' => 'Address',
            'amount' => 'Amount',
            'transaction_date' => 'Transaction Date',
            'payment_method' => 'Payment Method',
            'transaction_id' => 'Transaction ID',
            'payment' => 'Payment',
            'status' => 'Status',
            'created_at' => 'Created At',
        ];
    }

    public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            //sebagai sample saja untuk mengenerate nomor invoice
            //format : tahun-bulan-id database
            $number = 'INV/'.date('Y').date('m').'/'.str_pad($this->id,4,0,STR_PAD_LEFT);
            $donumber = 'DO/'.date('Y').date('m').'/'.str_pad($this->id,4,0,STR_PAD_LEFT);
            $this->updateAttributes(['invoice_number'=>$number,'deliveryorder'=>$donumber]);
        }
        parent::afterSave($insert, $changedAttributes);
    }
}
