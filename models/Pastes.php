<?php

namespace app\models;

use Yii;
use yii\db\Query;
use yii\data\ActiveDataProvider;
use yii\helpers\BaseUrl;


/**
 * This is the model class for table "pastes".
 *
 * @property string $idpastes
 * @property string $who
 * @property string $title
 * @property string $paste
 * @property integer $date
 * @property string $refers
 *
 * @property Pastes $refers0
 * @property Pastes[] $pastes
 */
class Pastes extends \yii\db\ActiveRecord
{
   public $captcha;
    
   /**
    * @inheritdoc
    */
    public static function tableName()
    {
        return 'pastes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['who', 'title', 'paste','captcha'], 'required'],
            [['paste'], 'string'],
            [['date'],'integer'],
            [['refers'], 'integer'],
            [['who', 'title'], 'string', 'max' => 45],
            [['captcha'],'captcha']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idpastes' => 'Id',
            'who' => 'User\'s name or a nickname',
            'title' => 'Title',
            'paste' => 'New Paste',
            'date' => 'Date',
            'refers' => 'Paste that Refers',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRefers0()
    {
        return $this->hasOne(Pastes::className(), ['idpastes' => 'refers']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPastes()
    {
        return $this->hasMany(Pastes::className(), ['refers' => 'idpastes']);
    }
	
	public function beforeSave()
	{
		$insert=false;
		if($this->isNewRecord)
		{
			$this->date=time();
			$insert=true;
		}
		return parent::beforeSave($insert);
	}
	
	/**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public static function top10()
    {
        $query = Pastes::Find()->limit('5')->orderBy('date');		
		$provider=new ActiveDataProvider(['query'=>$query]);
		$data=$provider->getModels();
		$sane=[];		
		
		$i=1;
		foreach($data as $d)
		{
			$sane["item".$i]=['id'=>$d->idpastes,'name'=>$d->who,'title'=>$d->title,'date'=>date("d/m/Y h:m a",$d->date),'url'=>BaseUrl::to(['pastes/view','id'=>$d->idpastes])];
			$i++;
		}
        return  $sane;
    }
}
