<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bContainer extends Element{
    
    function __construct($fluid = false) {
        $this->type = 'div';
        if($class == false)
            $this->addAttr('class', 'container');
        else if($class == true)
            $this->addAttr ('class', 'container-fluid');
        
    }
    
}

    


