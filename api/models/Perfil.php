<?php

namespace api\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "perfil".
 *
 * @property int $idperfil
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $Created_ad
 *
 * @property Client $idperfil0
 */
class Perfil extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return 'perfil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['Created_ad'], 'safe'],
            [['firstname', 'lastname'], 'string', 'max' => 10],
            [['email'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 12],
            [['idperfil'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['idperfil' => 'idclient']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'idperfil' => 'Idperfil',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'email' => 'Email',
            'phone' => 'Phone',
            'Created_ad' => 'Created Ad',
        ];
    }

    /**
     * Gets query for [[Idperfil0]].
     *
     * @return ActiveQuery
     */
    public function getIdperfil0(): ActiveQuery
    {
        return $this->hasOne(Client::class, ['idclient' => 'idperfil']);
    }
}
