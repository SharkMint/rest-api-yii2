<?php

namespace api\modules\v1\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $idaddress
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zipcode
 * @property string|null $country
 * @property string|null $created_ad
 *
 * @property Client $idaddress0
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_ad'], 'safe'],
            [['city', 'state'], 'string', 'max' => 25],
            [['zipcode'], 'string', 'max' => 15],
            [['country'], 'string', 'max' => 35],
            [['idaddress'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['idaddress' => 'idclient']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idaddress' => 'Idaddress',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'created_ad' => 'Created Ad',
        ];
    }

    /**
     * Gets query for [[Idaddress0]].
     *
     * @return \yii\db\ActiveQuery|yii\db\ActiveQuery
     */
    public function getIdaddress0()
    {
        return $this->hasOne(Client::class, ['idclient' => 'idaddress']);
    }

    /**
     * {@inheritdoc}
     * @return AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AddressQuery(get_called_class());
    }
}
