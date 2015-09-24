<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class Lists extends Element{
    
    /**
     * 
     * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
     * @param type $type : STRING [div,li,ul,...,pre]
     * @param type $array : ARRAY
     */
    function __construct($type = null,$array = null) {
        //parent::__construct($type);
        if($type == null)
            $this->type = 'ul';
        else
            $this->type = $type;
        
        if($array != null){
            foreach($array as $key=>$value){
                $child = new Element('li');
                $child->addAttr('value',$key);
                $child->addHTML($value);
                $this->addElement($child);
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

