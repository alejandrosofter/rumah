<?php
class CompraItemsManager extends TabularInputManager
{
 
    protected $class='ComprasItems';
 
    public function getItems()
    {
        if (is_array($this->_items))
            return ($this->_items);
        else 
            return array(
               // 'n0'=>new ComprasItems,
            );
    }
 
 
    public function deleteOldItems($model, $itemsPk)
    {
        $criteria=new CDbCriteria;
        $criteria->addNotInCondition('idCompraItem', $itemsPk);
        $criteria->addCondition("idFacturaEntrante= {$model->idFacturaEntrante}");
 
        ComprasItems::model()->deleteAll($criteria); 
    }
    public function agregar2($item,$pos)
    {
    	$num=$pos;
    	$indice='n'.$num;
//    	$this->setLastNew($this->getLastNew()+1);
    	$items=$this->getItems();
    	$items[$indice]=$item;
    	$this->setItems($items);
    	//Yii::app()->user->setFlash('success',"Producto Agregado!");
    }
    public function agregar($item)
    {
    	$num=$this->getLastNew()+1;
    	$indice='n'.$num;
//    	$this->setLastNew($this->getLastNew()+1);
    	$items=$this->getItems();
    	$items[$indice]=$item;
    	$this->setItems($items);
    	//Yii::app()->user->setFlash('success',"Producto Agregado!");
    }
    public function agregarItems($idFactura)
    {
    	$items=ComprasItems::model()->consultarProductos($idFactura,true);
        $i=0;
            foreach ($items as $value){
                $this->agregar2($value,$i);
                $i++;
            }
                
            
    }
 
 
    public static function load($model)
    {
        $return= new CompraItemsManager;
        foreach ($model->items as $item)
            $return->_items[$item->primaryKey]=$item;
        return $return;
    }
 
 
    public function setUnsafeAttribute($item, $model)
    {
        $item->idFacturaEntrante=$model->idFacturaEntrante;
 
    }
 
 
}

?>