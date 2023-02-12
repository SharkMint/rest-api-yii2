<?php

namespace api\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "client".
 *
 * @property int $idclient
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $city
 * @property string|null $state
 * @property string|null $zipcode
 * @property string|null $country
 * @property string|null $created_ad
 *
 * @property Address $address
 * @property Perfil $perfil
 */
class Client extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['created_ad'], 'safe'],
            [['firstname', 'lastname'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 20],
            [['phone', 'zipcode'], 'string', 'max' => 15],
            [['city', 'state', 'country'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'idclient' => 'Idclient',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'phone' => 'Phone',
            'city' => 'City',
            'state' => 'State',
            'zipcode' => 'Zipcode',
            'country' => 'Country',
            'created_ad' => 'Created Ad',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return ActiveQuery
     */
    public function getAddress(): ActiveQuery
    {
        return $this->hasOne(Address::class, ['idaddress' => 'idclient']);
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return ActiveQuery
     */
    public function getPerfil(): ActiveQuery
    {
        return $this->hasOne(Perfil::class, ['idperfil' => 'idclient']);
    }
}
