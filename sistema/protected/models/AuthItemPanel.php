<?php

/**
 * This is the model class for table "authItemPanel".
 *
 * The followings are the available columns in table 'authItemPanel':
 * @property string $rol
 * @property string $panel
 */
class AuthItemPanel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return AuthItemPanel the static model class
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
		return 'authItemPanel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rol', 'length', 'max'=>255),
			array('panel', 'safe'),
			array('panel', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rol, panel', 'safe', 'on'=>'search'),
		);
	}
	public function getPanelRol($idUsuario)
	{
		$connection=Yii::app()->getDb();
		$sql="
SELECT authItemPanel.panel from AuthAssignment t LEFT JOIN authItemPanel on authItemPanel.rol=t.itemname LEFT JOIN AuthItem on AuthItem.name = t.itemname AND AuthItem.type=2 
		 WHERE t.userId='$idUsuario' ";
        $command=$connection->createCommand($sql);
            
            $res= $command->queryAll();
         
		return $res[0]['panel'];
	}
	public function getRol($idUsuario)
	{
		$connection=Yii::app()->getDb();
		$sql="
SELECT t.itemname from AuthAssignment t LEFT JOIN authItemPanel on authItemPanel.rol=t.itemname LEFT JOIN AuthItem on AuthItem.name = t.itemname AND AuthItem.type=2 
		 WHERE t.userId='$idUsuario' ";
        $command=$connection->createCommand($sql);
            
            $res= $command->queryAll();
         
		return $res[0]['itemname'];
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
			'rol' => 'Rol',
			'panel' => 'Panel',
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

		$criteria->compare('rol',$this->rol,true);
		$criteria->compare('panel',$this->panel,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}