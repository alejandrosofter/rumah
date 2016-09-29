<?php
class ItemsFacturaSalienteManager extends TabularInputManager
{
 
    protected $class='ItemsFacturaSaliente';
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else 
            return array(
                //'n0'=>new ItemsFacturaSaliente,
            );
    }
    public function agregarOrdenesRealizadas($idCliente)
    {
    	$this->quitarItemsDeOrdenes();
			$ordenes=OrdenesTrabajo::model()->consultarOrdenesRealizadas($idCliente);
			$items=array();
			foreach($ordenes as $orden){
                           $items=array_merge($items, OrdenesTrabajoStock::model()->search($orden['idOrdenTrabajo'],true));
				
			}
		$cantidad=count($items);
	foreach($items as $item){
			$elem=ItemsFacturaSaliente::model()->getElementoKey($item['idStock'],$item['cantidad'],$item['importe'],$item['idOrdenTrabajo']);
			
			if(isset($elem))
				$this->agregar($elem,true);
		}
		unset(Yii::app()->request->cookies['ordenesRealizadas']);
//                Yii::app()->user->setFlash('success',"Productos/Servicios de Ordenes($cantidad) Agregadas!");
    }
    private function quitarItemsDeOrdenes()
    {
        $this->setItems(array());
    }
    public function agregarOrdenes()
    {
    	
			$ordenes=explode(',',$_GET['idOrdenTrabajo']);
			$items=array();
			foreach($ordenes as $orden){
                           $items= OrdenesTrabajoStock::model()->search($orden,true);
				
			}
		$cantidad=count($items);
	foreach($items as $item){
			$elem=ItemsFacturaSaliente::model()->getElementoKey($item['idStock'],$item['cantidad'],$item['importe']);
			
			if(isset($elem))
				$this->agregar($elem,true);
		}
		unset(Yii::app()->request->cookies['ordenes']);
//                Yii::app()->user->setFlash('success',"Productos/Servicios de Ordenes($cantidad) Agregadas!");
    }
    public function agregarCarro()
    {
    	$datos = isset(Yii::app()->request->cookies['productosCarro'])?Yii::app()->request->cookies['productosCarro']->value:'';
		$datosArray=explode(',',$datos);
		foreach($datosArray as $item){
			$elem=ItemsFacturaSaliente::model()->getElementoKey($item,1);
			
			if(isset($elem))
				$this->agregar($elem,true);
		}
		Yii::app()->request->cookies['productosCarro'] = new CHttpCookie('productosCarro', '');
    }
    public function agregarPresupuesto($id)
    {
    	$datos = PresupuestoItems::model()->consultarItems($id);
		foreach($datos as $item){
			$elem=ItemsFacturaSaliente::model()->getElementoKeyPresupuesto($item);
			
			if(isset($elem))
				$this->agregar($elem,true);
		}
    }
    public function agregar($item,$mostrarMensaje=true)
    {
    	
    	$num=$this->getLastNew()+1;
    	$indice='n'.$num;
//    	$this->setLastNew($this->getLastNew()+1);
    	$items=$this->getItems();
    	$items[$indice]=$item;
    	$this->setItems($items);
    	$this->_lastNew=$num;
//        if($mostrarMensaje)
//    	Yii::app()->user->setFlash('success',"Producto Agregado!");
    }
    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('idItemsFacturaSaliente', $itemsPk);
        $criteria->addCondition("idFacturaSaliente= {$model->idFacturaSaliente}");
 
        //ventas
        ItemsFacturaSaliente::model()->deleteAll($criteria); 
//        ComprasItems::model()->deleteAll($criteria); 
    }
 
 
    public static function load($model)
    {
        $return= new ItemsFacturaSalienteManager;
        foreach ($model->items as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }
 
 
    public function setUnsafeAttribute($item, $model)
    {
        $item->idFacturaSaliente=$model->idFacturaSaliente;
 
    }
 
 
}

?>