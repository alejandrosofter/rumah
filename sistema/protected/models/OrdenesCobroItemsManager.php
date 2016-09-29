<?php
class OrdenesCobroItemsManager extends TabularInputManager
{
 
    protected $class='FacturasSalientesVencimiento';
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else 
            return array(
                'n1'=>new FacturasSalientesVencimiento,
            );
    } 
    public function agregar($item)
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
//        $criteria->addNotInCondition('idOrdenCobroVencimiento', $itemsPk);      
         $criteria->addNotInCondition('idOrdenCobroFacturas', $itemsPk);
        $criteria->addCondition("idOrdenCobro= {$model->idOrdenCobro}");
 
        OrdenesCobroFacturas::model()->deleteAll($criteria); 
    }
 
 public function agregarItems($items)
    {
        foreach ($items as $item)
            $this->agregar($item);
    }
    public static function load($model)
    {
        $return= new OrdenesCobroItemsManager;
        foreach ($model->items as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }
 
 
    public function setUnsafeAttribute($item, $model)
    {
        $item->idOrdenCobro=$model->idOrdenCobro;
 
    }
 
 
}

?>