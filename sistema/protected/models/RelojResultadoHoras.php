<?php

/**
 * This is the model class for table "reloj_resultadoHoras".
 *
 * The followings are the available columns in table 'reloj_resultadoHoras':
 * @property integer $id
 * @property integer $idEmpleado
 * @property integer $fechaInicio
 * @property integer $fechaFin
 */
class RelojResultadoHoras extends CActiveRecord
{
    public $nombreEmpleado;
    public $horasTrabajadas;
    public $horasNormales;
    public $horasExtras;
    public $horasNocturnas;
    public $nocturnasExtras;
    public $entrada;
    public $salida;
	/**
	 * Returns the static model of the specified AR class.
	 * @return RelojResultadoHoras the static model class
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
		return 'reloj_resultadoHoras';
	}
        public function vaciarTabla()
{
    $sql="TRUNCATE table reloj_resultadoHoras";
    $connection=Yii::app()->getDb();
    $command=$connection->createCommand($sql);
    try {
        $command->queryAll();
    } catch (Exception $exc) {
        
    }
}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idEmpleado, fechaInicio, fechaFin', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, idEmpleado, fechaInicio, fechaFin', 'safe', 'on'=>'search'),
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
			'idEmpleado' => 'Id Empleado',
			'fechaInicio' => 'Fecha Inicio',
			'fechaFin' => 'Fecha Fin',
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
		$criteria->compare('idEmpleado',$this->idEmpleado);
		$criteria->compare('fechaInicio',$this->fechaInicio);
		$criteria->compare('fechaFin',$this->fechaFin);
                $criteria->join='left join reloj_empleados on reloj_empleados.idEmpleado=t.idEmpleado';
		$criteria->select='t.*,FROM_UNIXTIME(t.fechaInicio,"%D-%M %H:%i") AS entrada,FROM_UNIXTIME(t.fechaFin,"%D-%M %H:%i") AS salida,
                    reloj_empleados.nombreEmpleado,t.fechaFin-t.fechaInicio as horasTrabajadas,
                    contarHorasNormales(t.fechaInicio,t.fechaFin,NULL) as horasNormales,
                    contarHorasNormales(t.fechaInicio,t.fechaFin,1) as horasExtras
                    ,contarHorasNocturnas(t.fechaInicio,t.fechaFin,NULL) as horasNocturnas';

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        /*
         * 
         * ES FERIADO PARO
          drop function esFeriadoParo;
delimiter $$
CREATE FUNCTION `esFeriadoParo`(fecha INTEGER(50), idEmpleado INTEGER(50))
RETURNS CHAR(100)

Begin

DECLARE esFeriado CHAR(100);
DECLARE esParo CHAR(100);
DECLARE esIncidencia CHAR(100);

SELECT id INTO esIncidencia
FROM  `reloj_incidencias` 
WHERE fechaInicio <=  DATE_FORMAT(FROM_UNIXTIME(fecha),GET_FORMAT(DATE,'ISO'))
AND fechaFin >=  DATE_FORMAT(FROM_UNIXTIME(fecha),GET_FORMAT(DATE,'ISO'))
AND idEmpleado =idEmpleado;

SELECT t.fechaFeriado INTO esFeriado 
FROM  `reloj_feriados` t
WHERE t.fechaFeriado=DATE_FORMAT(FROM_UNIXTIME(fecha),GET_FORMAT(DATE,'ISO'));

SELECT t.idParo INTO esParo
FROM  `reloj_paros` t
WHERE t.fechaParo=DATE_FORMAT(FROM_UNIXTIME(fecha),GET_FORMAT(DATE,'ISO'));

return NOT(isnull(esFeriado) AND isnull(esParo) AND isnull(esIncidencia));
end;
$$

        #HORAS NOCTURNAS
         drop function contarHorasNocturnas;

delimiter $$
CREATE FUNCTION `contarHorasNocturnas`(fechaInicio INTEGER(50), fechaFin INTEGER(50), extras INTEGER(1))
RETURNS INTEGER(50)

Begin
DECLARE fmi INT(30);
DECLARE fmf INT(30);
DECLARE subTotal INT(30);
DECLARE fechaInicioAux INT(30);
DECLARE fechaFinAux INT(30);


#calculo los datos para la primera fecha
SET fmi= UNIX_TIMESTAMP(CONCAT(YEAR(FROM_UNIXTIME(fechaInicio)),'-',MONTH(FROM_UNIXTIME(fechaInicio)),'-',DAYOFMONTH(FROM_UNIXTIME(fechaInicio)),' 21:00:00'));

SET fmf= UNIX_TIMESTAMP(CONCAT(YEAR(FROM_UNIXTIME(fechaInicio)),'-',MONTH(FROM_UNIXTIME(fechaInicio)),'-',DAYOFMONTH(FROM_UNIXTIME(fechaInicio)),' 6:00:00'))+86400;
#le sumo 1 dia a la fecha

IF fechaInicio<=fmi THEN SET fechaInicioAux=fmi; ELSE SET fechaInicioAux=fechaInicio;END IF;
IF fechaFin <=fmf  THEN SET fechaFinAux=fechaFin ; ELSE SET fechaFinAux=fmf;END IF;

SET subTotal=fechaFinAux-fechaInicioAux; 
IF subTotal< 0  THEN SET subTotal=0 ;END IF;
return subTotal;
end;
$$
         
#HORAS NORMALES
         
        drop function contarHorasNormales;
delimiter $$
CREATE FUNCTION `contarHorasNormales`(fechaInicio INTEGER(50), fechaFin INTEGER(50), extras INTEGER(1))
RETURNS INTEGER(50)

Begin
DECLARE fmi INT(30);
DECLARE fmf INT(30);
DECLARE subTotal INT(30);
DECLARE fechaInicioAux INT(30);
DECLARE fechaFinAux INT(30);


#calculo los datos para la primera fecha
SET fmi= UNIX_TIMESTAMP(CONCAT(YEAR(FROM_UNIXTIME(fechaInicio)),'-',MONTH(FROM_UNIXTIME(fechaInicio)),'-',DAYOFMONTH(FROM_UNIXTIME(fechaInicio)),' 06:00:00'));

SET fmf= UNIX_TIMESTAMP(CONCAT(YEAR(FROM_UNIXTIME(fechaInicio)),'-',MONTH(FROM_UNIXTIME(fechaInicio)),'-',DAYOFMONTH(FROM_UNIXTIME(fechaInicio)),' 21:00:00'));

IF fechaInicio<=fmi THEN SET fechaInicioAux=fmi; ELSE SET fechaInicioAux=fechaInicio;END IF;
IF fechaFin <=fmf  THEN SET fechaFinAux=fechaFin; ELSE SET fechaFinAux=fmf;END IF;

IF(DAYOFMONTH(FROM_UNIXTIME(fechaInicio))<>DAYOFMONTH(FROM_UNIXTIME(fechaFin))) THEN
SET subTotal=fmf  -fechaInicio; ELSE 
SET subTotal=fechaFinAux-fechaInicioAux; END IF;

#calculo los datos para la segunda fecha
IF(DAYOFMONTH(FROM_UNIXTIME(fechaInicio))<>DAYOFMONTH(FROM_UNIXTIME(fechaFin))) THEN

SET fmi= UNIX_TIMESTAMP(CONCAT(YEAR(FROM_UNIXTIME(fechaFin)),'-',MONTH(FROM_UNIXTIME(fechaFin)),'-',DAYOFMONTH(FROM_UNIXTIME(fechaFin)),' 06:00:00'));

SET fmf= UNIX_TIMESTAMP(CONCAT(YEAR(FROM_UNIXTIME(fechaFin)),'-',MONTH(FROM_UNIXTIME(fechaFin)),'-',DAYOFMONTH(FROM_UNIXTIME(fechaFin)),' 21:00:00'));

SET fechaInicioAux=fmi;
SET fechaFinAux=fechaFin;

SET subTotal=subTotal+(fechaFinAux-fechaInicioAux);
END IF;
IF extras=1 THEN SET subTotal=subTotal-8; END IF;
IF subTotal<0 THEN SET subTotal=0; END IF;
return subTotal;
end;
$$ 
*/
}