<?php
/**
 * CmsSettings
 * 
 * @package OneTwist CMS  
 * @author twisted1919 (cristian.serban@onetwist.com)
 * @copyright OneTwist CMS (www.onetwist.com)
 * @version 1.1
 * @since 1.0
 * @access public
 */
class CmsSettings extends CApplicationComponent
{

    protected $_saveItemsToDatabase=array();
    protected $_deleteItemsFromDatabase=array();
    protected $_deleteCategoriesFromDatabase=array();
    protected $_cacheNeedsFlush=array();
    
    protected $_items=array();
    protected $_loaded=array();
    
    public $cacheId='global_website_settings';
    public $cacheTime=0;

    public function init()
    {
        parent::init();
        Yii::app()->attachEventHandler('onEndRequest', array($this, 'whenRequestEnds'));
    }


    public function set($category='system', $key, $value='', $toDatabase=true)
    {
        if(is_array($key))
        {
            foreach($key AS $k=>$v)
                $this->set($category, $k, $v, $toDatabase);
        }
        else
        {
            if($toDatabase)
                $this->_saveItemsToDatabase[$category][$key]=$value;
            $this->_items[$category][$key]=$value; 
        }
        
    }

    public function get($category='system', $key='', $default='')
    {
        if(!isset($this->_items[$category]))
        {
            $this->load($category);    
        }
        elseif(!isset($this->_loaded[$category]))
        {
            $this->load($category);
            $this->_items[$category]=array_merge($this->_loaded[$category],$this->_items[$category]);
        }
  
        if(empty($key)&&empty($default)&&!empty($category))
            return isset($this->_items[$category])?$this->_items[$category]:null;

        if(isset($this->_items[$category][$key]))
            return $this->_items[$category][$key];
        return !empty($default)?$default:null;
    }

    public function delete($category='system', $key='')
    {
        if(!empty($category)&&empty($key))
        {
            $this->_deleteCategoriesFromDatabase[]=$category;
            if(isset($this->_items[$category]))
                unset($this->_items[$category]);
            if(isset($this->_loaded[$category]))
                unset($this->_loaded[$category]);
            return;
        }
        if(is_array($key))
        {
            foreach($key AS $k)
                $this->delete($category, $k);
        }
        else
        {
            if(isset($this->_items[$category][$key]))
            {
                unset($this->_items[$category][$key]);
                $this->_deleteItemsFromDatabase[$category][]=$key;
                
                if(isset($this->_loaded[$category][$key]))
                    unset($this->_loaded[$category][$key]);
            }    
        }
    }
    public function getKey($key)
    {
    	$connection=Yii::app()->getDb();
            $command=$connection->createCommand('SELECT * FROM settings WHERE settings.key=:cat');
            $command->bindParam(':cat',$key);
            $result=$command->queryAll();
             return $result[0]['value'];
    }
    public function updateKey($valor,$key)
    {
    	$connection=Yii::app()->getDb();
            $command=$connection->createCommand("UPDATE `settings` SET  `value` =  '$valor' WHERE  `settings`.`key` ='$key'");
            
            $result=$command->query();
    }

    public function load($category)
    {        
        $items=Yii::app()->cache->get($category.'_'.$this->getCacheId());
        if(!$items)
        {
            $connection=Yii::app()->getDb();
            $command=$connection->createCommand('SELECT * FROM settings WHERE category=:cat');
            $command->bindParam(':cat',$category);
            $result=$command->queryAll();
            
            if(empty($result))
            {
                $this->set($category, '{empty}', '{empty}', false);
                return;
            }
            
            $items=array();
            foreach($result AS $row)
                $items[$row['key']] = @unserialize($row['value']);
            Yii::app()->cache->add($category.'_'.$this->getCacheId(), $items, $this->getCacheTime()); 
        }
        $this->_loaded[$category]=$items; 
        $this->set($category, $items, '', false); 
        return $items;
    }
    
    public function toArray()
    {
        return $this->_items;
    }

    public function setCacheTime($int)
    {
        $this->cacheTime=(int)$int>0?$int:0;
    }

    public function getCacheTime()
    {
        return $this->cacheTime;
    }

    public function setCacheId($str='')
    {
        $this->cacheId=!empty($str)?$str:$this->_cacheId;
    }

    public function getCacheId()
    {
        return $this->cacheId;
    }

    private function addDbItem($category='system', $key, $value)
    {
        $connection=Yii::app()->db;
        $command=$connection->createCommand('SELECT * FROM {{settings}} WHERE `category`=:cat AND `key`=:key LIMIT 1');
        $command->bindParam(':cat',$category,PDO::PARAM_STR);
        $command->bindParam(':key',$key,PDO::PARAM_STR);
        $result=$command->queryRow();
        $_value=@serialize($value);
        
        if(!empty($result))
        {
            $command=$connection->createCommand('UPDATE {{settings}} SET `value`=:value WHERE `category`=:cat AND `key`=:key');
            $command->bindParam(':value',$_value,PDO::PARAM_STR);
            $command->bindParam(':key',$key,PDO::PARAM_STR);
            $command->bindParam(':cat',$category,PDO::PARAM_STR);
            $command->execute();
        }
        else
        {
            $command=$connection->createCommand('INSERT INTO {{settings}} (`category`,`key`,`value`) VALUES(:cat,:key,:value)');
            $command->bindParam(':cat',$category,PDO::PARAM_STR);
            $command->bindParam(':key',$key,PDO::PARAM_STR);
            $command->bindParam(':value',$_value,PDO::PARAM_STR);
            $command->execute();
        }
    }

    protected function whenRequestEnds()
    {
        $this->_cacheNeedsFlush=array();
        
        if(count($this->_deleteCategoriesFromDatabase)>0)
        {
            foreach($this->_deleteCategoriesFromDatabase AS $catName)
            {
                $connection=Yii::app()->db;
                $command=$connection->createCommand('DELETE FROM {{settings}} WHERE `category`=:cat');
                $command->bindParam(':cat', $catName);
                $command->execute();
                $this->_cacheNeedsFlush[]=$catName;
                
                if(isset($this->_deleteItemsFromDatabase[$catName]))
                    unset($this->_deleteItemsFromDatabase[$catName]);
                if(isset($this->_saveItemsToDatabase[$catName]))
                    unset($this->_saveItemsToDatabase[$catName]);
            }
        }
        
        if(count($this->_deleteItemsFromDatabase)>0)
        {
            foreach($this->_deleteItemsFromDatabase AS $catName=>$keys)
            {
                $params=array();
                $i=0;
                foreach($keys AS $v)
                {
                    if(isset($this->_saveItemsToDatabase[$catName][$v]))
                        unset($this->_saveItemsToDatabase[$catName][$v]);
                    $params[':p'.$i]=$v; 
                    ++$i;
                }
                $names=implode(',', array_keys($params));
                
                $connection=Yii::app()->db;
                $query='DELETE FROM {{settings}} WHERE `category`=:cat AND `key` IN('.$names.')';
                $command=$connection->createCommand($query);
                $command->bindParam(':cat', $catName);
                
                foreach($params AS $key=>$value)
                    $command->bindParam($key, $value);
                
                $command->execute();
                $this->_cacheNeedsFlush[]=$catName;
            }
        }
        
        if(count($this->_saveItemsToDatabase)>0)
        {
            foreach($this->_saveItemsToDatabase AS $catName=>$keyValues)
            {
                foreach($keyValues AS $k=>$v)
                    $this->addDbItem($catName, $k, $v);
                $this->_cacheNeedsFlush[]=$catName;
            }   
        }
        
        if(count($this->_cacheNeedsFlush)>0)
        {
            foreach($this->_cacheNeedsFlush AS $catName)
                Yii::app()->cache->delete($catName.'_'.$this->getCacheId());
        }   
    } 
    


}