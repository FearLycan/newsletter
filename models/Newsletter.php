<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "newsletter".
 *
 * @property int $id
 * @property string $to
 * @property string $content
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 */
class Newsletter extends ActiveRecord
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => date("Y-m-d H:i:s"),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'newsletter';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['to', 'content', 'title'], 'required'],
            [['content'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['to', 'title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'to' => 'To',
            'content' => 'Content',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function send()
    {
        Yii::$app->mailer->compose('base', [
            'content' => $this->content
        ])
            ->setFrom('mail@dbronczyk.pl')
            ->setTo($this->to)
            ->setSubject($this->title)
            ->send();
    }
}
