<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;

class Tree extends Model
{
    public $rMin = 5;
    public $rMax = 15;
    public $result = [];
    public $reCaptcha;

    public function rules()
    {
        return [
            [['reCaptcha'], \himiklab\yii2\recaptcha\ReCaptchaValidator2::className(),
                'secret' => '6LcT46cUAAAAAPvgkWSPqepy8mM4_6ez0B5ck-ss', // unnecessary if reСaptcha is already configured
                'uncheckedMessage' => 'Please confirm that you are not a bot.'],
        ];
    }

    public function getTree()
    {
        for ($i = 1; $i < $this->getRand(); $i++){
            ArrayHelper::setValue($this->result, $i, ['name' => 'FListF', 'key' => $i]);
            for ($j = 1; $j < $this->getRand(); $j++){
                ArrayHelper::setValue($this->result, [$i, 'child', $j], ['name' => 'SListS', 'key' => $i . '-' . $j]);
                for ($item = 1; $item < $this->getRand(); $item++){
                    ArrayHelper::setValue($this->result, [$i, 'child', $j, 'child', $item], ['name' => 'TListT', 'key' => $i . '-' . $j . '-' . $item]);
                }
            }
        }
        return $this->result;
    }

    private function getRand()
    {
        return rand($this->rMin, $this->rMax);
    }

    public static function getChildNode($data)
    {
        echo '<ul><li><a class="a-link">' . $data['key'] . ' ' . $data['name'] . '</a></li><ul>';
        if(is_array($data['child'])) {
            foreach ($data['child'] as $key => $value) {
                if (is_array($value['child'])) {
                    self::getChildNode($value);
                } else {
                    echo '<li><a class="a-link">' . $value['key'] . ' ' . $value['name'] . '</a></li>';
                }
            }
            echo '</ul>';
        }
        echo '</ul>';

    }
}