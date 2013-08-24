<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property integer $id
 * @property string $date
 * @property string $title
 * @property string $text
 * @property integer $author
 * @property integer $point
 * @property integer $views
 * @property integer $like
 * @property integer $dislike
 * @property string $image
 * @property string $hist_date
 */
class Posts extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Posts the static model class
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
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('date, title, text, author, views, like, dislike, image, hist_date', 'required'),
			array('author, point, views, like, dislike', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>250),
			array('image', 'length', 'max'=>400),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, date, title, text, author, point, views, like, dislike, image, hist_date', 'safe', 'on'=>'search'),
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
			'date' => 'Date',
			'title' => 'Title',
			'text' => 'Text',
			'author' => 'Author',
			'point' => 'Point',
			'views' => 'Views',
			'like' => 'Like',
			'dislike' => 'Dislike',
			'image' => 'Image',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('author',$this->author);
		$criteria->compare('point',$this->point);
		$criteria->compare('views',$this->views);
		$criteria->compare('like',$this->like);
		$criteria->compare('dislike',$this->dislike);
		$criteria->compare('image',$this->image,true);
		$criteria->compare('hist_date',$this->hist_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}