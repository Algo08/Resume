<?php

namespace backend\models;

use borales\extensions\phoneInput\PhoneInputValidator;
use Yii;
use yii\helpers\Url;

/**
 * This is the model class for table "staff".
 *
 * @property int $id
 * @property string $full_name
 * @property string $date_of_birth
 * @property int $nation
 * @property string $data
 * @property int $phone
 * @property string $email
 * @property string $places_of_work
 * @property string $image_location
 */
class Staff extends \yii\db\ActiveRecord
{
    public $imageFile;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff';
    }


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['full_name', 'date_of_birth', 'nation', 'phone', 'email'], 'required'],
            [['date_of_birth'], 'safe'],
            [['phone'], 'string'],
            [['phone'], PhoneInputValidator::className()],
            [['data', 'places_of_work'], 'string'],
            [['full_name'], 'string', 'max' => 250],
            [['email', 'image_location', 'nation'], 'string', 'max' => 100],
            [['email'],'email'],
            [['config', 'work', 'date_of_birth'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'full_name' => 'Full Name',
            'date_of_birth' => 'Date Of Birth',
            'nation' => 'Nation',
            'data' => 'Data',
            'phone' => 'Phone',
            'email' => 'Email',
            'places_of_work' => 'Places Of Work',
            'image_location' => 'Image Location',
        ];
    }

    /**
     * @return bool
     */
    public function upload()
    {
        if ($this->imageFile) {
            $this->imageFile->saveAs('../web/uploads/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            \yii\imagine\Image::crop(Yii::getAlias('@webroot') .'/uploads/'. $this->imageFile->baseName . '.' . $this->imageFile->extension,250,250)
                ->save(Yii::getAlias('../web/uploads/'. $this->imageFile->baseName . '1.' . $this->imageFile->extension), ['quality' => 90]);

            unlink(Yii::getAlias('@webroot') .'/uploads/'. $this->imageFile->baseName . '.' . $this->imageFile->extension);

            if ($this->image_location && is_file(Yii::getAlias('@webroot').'/..'.$this->image_location)){
                unlink(Yii::getAlias('@webroot').'/..'.$this->image_location);
            }
            $this->image_location = '/uploads/'. $this->imageFile->baseName . '1.' . $this->imageFile->extension;
            return true;
        } else {
            return false;
        }
    }


    public function getWork()
    {
        return json_decode($this->data);
    }

    public function setWork($value)
    {
        foreach ($value as $key=>$item){
            if ($item == null){
                unset($value[$key]);
            }
        }
        $this->places_of_work = json_encode($value);
    }

    public function getConfig()
    {
        return json_decode($this->data);
    }

    public function setConfig($value)
    {
        foreach ($value as $key=>$item){
            if ($item == null){
                unset($value[$key]);
            }
        }
        $this->data = json_encode($value);
    }
}
