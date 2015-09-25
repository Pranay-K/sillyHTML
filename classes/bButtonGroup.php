<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bButtonGroup extends Element{
    
    
    
    public $label = '...';
    /**
     * 
     * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
     * @param type $type : STRING [div,li,ul,...,pre]
     * @param type $array : ARRAY
     */
    
    function __construct($buttons = null,$class = null) {
        //parent::__construct($type);
        $this->type = 'div';
        //$this->addHTML($value);
        if($class == null)
            $cls = 'btn-group';
        else{
            $cls = 'btn-group';
            $ex = explode('|',$class);
            foreach($ex as $ex)
                $cls .= ' btn-group-'.$ex;
        }
        $this->addAttr('class', $cls);
        $this->addAttr('role', 'group');
        $this->addAttr('area-label', $this->label);
        if($buttons!= null){
            $button = explode(',',$buttons);
            foreach($button as $button){
                $butt = new bButton($button);
                $this->addElement($butt);
            }
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

