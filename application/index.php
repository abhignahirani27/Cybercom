<?php

spl_autoload_register(__NAMESPACE__.'\Mage::loadFileByClassName');

class Mage
    {
        public  static function init()
        {
            //self::loadFileByClassName('Controller\Core\Front');
            \Controller\Core\Front::init();
        }
        public static function getController($className)
        {
            //self::loadFileByClassName($className);
            $className = str_replace('_',' ',$className);  
            $className = ucwords($className);
            $className = str_replace(' ','_',$className);
            return new $className;

        }
        public static function getBlock($className, $ton = false)
        {
            if(!$ton){
                //self::loadFileByClassName($className);
                $className = str_replace('\\',' ',$className);  
                $className = ucwords($className);
                $className = str_replace(' ','\\',$className);
                return new $className;
            }
            $value = self::getRegistry($className);
            if($value){
                return $value;
            }
            //self::loadFileByClassName($className);
            $className = str_replace('\\',' ',$className);  
            $className = ucwords($className);
            $className = str_replace(' ','\\',$className);
            $value = new $className;
            self::getRegistry($className,$value);
            return $value;
            
        }
        public static function getModel($className)
        {
            //self::loadFileByClassName($className);
            $className = str_replace('\\',' ',$className);  
            $className = ucwords($className);
            $className = str_replace(' ','\\',$className);
            return new $className;

        }
        public  static function loadFileByClassName($className)
        {  
            $className = str_replace('\\',' ',$className);  
            $className = ucwords($className);
            $className = str_replace(' ','/',$className);
            $className = $className . '.php';
            require_once ($className);

        }

        // public  static function prepareClassName($key, $nameSpace)
	    // {

		// $className = $key.' '.$nameSpace;
		// $className = str_replace('_',' ',$className);  
		// $className = ucwords($className);
		// $className = str_replace(' ','\\',$className);
		// return $className;

	    // }

        public static function setRegistry($key, $value)
        {
            $GLOBALS[$key] = $value;
        }

        public static function getRegistry($key, $optional = null)
        {
            if(!array_key_exists($key, $GLOBALS)){
                return $optional;
            }
            return $GLOBALS[$key];
        }
        
    }

Mage::init();
?>