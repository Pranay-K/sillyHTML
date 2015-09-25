<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bInput extends Element{
    
    function __construct($value,$options = [],$class = null) {
        $this->type = 'div';
        $this->addClass('input-group');
        $input_box = new Element('input');
        $input_box->addClass('form-control');
        if(isset($options['placeholder']))
            $input_box->addAttr('placeholder', $options['placeholder']);
        if(isset($options['left-addon'])){
            $span = new Element('span');
            
            if(is_string($options['left-addon'])){
                $span->addClass('input-group-addon');
                $span->addHTML ($options['left-addon']);
            }
            else{
                $span->addClass('input-group-btn');
                $span->addElement ($options['left-addon']);
            }
            $this->addElement($span);
        }
        $this->addElement($input_box);
        if(isset($options['right-addon'])){
            $span = new Element('span');
            
            if(is_string($options['right-addon'])){
                $span->addClass('input-group-addon');
                $span->addHTML ($options['left-addon']);
            }
            else{
                $span->addClass('input-group-btn');
                $span->addElement ($options['right-addon']);
            }
            $this->addElement($span);
        }
    }
    
    
    
}

