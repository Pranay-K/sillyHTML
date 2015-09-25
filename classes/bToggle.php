<?php
//UNDER CONSTRUCTION


/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
 * 
 */
class bToggle extends Element{
    
    public $toggle = 'collapse';
    public $target = '#navbar';
    public $expanded = 'false';
    public $controls = 'navbar';
    
    /**
     * 
     * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
     * @param type $type : STRING [div,li,ul,...,pre]
     * @param type $array : ARRAY
     */
    function __construct($classes = null) {
        $this->type = 'button';
        $this->attributes = array(
            'class' => 'navbar-toggle collapsed',
            'type' => 'button',
            'data-toggle' => $this->toggle,
            'data-target' => $this->target,
            'aria-expanded' => $this->expanded,
            'aria-controls' => $this->controls
        );
        $this->addHTML('<span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>');
    }
    
    
    
}

