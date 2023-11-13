<?php

namespace app\modules\sam\models;

use Yii;
//
use \yii\web\UploadedFile;
use yii\helpers\Url;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "easy_upload".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $surname
 * @property string|null $photo
 * @property string|null $photos
 */
class EasyUpload extends \yii\db\ActiveRecord
{

    public $upload_foler = 'uploads';
    const UPLOAD_FOLDER='photolibrarys';

    // UPLOAD_FOLDER เป็นตัวแปร static ให้เรากำหนดชื่อโฟลเดอร์ที่ต้องการอัพโหลดได้
    const UPLOAD_PATH  = 'uploads';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'easy_upload';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['photos'], 'string'],
            [['name', 'surname'], 'string', 'max' => 100],
            // [['photo'], 'string', 'max' => 255],
            [
                ['photo'], 'file',
                'skipOnEmpty' => true,
                'extensions' => 'png,jpg,jpeg,gif'
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ref' => Yii::t('app', 'ref'),
            'event_name' => Yii::t('app', 'event_name'),
            'name' => Yii::t('app', 'Name'),
            'surname' => Yii::t('app', 'Surname'),
            'photo' => Yii::t('app', 'Photo'),
            'photos' => Yii::t('app', 'Photos'),
        ];
    }

    public static function getUploadPath(){
        return Yii::getAlias('@webroot').'/'.self::UPLOAD_FOLDER.'/';
    }

    public static function getUploadUrl(){
        return Url::base(true).'/'.self::UPLOAD_FOLDER.'/';
    }

    public function getThumbnails($ref,$event_name){
         $uploadFiles   = Uploads::find()->where(['ref'=>$ref])->all();
         $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url'=>self::getUploadUrl(true).$ref.'/'.$file->real_filename,
                'src'=>self::getUploadUrl(true).$ref.'/thumbnail/'.$file->real_filename,
                'options' => ['title' => $event_name]
            ];
        }
        return $preview;
    }
}
