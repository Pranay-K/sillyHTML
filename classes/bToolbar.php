<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bToolbar extends Element{
    
    
    
    public $label = '...';
    /**
     * 
     * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
     * @param type $type : STRING [div,li,ul,...,pre]
     * @param type $array : ARRAY
     */
    
    function __construct($bgroups = []) {
        //parent::__construct($type);
        $this->type = 'div';
        //$this->addHTML($value);
        
        $this->addAttr('class', 'btn-toolbar');
        $this->addAttr('role', 'toolbar');
        $this->addAttr('area-label', $this->label);
        foreach($bgroups as $group){
            $this->addElement($group);
        }
        
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

