<?php

namespace app\modules\admin\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $title
 * @property string $description
 * @property string $keywords
 */
class Category extends ActiveRecord {

    public static function tableName() {
        return 'category';
    }

    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'parent_id']);
    }

    public function rules() {
        return [
            [['parent_id'], 'integer'],
            [['title'], 'required'],
            [['title', 'description', 'keywords'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'parent_id' => 'Родительская категория',
            'title' => 'Наименование',
            'description' => 'Описание',
            'keywords' => 'Ключевые слова',
        ];
    }

}