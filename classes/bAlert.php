<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bAlert extends Element{
    
    
    
    function __construct($content,$dismissible,$class = null) {
        $this->type = 'div';
        $this->addClass('alert');
        if($class != null)
            $this->addClass ('alert-'.$class);
        $this->addAttr('role', 'alert');
        $this->addHTML($content);
        if($dismissible == 1){
            $span = new Element('span');
            $span->addAttr('aria-hidden', 'true');
            $span->addHTML('&times;');
            $button = new bButton($span);
            $button->attributes = array('class'=>'close','data-dismiss'=>'alert','aria-label'=>'Close');
            $this->addElement($button);
        }
    }
    
}

