<?php

namespace app\modules\sam\models;

use Yii;
use yii\helpers\Url;

class PhotoLibrary extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER='photolibrarys';
   
    public static function tableName()
    {
        return 'photo_library';
    }

    public function rules()
    {
        return [
            [['event_name','detail'],'required'],
            [['detail'], 'string'],
            [['start_date', 'end_date'], 'safe'],
            [['ref'], 'string', 'max' => 50],
            [['event_name', 'location'], 'string', 'max' => 255],
            [['customer_name'], 'string', 'max' => 150],
            [['customer_mobile_phone'], 'string', 'max' => 20],
            [['ref'], 'unique']
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'เลข fk กับ upload ใช้กับ upload ajax',
            'event_name' => 'ชื่องาน',
            'detail' => 'รายละเอียด',
            'start_date' => 'วันที่เริ่มถ่ายภาพ',
            'end_date' => 'วันที่ถ่ายภาพเสร็จ',
            'location' => 'สถานที่',
            'customer_name' => 'ชื่อลูกค้า',
            'customer_mobile_phone' => 'เบอร์โทร',
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
