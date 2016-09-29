<?php

/**
 * This is the model class for table "usuarios_paneles".
 *
 * The followings are the available columns in table 'usuarios_paneles':
 * @property integer $idPanelUsuario
 * @property string $nombrePanel
 * @property string $descripcionPanel
 * @property string $ayuda
 * @property string $linkAyuda
 */
class UsuariosPaneles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UsuariosPaneles the static model class
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
		return 'usuarios_paneles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombrePanel, linkAyuda', 'length', 'max'=>255),
			array('descripcionPanel, ayuda', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idPanelUsuario, nombrePanel, descripcionPanel, ayuda, linkAyuda', 'safe', 'on'=>'search'),
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
			'idPanelUsuario' => 'Id Panel Usuario',
			'nombrePanel' => 'Nombre Panel',
			'descripcionPanel' => 'Descripcion Panel',
			'ayuda' => 'renderVista',
			'linkAyuda' => 'Link Ayuda',
		);
	}
        public function getPaneles($idUsuario)
        {
            $usuario=Usuarios::model()->findByPk($idUsuario);
            if($usuario==null) return array();
           
            $res=explode(',', $usuario->panelDeControl);
            $sal=array();
            foreach ($res as $value) 
                $sal[]=self::model()->findByPk($value);
            return $sal;
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

		$criteria->compare('idPanelUsuario',$this->idPanelUsuario);
		$criteria->compare('nombrePanel',$this->nombrePanel,true);
		$criteria->compare('descripcionPanel',$this->descripcionPanel,true);
		$criteria->compare('ayuda',$this->ayuda,true);
		$criteria->compare('linkAyuda',$this->linkAyuda,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}