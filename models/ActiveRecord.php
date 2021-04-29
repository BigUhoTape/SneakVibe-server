<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord as BaseActiveRecord;
use yii\db\Expression;

class ActiveRecord extends BaseActiveRecord {

    public function behaviors()
    {
        $behaviors = [];
        if($this->tableName() != '{{%active_record}}'){
            if($this->hasAttribute('created_at') || $this->hasAttribute('updated_at')){
                $attributes = [];
                if($this->hasAttribute('created_at')){
                    $attributes = array_merge_recursive([
                        BaseActiveRecord::EVENT_BEFORE_INSERT => ['created_at']
                    ]);
                }if($this->hasAttribute('updated_at')){
                    $attributes = array_merge_recursive($attributes, [
                        BaseActiveRecord::EVENT_BEFORE_INSERT => ['updated_at'],
                        BaseActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at']
                    ]);
                }
                $behaviors['timestamp'] = [
                    'class' => TimestampBehavior::className(),
                    'attributes' => $attributes,
                    'value' => new Expression('NOW()'),
                ];
            }
        }
        return $behaviors;
    }

    public function getCreatedAt(){
        return date_create($this->created_at);
    }

    public function getUpdatedAt(){
        return date_create($this->updated_at);
    }

}