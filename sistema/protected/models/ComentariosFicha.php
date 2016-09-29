<?php

/**
 * This is the model class for table "comentariosFicha".
 *
 * The followings are the available columns in table 'comentariosFicha':
 * @property integer $idComentarioFicha
 * @property string $tipo
 * @property integer $idTipo
 * @property string $fechaComentario
 * @property string $detalleComentario
 * @property integer $idUsuario
 */
class ComentariosFicha extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ComentariosFicha the static model class
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
		return 'comentariosFicha';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('tipo, idTipo, fechaComentario, detalleComentario, idUsuario', 'required'),
			array('idTipo, idUsuario', 'numerical', 'integerOnly'=>true),
			array('tipo', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idComentarioFicha, tipo, idTipo, fechaComentario, detalleComentario, idUsuario', 'safe', 'on'=>'search'),
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
			'idComentarioFicha' => 'Id Comentario Ficha',
			'tipo' => 'Tipo',
			'idTipo' => 'Id Tipo',
			'fechaComentario' => 'Fecha Comentario',
			'detalleComentario' => 'Detalle Comentario',
			'idUsuario' => 'Id Usuario',
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

		$criteria->compare('idComentarioFicha',$this->idComentarioFicha);
		$criteria->compare('tipo',$this->tipo,true);
		$criteria->compare('idTipo',$this->idTipo);
		$criteria->compare('fechaComentario',$this->fechaComentario,true);
		$criteria->compare('detalleComentario',$this->detalleComentario,true);
		$criteria->compare('idUsuario',$this->idUsuario);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}