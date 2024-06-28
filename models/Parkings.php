<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parkings".
 *
 * @property int $id
 * @property int $user_id
 * @property string $entry_date
 * @property string $exit_date
 * @property int $cost
 * @property int $discount
 * @property int $debt
 *
 * @property User $user
 */
class Parkings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parkings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'entry_date', 'exit_date', 'cost', 'discount', 'debt'], 'required'],
            [['user_id', 'cost', 'discount', 'debt'], 'integer'],
            [['entry_date', 'exit_date'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'entry_date' => 'Entry Date',
            'exit_date' => 'Exit Date',
            'cost' => 'Cost',
            'discount' => 'Discount',
            'debt' => 'Debt',
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
