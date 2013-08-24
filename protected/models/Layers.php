<?php

/**
 * This is the model class for table "layers".
 *
 * The followings are the available columns in table 'layers':
 * @property integer $id
 * @property string $name
 * @property string $icon
 */
class Layers extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Layers the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'layers';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, icon', 'required'),
			array('name', 'length', 'max'=>250),
			array('icon', 'length', 'max'=>400),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, icon', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'icon' => 'Icon',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('icon',$this->icon,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 *	Return all layers in json format
	 */
	public function get(){
		$layers = Yii::app()->db->createCommand()
							->select()
							->from('layers')
							->queryAll();

		return $layers;
	}

	public function getPoints($id){
		$pointsIDs = Yii::app()->db->createCommand()
							   ->select('point')
							   ->from('places')
							   ->where('layer=:layerID', array(':layerID' => $id))
							   ->queryAll();
		
		foreach ($pointsIDs as $pointID) {
			$IDs[] = $pointID['point'];
		}

		$points = Yii::app()->db->createCommand()
								->select()
								->from('points')
								->where(array('in', 'id', $IDs))
								->queryAll();
		return $points;
	}
}