<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bIcon extends Element{
    
    function __construct($value,$color = null) {
        
        //parent::__construct($type);
        
        
        $this->type = 'i';
        if($color == null)
            $this->addAttr('class', 'icon icon-'.$value);
        else
            $this->addAttr('class', 'icon icon-'.$value.' icon-'.$color);
    }
}

