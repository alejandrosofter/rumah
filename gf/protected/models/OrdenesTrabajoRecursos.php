<?php

/**
 * This is the model class for table "ordenesTrabajo_recursos".
 *
 * The followings are the available columns in table 'ordenesTrabajo_recursos':
 * @property integer $idOrdenIdRecurso
 * @property integer $idOrdenTrabajo
 * @property integer $idRecurso
 */
class OrdenesTrabajoRecursos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return OrdenesTrabajoRecursos the static model class
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
		return 'ordenesTrabajo_recursos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idOrdenTrabajo, idRecurso', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idOrdenIdRecurso, idOrdenTrabajo, idRecurso', 'safe', 'on'=>'search'),
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
			'idOrdenIdRecurso' => 'Id Orden Id Recurso',
			'idOrdenTrabajo' => 'Id Orden Trabajo',
			'idRecurso' => 'Id Recurso',
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

		$criteria->compare('idOrdenIdRecurso',$this->idOrdenIdRecurso);
		$criteria->compare('idOrdenTrabajo',$this->idOrdenTrabajo);
		$criteria->compare('idRecurso',$this->idRecurso);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}