<?php

namespace app\modules\sam\models;

use Yii;
use yii\helpers\Url;

use yii\behaviors\TimestampBehavior;
use app\modules\sam\models\NcrStatus;
// use yii\behaviors\BlameableBehavior;

//
use yii\helpers\ArrayHelper;
use app\modules\sam\models\Department;
use app\modules\sam\models\Problem;

//
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;

class Ncr extends \yii\db\ActiveRecord
{
    const UPLOAD_FOLDER = 'ncrs';

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            // BlameableBehavior::class,
            [
                'class' => 'mdm\autonumber\Behavior',
                'attribute' => 'event_name', // required
                'group' => $this->id, // optional
                'value' => 'NCR-' . date('ym') . '/?', // format auto number. '?' will be replaced with generated number
                'digit' => 2 // optional, default to null. 
            ],
            // to_department
            [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'to_department',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'to_department',
                ],
                'value' => function ($event) {
                    return implode(',', $this->to_department);
                },
            ],
             // problem
             [
                'class' => AttributeBehavior::class,
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'problem',
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'problem',
                ],
                'value' => function ($event) {
                    return implode(',', $this->problem);
                },
            ],
        ];
    }

    public static function tableName()
    {
        return 'ncr';
    }

    public function rules()
    {
        return [
            // [['event_name','detail'],'required'],
            [['event_name'], 'autonumber', 'format' => 'NCR-' . date('ym') . '/?'],
            [['detail', 'recheck'], 'string'],
            [['ref', 'production_date'], 'string', 'max' => 50],
            [['event_name', 'location', 'from_department', 'product_name', 'lot'], 'string', 'max' => 255],
            [['customer_name', 'notify_by'], 'string', 'max' => 150],
            [['customer_mobile_phone'], 'string', 'max' => 20],
            [['ref'], 'unique'],
            // [['status'], 'integer'],
            [['product_name', 'from_department'], 'required'],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => NcrStatus::class, 'targetAttribute' => ['status' => 'id']],
            [['start_date', 'end_date', 'proplem_date', 'created_at', 'updated_at', 'to_department','problem'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ref' => 'ใช้กับ upload ajax',

            'event_name' => 'เลขที่ NCR',
            'problem' => 'กระบวนการที่พบปัญหา',
            'to_department' => 'ถึงหน่วยงาน',

            'product_name' => 'ชื่อสินค้า',
            'production_date' => 'วันที่ผลิต',
            'lot' => 'ล็อต',
            'customer_name' => 'ชื่อลูกค้า',
            'customer_mobile_phone' => 'เบอร์โทร',
            'detail' => 'รายละเอียด',

            'from_department' => 'จากหน่วยงาน',
            'notify_by' => 'ผู้รายงาน',
            'proplem_date' => 'วันที่พบปัญหา',
            'recheck' => 'การดำเนินการเบื้องต้น',
            'created_at' => 'วันที่',
            'updated_at' => 'ปรับปรุงเมื่อ',

            'status' => 'สถานะ',

            'start_date' => 'วันที่เริ่ม',
            'end_date' => 'วันที่เสร็จ',
            'location' => 'สถานที่',
            'toDepartment' => 'ถึง',
            'images' => 'รูปภาพ',
        ];
    }


    // Relation
    public function getNcrStatus0()
    {
        return $this->hasOne(NcrStatus::class, ['id' => 'status']);
    }

    public function getFromDepartment0()
    {
        return $this->hasOne(Department::class, ['department_id' => 'from_department']);
    }

    public function getToDepartment0()
    {
        return $this->hasOne(Department::class, ['department_id' => 'to_department']);
    }

    public function getProblem0()
    {
        return $this->hasOne(Problem::class, ['problem_id' => 'problem']);
    }


    // Set Upload
    public static function getUploadPath()
    {
        return Yii::getAlias('@webroot') . '/' . self::UPLOAD_FOLDER . '/';
    }

    public static function getUploadUrl()
    {
        return Url::base(true) . '/' . self::UPLOAD_FOLDER . '/';
    }

    public function getThumbnails($ref, $event_name)
    {
        $uploadFiles   = Uploads::find()->where(['ref' => $ref])->all();
        $preview = [];
        foreach ($uploadFiles as $file) {
            $preview[] = [
                'url' => self::getUploadUrl(true) . $ref . '/' . $file->real_filename,
                'src' => self::getUploadUrl(true) . $ref . '/thumbnail/' . $file->real_filename,
                'options' => ['title' => $event_name]
            ];
        }
        return $preview;
    }

    // getTodepartmentName
    public function getTodepartmentName(){
        //$skills = $this->getItemSkill();
        $todepartments = ArrayHelper::map(Department::find()->all(),'department_id','details');
        $todepartmentSelected = explode(',', $this->to_department);
        $todepartmentSelectedName = [];
        foreach ($todepartments as $key => $todepartmentName) {
          foreach ($todepartmentSelected as $todepartmentKey) {

            if($key === (int)$todepartmentKey){
              $todepartmentSelectedName[] = $todepartmentName;
            }
          }
        }

        return implode(', ', $todepartmentSelectedName);
    }

    public function todepartmentToArray()
    {
      return $this->to_department = explode(',', $this->to_department);
    }

    // getTodepartmentName
    public function getProblemName(){
        //$skills = $this->getItemSkill();
        $problems = ArrayHelper::map(Problem::find()->all(),'problem_id','name');
        $problemSelected = explode(',', $this->problem);
        $problemSelectedName = [];
        foreach ($problems as $key => $problemName) {
          foreach ($problemSelected as $problemKey) {

            if($key === (int)$problemKey){
              $problemSelectedName[] = $problemName;
            }
          }
        }

        return implode(', ', $problemSelectedName);
    }

    public function problemToArray()
    {
      return $this->problem = explode(',', $this->problem);
    }

   
        
}
