<?php

namespace app\models;

use Yii;
use yii\db\Query;

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
            'idpastes' => 'Idpastes',
            'who' => 'Who',
            'title' => 'Title',
            'paste' => 'Paste',
            'date' => 'Date',
            'refers' => 'Refers',
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
    public function top10()
    {
        $query = new Query();
		
		$query->select('`idpastes`,`who`,`title`,`date`')
			  ->from('pastes')
			  ->limit('5')
		      ->orderBy('date');
		
        return $query;
    }
}
