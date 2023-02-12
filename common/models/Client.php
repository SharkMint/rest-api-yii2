<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%client}}".
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
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%client}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
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
    public function attributeLabels()
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
     * @return \yii\db\ActiveQuery|\common\models\query\AddressQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::class, ['idaddress' => 'idclient']);
    }

    /**
     * Gets query for [[Perfil]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\PerfilQuery
     */
    public function getPerfil()
    {
        return $this->hasOne(Perfil::class, ['idperfil' => 'idclient']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ClientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ClientQuery(get_called_class());
    }
}
