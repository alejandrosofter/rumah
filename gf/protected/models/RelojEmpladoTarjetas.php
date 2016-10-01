<?php

/**
 * This is the model class for table "reloj_empladoTarjetas".
 *
 * The followings are the available columns in table 'reloj_empladoTarjetas':
 * @property integer $idEmpleadoTarjeta
 * @property string $idEmpleado
 * @property string $idTarjeta
 * @property string $fechaTarjeta
 */
class RelojEmpladoTarjetas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RelojEmpladoTarjetas the static model class
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
		return 'reloj_empladoTarjetas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEmpleado, idTarjeta', 'length', 'max'=>255),
			array('fechaTarjeta', 'safe'),
                    array('fechaTarjeta,idTarjeta', 'required'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idEmpleadoTarjeta, idEmpleado, idTarjeta, fechaTarjeta', 'safe', 'on'=>'search'),
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
			'idEmpleadoTarjeta' => 'Tarjeta de empleado',
			'idEmpleado' => 'Empleado',
			'idTarjeta' => 'Tarjeta',
			'fechaTarjeta' => 'Fecha Tarjeta',
		);
	}
public function vaciarTabla()
{
    $sql="TRUNCATE table reloj_horaempleados";
    $connection=Yii::app()->getDb();
    $command=$connection->createCommand($sql);
    try {
        $command->queryAll();
    } catch (Exception $exc) {
        
    }
}
    
	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function busquedaTarjeta($idEmpleado)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$criteria->compare('idEmpleado',$idEmpleado,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        public function getEmpleado($idTarjeta)
        {
            $criteria=new CDbCriteria;
            $sql="SELECT * FROM `reloj_empladoTarjetas` `t` WHERE idTarjeta='$idTarjeta'";
		$connection=Yii::app()->getDb();
    $command=$connection->createCommand($sql);
    
        $res=$command->queryAll();
                if(count($res)==0)return 0;
                return $res[0]['idEmpleado'];
        }
        public function ingresar($empleado,$fecha)
        {
            $sql="INSERT INTO `reloj_horaEmpleados` (`idEmpleado`, `fechaHoraTrabajo`) VALUES ('$empleado', '$fecha')";
            $connection=Yii::app()->getDb();
            $command=$connection->createCommand($sql);
            try {
                $res=$command->queryAll();
            } catch (Exception $exc) {
                
            }

            
        }
}