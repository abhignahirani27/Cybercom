<?php 
namespace Model\Admin;
\Mage::loadFileByClassName('Model\Admin\Session');

class Filter extends \Model\Admin\Session
{
    public function setFilter($filters)
    {
        if(!$filters){
            return false;
        }
        $filters = array_filter(array_map(function($key, $value){
            $value = array_filter($value);
            return $value;

        },$filters));

        $this->filters = $filters;    
    }

    public function getFilter()
    {
        return $this->filters;
    }

    public function hasFilters()
    {
        if(!$filters){
            return true;
        }
        return true;
    }

    public function getFilterValue($type,$key)
    {
        print_r($this->filters);
        if(!$this->filters){
            return null;
        }
        if(!array_key_exists($type, $this->filters)){
            return null;
        }
        if(!array_key_exists($key, $this->filters[$type])){
            return null;
        }
        return $this->filters[$type][$key]; 
    }

    public function clearFilters()
    {
        if($this->hasFilters()){
            unset($this->filters);
        }
        return $this;
    }
}