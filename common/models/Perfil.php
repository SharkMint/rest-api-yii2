<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%perfil}}".
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
class Perfil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%perfil}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
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
    public function attributeLabels()
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
     * @return \yii\db\ActiveQuery|\common\models\query\ClientQuery
     */
    public function getIdperfil0()
    {
        return $this->hasOne(Client::class, ['idclient' => 'idperfil']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\PerfilQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PerfilQuery(get_called_class());
    }
}
