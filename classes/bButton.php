<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bButton extends Element{
    
    /**
     * 
     * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
     * @param type $type : STRING [div,li,ul,...,pre]
     * @param type $array : ARRAY
     */
    
    function __construct($value,$class = null) {
        //parent::__construct($type);
        $this->type = 'button';
        $this->addHTML($value);
        if($class == null)
            $cls = 'btn btn-default';
        else{
            $cls = 'btn';
            $ex = explode('|',$class);
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

