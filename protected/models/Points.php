<?php

/**
 * This is the model class for table "points".
 *
 * The followings are the available columns in table 'points':
 * @property integer $id
 * @property double $lat
 * @property double $lng
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $views_count
 * @property string $hist_date
 */
class Points extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Points the static model class
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
		return 'points';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('lat, lng, name, description, image, views_count, hist_date', 'required'),
			array('views_count', 'numerical', 'integerOnly'=>true),
			array('lat, lng', 'numerical'),
			array('name', 'length', 'max'=>250),
			array('description', 'length', 'max'=>500),
			array('image', 'length', 'max'=>400),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, lat, lng, name, description, image, views_count, hist_date', 'safe', 'on'=>'search'),
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
			'lat' => 'Lat',
			'lng' => 'Lng',
			'name' => 'Name',
			'description' => 'Description',
			'image' => 'Image',
			'views_count' => 'Views Count',
			'hist_date' => 'Hist Date',
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
		$criteria->compare('lat',$this->lat);
		$criteria->compare('lng',$this->lng);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('views_count',$this->views_count);
		$criteria->compare('hist_date',$this->hist_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}