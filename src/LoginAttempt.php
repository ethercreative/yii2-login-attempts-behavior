<?php

namespace ethercreative\loginattempts;

class LoginAttempt extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%login_attempt}}';
    }

    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['timestampBehavior'] = [
            'class' => \yii\behaviors\TimestampBehavior::className(),
            'value' => new \yii\db\Expression('NOW()'),
        ];

        return $behaviors;
    }

    public function rules()
    {
        return [
            [['key'], 'required'],
        ];
    }
}
