<?php

/**
 * This is the model class for table "stock".
 *
 * The followings are the available columns in table 'stock':
 * @property integer $idStock
 * @property string $nombre
 * @property string $detalle
 * @property string $estado
 * @property string $codigoBarra
 * @property double $porcentajeIva
 * @property integer $min
 * @property integer $max
 * @property string $tipoProducto
 * @property integer $idTipoProducto
 * @property integer $idCuenta
 */
class Stock extends CActiveRecord
{
	
	public $cantidadProductosReal;
	public $precioLista;
	public $precioMinimo;
	public $importeSinIva;
	public $tipoProducto;
	public $fechaCompra;
	public $fechaInventario;
	public $esPredeterminado;
	public $cantidadVendida;
	public $cantidadInventario;
	public $cantidadCompras;
	public $nombre;
	public $nombreTipoProducto;
	public $nombreMarca;
	public $idStockMarca;
	public $cantidadDisponible;
	public $idCuentaVenta;
	public $precioContado;
	public $codigoProducto;
	public $unidadMedida;
        public $precioCompra;
        public $pais=79;
        public $empresa=198455;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @return Stock the static model class
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
		return 'stock';
	}
        public function consultarStockMinimos($limite=10)
        {
             $connection=Yii::app()->getDb();
        $command=$connection->createCommand("SELECT  t.*, 
             SUBSTRING_INDEX( GROUP_CONCAT(CAST(stock_disponible.cantidadDisponible AS CHAR) ORDER BY stock_disponible.idStockDisponible desc), ',', 1 ) as cantidadDisponible 

 from stock t
LEFT JOIN stock_disponible on stock_disponible.idStock = t.idStock
 where  t.min<>0
group by t.idStock
having cantidadDisponible<=min");
            
            $res= $command->queryAll();
            $salida="<table class='sinFormato'>";
		$salida.="<tr>" .
		
					"	<td>Producto</td>".
                                        "	<td>%IVA</td>".
					"	<td>Cantidad Existente</td>".
                                        
                        		"	<td>Minimo exigible</td>".

				
					"</tr>";
            foreach ($res as $key => $value) {
                $salida.="<tr>" .
		
					"	<td>".$value['nombre']."</td>".
                                        "	<td>".$value['porcentajeIva']."</td>".
					"	<td>".$value['cantidadDisponible']."</td>".
                                        "	<td>".$value['min']."</td>".
					"</tr>";
            }
            $salida.='</table>';
            return $salida;
        }
        public function getImporteMercaderia()
        {
            $connection=Yii::app()->getDb();
        $command=$connection->createCommand("SELECT 
                (SELECT ROUND(importePesosStock,2) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock 
ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioLista,t.nombre as nombreStock,
SUBSTRING_INDEX( GROUP_CONCAT(CAST(stock_disponible.cantidadDisponible AS CHAR) ORDER BY stock_disponible.idStockDisponible desc), ',', 1 ) as cantidadDisponible 
                FROM `stock` t
                LEFT JOIN stock_disponible on stock_disponible.idStock = t.idStock
              group by t.idStock");
            
            $res= $command->queryAll();
            $tot=0;
            $totCantidad=0;
            $prod='';
            foreach ($res as $key => $value) {
                $tot+=(float)($value['precioLista']*(int)$value['cantidadDisponible']);
                $totCantidad+=$value['cantidadDisponible'];
                $prod.=$value['nombreStock'].' $ '.$value['precioLista'].' Cantidad: '.$value['cantidadDisponible'].'<br>';
                $prod.='sub: '.$tot.'<br>';
            }
                
//            return $prod.' --->'.$tot;
            return '$ '. round($tot,2).' con ('.$totCantidad.' productos disponibles)';
        }
        const RUTA_IMAGEN_CB='images/codigosBarras/';
        private function generaCB($idStock)
        {
            require_once 'Image/Barcode.php';
            $ruta=  self::RUTA_IMAGEN_CB.$idStock.'.jpg';
            $st=Stock::model()->findByPk($idStock);
            $im = Image_Barcode::draw($st->codigoBarra, 'ean13', 'jpg',false);
	    imagejpeg($im,$ruta,100); 
           
            return $ruta;
        }
        public function getTextoEtiquetasFrontal($id,$arr,$cantidad=3)
        {
            $st=self::model()->findByPk($id);
            $params['codigoBarra']=$st->codigoBarra;
            $params['nombre']=substr($st->nombre, 0, Settings::model()->getValorSistema('ETIQUETAS_CANTIDAD_FRONTAL_CARACTERES_NOM'));
            $params['detalle']=$st->detalle;
            $params['tipoProducto']=$st->tipoProducto;
            $params['porcentajeIva']=$st->porcentajeIva;
            $params['unidadMedida']=$st->unidadMedida;
            $params['importe']= '$ '.$this->getPrecioVenta($id);
            
            
            $sal=Settings::model()->getValorSistema('IMPRESION_ETIQUETASFRONTAL_STOCK', $params, 'impresiones');
            print_r($arr);
            for ($index = 0; $index < $cantidad; $index++) 
                $arr[]=$sal;
            
            
            return $arr;
            
        }
        public function getTextoEtiquetas($id,$arr,$cantidad=3,$imprime=true)
        {
            if(!$imprime) return $arr;
            $puerto=$_SERVER['SERVER_PORT']==80?'':':'.$_SERVER['SERVER_PORT'];
            $host='http://'.$_SERVER['SERVER_NAME'].$puerto;
                    ;
            $dir= dirname(Yii::app()->createUrl("")).'/';
          
            $host= $host.$dir. $this->generaCB($id);
            $st=self::model()->findByPk($id);
            $params['codigoBarra']=$st->codigoBarra;
            $params['nombre']=substr($st->nombre, 0, Settings::model()->getValorSistema('ETIQUETAS_CANTIDAD_CARACTERES_NOM'));
            $params['tipoProducto']=$st->tipoProducto;
            $params['porcentajeIva']=$st->porcentajeIva;
            $params['unidadMedida']=$st->unidadMedida;
            $params['cb']=$host;
            
            $sal=Settings::model()->getValorSistema('IMPRESION_ETIQUETAS_STOCK', $params, 'impresiones');
            for ($index = 0; $index < $cantidad; $index++) 
                $arr[]=$sal;
            
            
            return $arr;
            
        }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('min,max,idStockMarca, nombre,estado,codigoBarra,codigoProducto, porcentajeIva', 'required'),
			array('min, max,idStockMarca, idTipoProducto, idCuenta', 'numerical', 'integerOnly'=>true),
                    array('nombre', 'unique', 'className'=> 'Stock'),
                    array('codigoProducto', 'unique', 'className'=> 'Stock'),
                    array('codigoBarra', 'unique', 'className'=> 'Stock'),
			array('porcentajeIva', 'numerical'),
			array('nombre,unidadMedida,codigoProducto', 'length', 'max'=>50),
			array('estado', 'length', 'max'=>20),
               
			array('codigoBarra', 'length', 'max'=>60),
			array('tipoProducto,detalle', 'length', 'max'=>255),
			
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idStock, t.nombre,tipoProducto, detalle, estado, codigoBarra, porcentajeIva, min, max, tipoProducto, idTipoProducto, idCuenta, idStockMarca', 'safe', 'on'=>'search'),
		);
	}
	public function behaviors() {
		 return array( 'LoggableBehavior'=> 'application.modules.auditTrail.behaviors.LoggableBehavior', );
	 }

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		'tipoStock'=>array(self::HAS_MANY,'StockTipoProducto','idStockTipo'),
//		'stock_marcas'=>array(self::HAS_MANY,'Stock_tipoProducto','idStockTipo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idStock' => 'Id Stock',
			'nombre' => 'Nombre',
			'detalle' => 'Detalle',
			'estado' => 'Estado',
			'codigoBarra' => 'Codigo Barra',
			'porcentajeIva' => 'Porcentaje Iva',
			'min' => 'Min',
			'max' => 'Max',
			'tipoProducto' => 'Tipo Producto',
			'idTipoProducto' => 'Tipo de Producto',
			'idCuenta' => 'Cuenta',
			'cantidadProductosReal' => 'Disponibles',
			'cantidadVendida' => 'Vendidos',
			'cantidadInventario' => 'Inventario',
			'cantidadCompras' => 'Comprados',
			'precioLista' => '$ Lista',
			'precioContado' => '$ Contado',
			'precioMinimo' => '$ Min',
			
			'importeSinIva' => '$ s/IVA',
			'idCuentaVenta' => 'Cuenta Contable',
			'idStockMarca' => 'Marca',
			
		);
		
	}
        public function getFormasPrecio()
	{
    	return array('1' => 'Por Precio de Compra', '2' => 'Por % de la categoria', '3' => 'Por ultimo precio de sistema');
	}
	public function getEstados()
	{
    	return array('Alta' => 'Alta', 'Baja' => 'Baja', 'Discontinuado' => 'Discontinuado');
	}
	public static function getMenuCarroCompras()
	{
		$datos = isset(Yii::app()->request->cookies['productosCarro'])?Yii::app()->request->cookies['productosCarro']->value:'';
		$datosArray=explode(',',$datos);
		$cant=count($datosArray)-1;
		
		$datosOrden = isset(Yii::app()->request->cookies['ordenesCarro'])?Yii::app()->request->cookies['ordenesCarro']->value:'';
		$datosOrdenArray=explode(',',$datosOrden);
		$cantOrden=count($datosOrdenArray)-1;
		$salida='';
		if($cant>0)$salida=CHtml::image('images/iconos/famfam/cart.png','Quitar').$cant;
		if($cantOrden>0)$salida.=' '.CHtml::image('images/iconos/famfam/wrench.png','Quitar').$cantOrden;
		
		if($salida!='')
			return  CHtml::link($salida, 'index.php?r=stock/consultarCarro', array('submit'=>'index.php?r=stock/consultarCarro', 'class'=>'btn small error',
'params'=>array('')));
			
	}
	public function getUnidades()
	{
    	return array('Unidad' => 'Unidad', 'Metro' => 'Metro', 'Litro' => 'Litro', 'Kilo' => 'Kilo');
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function stockReal($todos=true,$codigoBarra='')
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;
		if(isset($_POST['buscador']))
		{
			$criteria->compare('codigoBarra',$_POST['buscador'],true,'OR');
			$criteria->compare('t.nombre',$_POST['buscador'],true,'OR');
			$criteria->compare('stock_tipoProducto.nombre',$_POST['buscador'],true,'OR');
			$criteria->compare('stock_marcas.nombreMarca',$_POST['buscador'],true,'OR');
			
		}else{
			$criteria->compare('detalle',$this->detalle,true);
			$criteria->compare('estado',$this->estado,true);
			$criteria->compare('codigoBarra',$this->codigoBarra,true);
			$criteria->compare('porcentajeIva',$this->porcentajeIva);
			$criteria->compare('min',$this->min);
			$criteria->compare('max',$this->max);
			$criteria->compare('tipoProducto','STOCK',true);
			$criteria->compare('idTipoProducto',$this->idTipoProducto);
			$criteria->compare('idCuenta',$this->idCuenta);
			$criteria->compare('codigoBarra',$codigoBarra);
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		$criteria->compare('t.nombre',$_GET['nombre'],true); // That didn't work
		if(isset($_GET['nombreTipoProducto']) && trim($_GET['nombreTipoProducto'])!="")
		$criteria->compare('stock_tipoProducto.nombre',$_GET['nombreTipoProducto'],true);
		if(isset($_GET['nombreMarca']) && trim($_GET['nombreMarca'])!="")		
		$criteria->compare('stock_marcas.nombreMarca',$_GET['nombreMarca'],true);
		}
$cantidadDigitos=Settings::model()->getValorSistema('DECIMALES_FACTURAS');
	$criteria->select = "t.*, SUBSTRING_INDEX( GROUP_CONCAT(CAST(stock_disponible.cantidadDisponible AS CHAR) ORDER BY stock_disponible.idStockDisponible desc), ',', 1 ) as cantidadDisponible ," .
"(SELECT importePesosStock FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as importeSinIva," 

."(SELECT importePesosStock*((t.porcentajeIva/100)+1) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioLista," 
."(SELECT importePesosStockMin*((t.porcentajeIva/100)+1) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioMinimo, "
."(SELECT importeCompra FROM compras_items WHERE compras_items.idStock = t.idStock ORDER BY compras_items.idCompraItem desc LIMIT 1) as precioCompra, "
."  stock_tipoProducto.nombre as nombreTipoProducto, stock_marcas.nombreMarca as nombreMarca "
				;
				$criteria->join = " LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = t.idTipoProducto 
				LEFT JOIN stock_marcas on stock_marcas.idStockMarcas = t.idStockMarca 
				LEFT JOIN stock_disponible on stock_disponible.idStock = t.idStock ";
		$criteria->group='t.idStock';
		$criteria->order='cantidadDisponible desc, nombre';
		

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort,
		));
	}
        public function getPrecioVenta($id,$neto=false)
        {
            if($neto)
            $sql="(SELECT ROUND(importePesosStock,2) as importe FROM stock_precios_items INNER JOIN stock on stock.idStock = stock_precios_items.idStock WHERE stock_precios_items.idStock = $id ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) ";
        else $sql="(SELECT ROUND(importePesosStock*((stock.porcentajeIva/100)+1),2) as importe FROM stock_precios_items INNER JOIN stock on stock.idStock = stock_precios_items.idStock WHERE stock_precios_items.idStock = $id ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) ";
           
            $connection=Yii::app()->getDb();
            $command=$connection->createCommand($sql);
            
            $res= $command->queryAll();
            if(count($res)>0)
             return $res[0]['importe'];
            return 0;
        }
        private function aplicarPreciosMasIva($idInventario)
        {
            $res=InventariosProductos::model()->consultarProductos($idInventario, 0, true);
            foreach ($res as $key => $value) {
                $id=$value['idStockInventario'];
                $sql="(SELECT stock_precios_items.idStockPrecioStock FROM stock_precios_items WHERE stock_precios_items.idStock = $id ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1)";
                $connection=Yii::app()->getDb();
                $command=$connection->createCommand($sql);
                $res= $command->queryAll();
                if(count($res)>0){
                    $idStockPrecio=$res[0]['idStockPrecioStock'];
                
                $sql="(SELECT ROUND(importePesosStock/((stock.porcentajeIva/100)+1),2) as importe FROM stock_precios_items INNER JOIN stock on stock.idStock = stock_precios_items.idStock WHERE stock_precios_items.idStock = $id ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) ";
                $command=$connection->createCommand($sql);
                $res= $command->queryAll();
                $importe=$res[0]['importe'];
                
                
                $sql="UPDATE stock_precios_items set importePesosStock='$importe' WHERE idStockPrecioStock='$idStockPrecio'";
                $command=$connection->createCommand($sql);
                $res= $command->query();
                }
                
            }
        }
	public function aplicarInventarioStock($idInventario,$aplicarPreciosMasIva,$sumarStock)
	{
            set_time_limit(0);
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
         SELECT * FROM `inventarios_productos`
where idInventario= $idInventario");
            
            $items= $command->queryAll();
            if(!$sumarStock)
                $this->setStockCero();
            if($aplicarPreciosMasIva)
                $this->aplicarPreciosMasIva($idInventario);
            foreach($items as $item){
                $this->incrementarStock($item['idStockInventario'],$item['cantidadInventario']);
		}
	}
	public function aplicarPreciosServicios($cadenaFormula)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
         SELECT t.*,t.idStock ,t.porcentajeIva, stock_tipoProducto.porcentajeGananciaLista,stock_tipoProducto.porcentajeGananciaMin, stock_tipoProducto.porcentajeGananciaMin,
SUBSTRING_INDEX( GROUP_CONCAT(CAST( compras_items.importeCompra AS CHAR) ORDER BY compras_items.idCompraItem desc), ',', 1 ) as ultimoPrecio,
SUBSTRING_INDEX( GROUP_CONCAT(CAST( stock_precios_items.importePesosStock AS CHAR) ORDER BY stock_precios_items.idStockPrecioStock desc), ',', 1 ) as ultimoPrecioProducto 
FROM `stock` t
LEFT JOIN compras_items on compras_items.idStock = t.idStock
LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = t.idTipoProducto 
LEFT JOIN stock_precios_items on stock_precios_items.idStock = t.idStock 
where  t.tipoProducto <> 'STOCK' group by t.idStock" 
       		);
            
            $items= $command->queryAll();
          
            $porcentajeGeneral=strip_tags(Yii::app()->settings->getKey('PORCENTAJE_VENTA_PRODUCTO'))+0;
            
            $modeloStockPrecios=new StockPrecios;
            $modeloStockPrecios->fechaStock=Date('Y-m-d');
            $modeloStockPrecios->tipo='Servicios ';
            $modeloStockPrecios->idTipo=1;
            $modeloStockPrecios->enServicios=0;
            if(!$modeloStockPrecios->save())
            	echo 'No pudo salvar la lista de precio';
            foreach($items as $item){
				$modeloStockPreciosItems=new stockPreciosItems;
				$modeloStockPreciosItems->idStockPrecio= (int)$modeloStockPrecios->idStockPrecio;
				$modeloStockPreciosItems->idStock= (int)$item['idStock'];
				
				$porcentajeIva=(($item['porcentajeIva']/100)+1);
				$porcentajeGanancia=(($porcentajeGeneral/100)+1);
				$precioUltimo=isset($item['ultimoPrecio'])?$item['ultimoPrecio']:0;
				
				$porcentajeProductoMin=(($item['porcentajeGananciaMin']/100)+1);
				$precioUltimoSistema=isset($item['ultimoPrecioProducto'])?$item['ultimoPrecioProducto']:0;
				$porcentajeProductoLista=(($item['porcentajeGananciaLista']/100)+1);
				
				$cadena=$cadenaFormula;
				$cadena = str_replace("%UP",$precioUltimo,$cadena);
				$cadena = str_replace("%PIVA",$porcentajeIva,$cadena);
				$cadena = str_replace("%PG",$porcentajeGanancia,$cadena);
				$cadena = str_replace("%PPG",$porcentajeProductoMin,$cadena);
				$cadena = str_replace("%USP",$precioUltimoSistema,$cadena);
				
				
				$modeloStockPreciosItems->importePesosStockMin=$this->ejecutaString($cadena);
				
				$cadena=$cadenaFormula;
				$cadena = str_replace("%UP",$precioUltimo,$cadena);
				$cadena = str_replace("%PIVA",$porcentajeIva,$cadena);
				$cadena = str_replace("%PG",$porcentajeGanancia,$cadena);
				$cadena = str_replace("%PPG",$porcentajeProductoLista,$cadena);
				$cadena = str_replace("%USP",$precioUltimoSistema,$cadena);
				//echo $cadena;
				$modeloStockPreciosItems->importePesosStock= $this->ejecutaString($cadena);
				
				if(!$modeloStockPreciosItems->save())
						echo 'No pudo salvar el precio';
				
				
		}
	}
	public function aplicarPreciosCategoria($idStockTipo,$cadenaFormula)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
         SELECT t.*,t.idStock ,t.porcentajeIva, stock_tipoProducto.porcentajeGananciaLista,stock_tipoProducto.porcentajeGananciaMin, stock_tipoProducto.porcentajeGananciaMin,
SUBSTRING_INDEX( GROUP_CONCAT(CAST( compras_items.importeCompra AS CHAR) ORDER BY compras_items.idCompraItem desc), ',', 1 ) as ultimoPrecio,
SUBSTRING_INDEX( GROUP_CONCAT(CAST( stock_precios_items.importePesosStock AS CHAR) ORDER BY stock_precios_items.idStockPrecioStock desc), ',', 1 ) as ultimoPrecioProducto 
FROM `stock` t
LEFT JOIN compras_items on compras_items.idStock = t.idStock
LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = t.idTipoProducto 
LEFT JOIN stock_precios_items on stock_precios_items.idStock = t.idStock 
where  t.idTipoProducto= $idStockTipo group by t.idStock" 
       		);
            
            $items= $command->queryAll();
            
            $porcentajeGeneral=strip_tags(Yii::app()->settings->getKey('PORCENTAJE_VENTA_PRODUCTO'))+0;
            
            $modeloStockPrecios=new StockPrecios;
            $modeloStockPrecios->fechaStock=Date('Y-m-d');
            $modeloStockPrecios->tipo='Tipo de Producto ';
            $modeloStockPrecios->idTipo=1;
            $modeloStockPrecios->enServicios=0;
            if(!$modeloStockPrecios->save())
            	echo 'No pudo salvar la lista de precio';
            foreach($items as $item){
				$modeloStockPreciosItems=new stockPreciosItems;
				$modeloStockPreciosItems->idStockPrecio= (int)$modeloStockPrecios->idStockPrecio;
				$modeloStockPreciosItems->idStock= (int)$item['idStock'];
				
				$porcentajeIva=(($item['porcentajeIva']/100)+1);
				$porcentajeGanancia=(($porcentajeGeneral/100)+1);
				$precioUltimo=isset($item['ultimoPrecio'])?$item['ultimoPrecio']:0;
				
				$porcentajeProductoMin=(($item['porcentajeGananciaMin']/100)+1);
				$precioUltimoSistema=isset($item['ultimoPrecioProducto'])?$item['ultimoPrecioProducto']:0;
				$porcentajeProductoLista=(($item['porcentajeGananciaLista']/100)+1);
				
				$cadena=$cadenaFormula;
				$cadena = str_replace("%UP",$precioUltimo,$cadena);
				$cadena = str_replace("%PIVA",$porcentajeIva,$cadena);
				$cadena = str_replace("%PG",$porcentajeGanancia,$cadena);
				$cadena = str_replace("%PPG",$porcentajeProductoMin,$cadena);
				$cadena = str_replace("%USP",$precioUltimoSistema,$cadena);
				
				$modeloStockPreciosItems->importePesosStockMin=$this->ejecutaString($cadena);
				
				$cadena=$cadenaFormula;
				$cadena = str_replace("%UP",$precioUltimo,$cadena);
				$cadena = str_replace("%PIVA",$porcentajeIva,$cadena);
				$cadena = str_replace("%PG",$porcentajeGanancia,$cadena);
				$cadena = str_replace("%PPG",$porcentajeProductoLista,$cadena);
				$cadena = str_replace("%USP",$precioUltimoSistema,$cadena);
				//echo $cadena;
				$modeloStockPreciosItems->importePesosStock= $this->ejecutaString($cadena);
				
				if($precioUltimo!=0)
					if(!$modeloStockPreciosItems->save())
						echo 'No pudo salvar el precio';
				
				
		}
	}
         private function getPrecio($tipo,$redondea,$porcentaje,$precioCompra,$porcentajeCategoria,$precioVenta,$porcentajeIva)
        {
            $importe=0;
            $porcentaje=($porcentaje/100)+1;
            $porcentajeCategoria=($porcentajeCategoria/100)+1;
            switch ($tipo) {
                case 1:{//POR PRECIO DE COMPRA
                    $importe=$precioCompra*$porcentaje;
                }
                    break;
                case 2:{//POR PORCENTAJE DE CATEGORIA
                    $importe=$precioVenta*$porcentajeCategoria*$porcentaje;
                }
                    break;  
                case 3:{//POR ULTIMO PRECIO DE SISTEMA
                    $importe=$precioVenta*$porcentaje;
                }
                    break;
            }
            $importe=round($importe,2);
            $impIva=ceil($importe*$porcentajeIva);
            return $redondea?($impIva/$porcentajeIva):$importe;
        }
	public function aplicarPreciosCompra($idCompra,$tipo,$porcentaje,$redondea,$cadenaFormula=null)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
         SELECT t.*,t.idStock ,stock.porcentajeIva, stock_tipoProducto.porcentajeGananciaLista,stock_tipoProducto.porcentajeGananciaMin, stock_tipoProducto.porcentajeGananciaMin,
SUBSTRING_INDEX( GROUP_CONCAT(CAST( t.importeCompra AS CHAR) ORDER BY t.idCompraItem desc), ',', 1 ) as ultimoPrecio,
SUBSTRING_INDEX( GROUP_CONCAT(CAST( stock_precios_items.importePesosStock AS CHAR) ORDER BY stock_precios_items.idStockPrecioStock desc), ',', 1 ) as ultimoPrecioProducto 
                FROM `compras_items` t
LEFT JOIN facturasEntrantes on facturasEntrantes.idFacturaEntrante = t.idFacturaEntrante
LEFT JOIN stock on stock.idStock = t.idStock 
LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = stock.idTipoProducto 
LEFT JOIN stock_precios_items on stock_precios_items.idStock = stock.idStock 
where  facturasEntrantes.idFacturaEntrante= $idCompra group by t.idCompraItem" 
       		);
            
            $items= $command->queryAll();
            
            $porcentajeGeneral=strip_tags(Yii::app()->settings->getKey('PORCENTAJE_VENTA_PRODUCTO'))+0;
            
            $modeloStockPrecios=new StockPrecios;
            $modeloStockPrecios->fechaStock=Date('Y-m-d');
            $modeloStockPrecios->tipo='Compra';
            $modeloStockPrecios->idTipo=1;
            $modeloStockPrecios->enServicios=0;
            if(!$modeloStockPrecios->save())
            	echo 'No pudo salvar la lista de precio';
            foreach($items as $item){
				$modeloStockPreciosItems=new stockPreciosItems;
				$modeloStockPreciosItems->idStockPrecio= (int)$modeloStockPrecios->idStockPrecio;
				$modeloStockPreciosItems->idStock= (int)$item['idStock'];
				
				$porcentajeIva=(($item['porcentajeIva']/100)+1);
				$porcentajeGanancia=(($porcentajeGeneral/100)+1);
				$precioUltimo=isset($item['ultimoPrecio'])?$item['ultimoPrecio']:0;
				
				$porcentajeProductoMin=(($item['porcentajeGananciaMin']/100)+1);
				$precioUltimoSistema=isset($item['ultimoPrecioProducto'])?$item['ultimoPrecioProducto']:0;
				$porcentajeProductoLista=(($item['porcentajeGananciaLista']/100)+1);
				
//				$cadena=$cadenaFormula;
//				$cadena = str_replace("%UP",$precioUltimo,$cadena);
//				$cadena = str_replace("%PIVA",$porcentajeIva,$cadena);
//				$cadena = str_replace("%PG",$porcentajeGanancia,$cadena);
//				$cadena = str_replace("%PPG",$porcentajeProductoMin,$cadena);
//				$cadena = str_replace("%USP",$precioUltimoSistema,$cadena);
				
				$modeloStockPreciosItems->importePesosStockMin=$this->getPrecio($tipo,$redondea,$porcentaje,$precioUltimo,$porcentajeProductoMin,$precioUltimoSistema,$porcentajeIva);
				
//				$cadena=$cadenaFormula;
//				$cadena = str_replace("%UP",$precioUltimo,$cadena);
//				$cadena = str_replace("%PIVA",$porcentajeIva,$cadena);
//				$cadena = str_replace("%PG",$porcentajeGanancia,$cadena);
//				$cadena = str_replace("%PPG",$porcentajeProductoLista,$cadena);
//				$cadena = str_replace("%USP",$precioUltimoSistema,$cadena);
				//echo $cadena;
				$modeloStockPreciosItems->importePesosStock= $this->getPrecio($tipo,$redondea,$porcentaje,$precioUltimo,$porcentajeProductoLista,$precioUltimoSistema,$porcentajeIva);
				
				if($precioUltimo!=0)
					if(!$modeloStockPreciosItems->save())
						echo 'No pudo salvar el precio';
				
				
		}
                return $modeloStockPreciosItems->idStockPrecio;
	}
	public function aplicarPreciosInventario($idInventario,$cadenaFormula)
	{
		$connection=Yii::app()->getDb();
        $command=$connection->createCommand("
         SELECT t.*,stock.porcentajeIva, stock_tipoProducto.porcentajeGananciaLista,stock_tipoProducto.porcentajeGananciaMin, stock_tipoProducto.porcentajeGananciaMin,
 SUBSTRING_INDEX( GROUP_CONCAT(CAST( compras_items.importeCompra AS CHAR) ORDER BY compras_items.idCompraItem desc), ',', 1 ) as ultimoPrecio," .
 		"SUBSTRING_INDEX( GROUP_CONCAT(CAST( stock_precios_items.importePesosStock AS CHAR) ORDER BY stock_precios_items.idStockPrecioStock desc), ',', 1 ) as ultimoPrecioProducto" .
 		" FROM `inventarios_productos` t
 " .
		"LEFT JOIN stock on stock.idStock = t.idStockInventario
LEFT JOIN compras_items on compras_items.idStock = t.idStockInventario 
LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = stock.idTipoProducto " .
" LEFT JOIN stock_precios_items on stock_precios_items.idStock = stock.idStock 
where  t.idInventario= $idInventario GROUP BY t.idStockInventario" 
       		);
            
            $items= $command->queryAll();
            
            $porcentajeGeneral=strip_tags(Yii::app()->settings->getKey('PORCENTAJE_VENTA_PRODUCTO'))+0;
            
            $modeloStockPrecios=new StockPrecios;
            $modeloStockPrecios->fechaStock=Date('Y-m-d');
            $modeloStockPrecios->tipo='Inventario';
            $modeloStockPrecios->idTipo=1;
            $modeloStockPrecios->enServicios=0;
            if(!$modeloStockPrecios->save())
            	echo 'No pudo salvar la lista de precio';
            foreach($items as $item){
				$modeloStockPreciosItems=new stockPreciosItems;
				$modeloStockPreciosItems->idStockPrecio= (int)$modeloStockPrecios->idStockPrecio;
				$modeloStockPreciosItems->idStock= (int)$item['idStockInventario'];
				
				$porcentajeIva=(($item['porcentajeIva']/100)+1);
				$porcentajeGanancia=(($porcentajeGeneral/100)+1);
				
				$precioUltimo=isset($item['ultimoPrecio'])?$item['ultimoPrecio']:0;
				$precioUltimoSistema=isset($item['ultimoPrecioProducto'])?$item['ultimoPrecioProducto']:0;
				
				$precioUltimo =  $precioUltimo==0? $precioUltimoSistema:$precioUltimo;
				//en caso de que el precio de compra sea 0, le ponemos el ultimo precio que hay en sistema
				
				$porcentajeProductoMin=(($item['porcentajeGananciaMin']/100)+1);
				$porcentajeProductoLista=(($item['porcentajeGananciaLista']/100)+1);
				
				$cadena=$cadenaFormula;
				$cadena = str_replace("%UP",$precioUltimo,$cadena);
				$cadena = str_replace("%PIVA",$porcentajeIva,$cadena);
				$cadena = str_replace("%PG",$porcentajeGanancia,$cadena);
				$cadena = str_replace("%PPG",$porcentajeProductoMin,$cadena);
				
				$modeloStockPreciosItems->importePesosStockMin=$this->ejecutaString($cadena);
				
				$cadena=$cadenaFormula;
				$cadena = str_replace("%UP",$precioUltimo,$cadena);
				$cadena = str_replace("%PIVA",$porcentajeIva,$cadena);
				$cadena = str_replace("%PG",$porcentajeGanancia,$cadena);
				$cadena = str_replace("%PPG",$porcentajeProductoLista,$cadena);
				//echo 'cade: '.$cadena;
				$modeloStockPreciosItems->importePesosStock= $this->ejecutaString($cadena);
				
				if($precioUltimo!=0)
					if(!$modeloStockPreciosItems->save())
						echo 'No pudo salvar el precio';
				
				
		}
	}
	private function ejecutaString($mathString)
	{
		$mathString = trim($mathString);     // trim white spaces
    	$mathString = preg_replace ('[^0-9\+-\*\/\(\) ]', '', $mathString);    // remove any non-numbers chars; exception for math operators
 
    	$compute = create_function("", "return (" . $mathString . ");" );

    	return 0 + $compute();
	}
	public function setStockCero()
	{
	Yii::app()->db->createCommand()->truncateTable('stock_disponible');
            
	}
	public function consultarPorTipo($idTipo)
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'nombre asc';

		$criteria->compare('tipoProducto','STOCK',true);
		$criteria->compare('idTipoProducto',$idTipo);
		$criteria->select = "t.*, (SELECT importePesosStock FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioLista,(SELECT importePesosStockMin FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioMinimo ";
		
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
	public function decrementarStock($idStock,$cantidad)
  	{
  	$criteria=new CDbCriteria;
	$criteria->select = ' * ';  // only select the 'title' column
	$criteria->condition = ' idStock=:idStock ';
	$criteria->params=array(':idStock'=>$idStock);
	$criteria->order='t.idStockDisponible desc';

	$disponibles=StockDisponible::model()->find($criteria);



if (isset($disponibles->cantidadDisponible))
{
	$disponibles->cantidadDisponible = $disponibles->cantidadDisponible - $cantidad;
	$disponibles->update();
}
else {   
      $modeloDisponible = new StockDisponible;
      $modeloDisponible->idStock =  $idStock;
      $modeloDisponible->cantidadDisponible =  $cantidad;
      $modeloDisponible->save();
}
  	
  }
	public function incrementarStock($idStock,$cantidad)
  	{
  	$criteria=new CDbCriteria;
	$criteria->select = ' * ';  // only select the 'title' column
	$criteria->condition = ' idStock=:idStock ';
	$criteria->params=array(':idStock'=>$idStock);
	$criteria->order='t.idStockDisponible desc';

	$disponibles=StockDisponible::model()->find($criteria);
//
//echo 'idStock: '.$idStock;
//echo 'cantidad: '.$cantidad;

if (isset($disponibles->cantidadDisponible))
{
	$disponibles->cantidadDisponible = $disponibles->cantidadDisponible + $cantidad;
	$disponibles->update();
}
else {   
      $modeloDisponible = new StockDisponible;
      $modeloDisponible->idStock =  $idStock;
      $modeloDisponible->cantidadDisponible =  $cantidad;
      $modeloDisponible->save();
}
  	return;
  }
	public function consultarEtiquetas($nombre)
	{
		$criteria=new CDbCriteria;
		$sort = new CSort;

		$criteria->compare('detalle',$nombre,true,'OR');
		$criteria->compare('codigoBarra',$nombre,true,'OR');
		$criteria->compare('t.nombre',$nombre,true,'OR');
		$criteria->compare('stock_tipoProducto.nombre',$nombre,true,'OR');
		$criteria->compare('stock_marcas.nombreMarca',$nombre,true,'OR');
		
	$criteria->select = "t.*, SUBSTRING_INDEX( GROUP_CONCAT(CAST(stock_disponible.cantidadDisponible AS CHAR) 
	ORDER BY stock_disponible.idStockDisponible desc), ',', 1 ) as cantidadDisponible ," .
"(SELECT ROUND(importePesosStock - (importePesosStock*((t.porcentajeIva/100))),2) FROM stock_precios_items 
WHERE stock_precios_items.idStock = t.idStock ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as importeSinIva," 

."(SELECT ROUND(importePesosStock,2) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock 
ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioLista," 
."(SELECT ROUND(importePesosStockMin,2) FROM stock_precios_items WHERE stock_precios_items.idStock = t.idStock 
ORDER BY stock_precios_items.idStockPrecioStock desc LIMIT 1) as precioMinimo, " 
."  stock_tipoProducto.nombre as nombreTipoProducto, stock_marcas.nombreMarca as nombreMarca "
				;
				$criteria->join = " LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = t.idTipoProducto ".
				" LEFT JOIN stock_marcas on stock_marcas.idStockMarcas = t.idStockMarca 
				LEFT JOIN stock_disponible on stock_disponible.idStock = t.idStock ";
		$criteria->group='t.idStock';
		$criteria->order='cantidadDisponible desc, nombre';

		return self::model()->findAll($criteria);
	}
        public function existe()
	{
		$criteria=new CDbCriteria;

		if($this->codigoProducto!=null)$criteria->compare('codigoProducto',$this->codigoProducto,false,'OR');
		if($this->codigoBarra!=null)$criteria->compare('codigoBarra',$this->codigoBarra,false,'OR');
                if(is_null($this->codigoProducto) || is_null($this->codigoBarra)) return false;
                
		return $this->getErrorProductoExistente(self::model()->findAll($criteria));
	}
        private function getErrorProductoExistente($datos)
        {
            $salida="Existen ".count($datos).' productos con caracteristicas similares:';
            $puerto=$_SERVER['SERVER_PORT']=='80'?'':':'.$_SERVER['SERVER_PORT'];
            $host='http://'.$_SERVER['SERVER_NAME'].$puerto;
            if(count($datos)==0) return false;
            foreach ($datos as $value) {
                $url=$host.Yii::app()->createUrl("/stock/update&id=".$value['idStock']);
                
                $producto=CHtml::link($value['nombre'],$url);
                $salida.=$producto.', ';
            }
            return $salida;
        }

    public function consultarStockComun($nombre)
    {
        $criteria=new CDbCriteria;
        $criteria->compare('detalle', $nombre, true, 'OR');
        $criteria->compare('codigoBarra', $nombre, true, 'OR');
        $criteria->compare('t.nombre', $nombre, true, 'OR');
//        $criteria->compare('stock_tipoProducto.nombre', $nombre, true, 'OR');
//        $criteria->compare('stock_marcas.nombreMarca', $nombre, true, 'OR');
        //$criteria->group = 't.idStock';
        $criteria->order = 'nombre';

        return self::model()->findAll($criteria);
    }

    public function search()
    {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
		$sort = new CSort;
        $sort->defaultOrder = 'nombre asc';
		if(isset($_POST['buscador']))
		{
			$criteria->compare('codigoBarra',$_POST['buscador'],true,'OR');
			$criteria->compare('t.nombre',$_POST['buscador'],true,'OR');
			$criteria->compare('stock_tipoProducto.nombre',$_POST['buscador'],true,'OR');
			$criteria->compare('stock_marcas.nombreMarca',$_POST['buscador'],true,'OR');
			
		}else{
		$criteria->compare('idStock',$this->idStock);
		$criteria->compare('t.nombre',$this->nombre);
		$criteria->compare('detalle',$this->detalle,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('codigoBarra',$this->codigoBarra,true);
		$criteria->compare('porcentajeIva',$this->porcentajeIva);
		$criteria->compare('min',$this->min);
		$criteria->compare('max',$this->max);
//		$criteria->compare('tipoProducto','STOCK',true);
//		$criteria->compare('tipoProducto',$this->tipoProducto);
		$criteria->compare('idCuenta',$this->idCuenta);
		
		if(isset($_GET['nombre']) && trim($_GET['nombre'])!="")
		$criteria->compare('t.nombre',$_GET['nombre'],true); // That didn't work
		
		if(isset($_GET['tipoProducto']) && trim($_GET['tipoProducto'])!="")
		$criteria->compare('stock_tipoProducto.nombre',$_GET['tipoProducto'],true); // That didn't work
		}
		$criteria->select = "t.*,stock_tipoProducto.nombre as tipoProducto ".
		" , stock_tipoProducto.nombre as nombreTipoProducto, stock_marcas.nombreMarca as nombreMarca ";
		$criteria->join = "LEFT JOIN stock_tipoProducto on stock_tipoProducto.idStockTipo = t.idTipoProducto ".
				" LEFT JOIN stock_marcas on stock_marcas.idStockMarcas = t.idStockMarca ";
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,'sort'=>$sort
		));
	}
}