<?php

/**
 * This is the model class for table "crons".
 *
 * The followings are the available columns in table 'crons':
 * @property integer $idCron
 * @property string $minutos
 * @property string $horas
 * @property string $dias
 * @property string $meses
 * @property string $diasSemana
 * @property string $script
 * @property string $parametros
 * @property string $nombre
 * @property string $descripcion
 */
class Crons extends CActiveRecord
{
    public $encargado;
    public $supervisor;
	/**
	 * Returns the static model of the specified AR class.
	 * @return Crons the static model class
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
		return 'crons';
	}
        public function getOtroDia($dia)
        {
            if($dia=='*')return 'Todos';
            return $dia;
        }
        public function getDia($dia)
        {
            return $dia;
        }
        private function getNombreDia($dia)
        {
            switch ($dia){
                case '*':{
                    return 'Todos';
                    break;
                }
                case '0':{
                    return 'Domingo';
                    break;
                }
                case '1':{
                    return 'Lunes';
                    break;
                }
                case '2':{
                    return 'Martes';
                    break;
                }
                case '3':{
                    return 'Miercoles';
                    break;
                }
                case '4':{
                    return 'Jueves';
                    break;
                }
                case '5':{
                    return 'Viernes';
                    break;
                }
                case '6':{
                    return 'Sabado';
                    break;
                }
                    
            }
        }

	/**
	 * @return array validation rules for model attributes.
	 */
        public function consultarCronsCliente($idCliente)
        {
            $crons=self::model()->findAll();
            $arr=array();
            foreach ($crons as $cron){
                $cadScript=explode(' ', $cron['script']);
                //la posicion 2 dice el COMMANDO a ejecutar nuevaTareaUsuario 
                
                    $comando=$cadScript[2];


                
                if($comando=='nuevaTareaUsuario')
                    if($this->esDelCliente($cadScript,$idCliente)){
                        $cron=$this->setUsuarios($cron,$cadScript);
                        $arr[]=   $cron;
                    }
                        
                    
            }
            return $arr;
        }
        private function setUsuarios($cronAux,$arr)
        {
            $encargado=Usuarios::model()->findByPk($this->getValorCampo($arr,'--idUsuario'));
            $supervisor=Usuarios::model()->findByPk($this->getValorCampo($arr,'--idUsuarioEmisor'));
            
            
            $cronAux['encargado']=$encargado->nombre;
            $cronAux['supervisor']=$supervisor->nombre;
            return $cronAux;
        }
        private function getValorCampo($arr,$campo)
        {
            $valor=false;
            foreach ($arr as $palabra){
                $variable=explode('=', $palabra);
                //echo $variable[0].'-'.$campo;
                if($variable[0]==$campo)
                        return $variable[1];
                         
                
            }
            return false;
        }

        private function esDelCliente($arr,$idCliente)
        {
            $idTarea=$this->getValorCampo($arr,'--idTarea');
           
            
            if($idTarea!=false){
                $tarea=Tareas::model()->findByPk($idTarea);
                if($tarea!=null)
                if($tarea->idClienteTarea==$idCliente)
                    return true;
            }
                         
           return false;
        }
        
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('minutos, dias, meses, diasSemana, script, parametros, nombre, descripcion', 'length', 'max'=>255),
			array('horas', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idCron, minutos, horas, dias, meses, diasSemana, script, parametros, nombre, descripcion', 'safe', 'on'=>'search'),
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
			'idCron' => 'Id Cron',
			'minutos' => 'Minutos',
			'horas' => 'Horas',
			'dias' => 'Dias',
			'meses' => 'Meses',
			'diasSemana' => 'Dias Semana',
			'script' => 'Script',
			'parametros' => 'Parametros',
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idCron',$this->idCron);
		$criteria->compare('minutos',$this->minutos,true);
		$criteria->compare('horas',$this->horas,true);
		$criteria->compare('dias',$this->dias,true);
		$criteria->compare('meses',$this->meses,true);
		$criteria->compare('diasSemana',$this->diasSemana,true);
		$criteria->compare('script',$this->script,true);
		$criteria->compare('parametros',$this->parametros,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}