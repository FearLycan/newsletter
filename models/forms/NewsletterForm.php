<?php

namespace app\models\forms;


use app\models\Newsletter;

class NewsletterForm extends Newsletter
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['to', 'content', 'title'], 'required'],
            [['content'], 'string'],
            [['to', 'title'], 'string', 'max' => 255],
            [['to'], 'email'],
        ];
    }
}