<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bButton extends Element{
    
    /**
     * 
     * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
     * @param type $value : STRING or ELEMENT (OBJECT)
     * @param type $class : STRING eg. primary,lg
     */
    
    function __construct($value,$class = null) {
        //parent::__construct($type);
        $this->type = 'button';
        
        if(is_string($value))
            $this->addHTML($value);
        else if(is_object($value))
            $this->addElement ($value);
        
        if($class == null)
            $cls = 'btn btn-default';
        else{
            $cls = 'btn';
            $ex = explode(',',$class);
            foreach($ex as $ex)
                $cls .= ' btn-'.$ex;
        }
        $this->addAttr('class', $cls);
        $this->addAttr('type', 'button');
    }
    
    /**
     * 
     * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
     * @param type $attr : STRING
     * @param type $value : STRING
     */
    public function addChildAttr($attr,$value){
        foreach($this->innerElement as $element){
            $element->attributes[$attr] = $value;
        }
    }
    
    
}

