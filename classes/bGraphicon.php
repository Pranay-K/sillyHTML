<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bGraphicon extends Element{
    
    function __construct($value,$hidden = 'false') {
        //parent::__construct($type);
        $this->type = 'span';
        $this->addAttr('class', 'glyphicon glyphicon-'.$value);
        $this->addAttr('area-hidden', $hidden);
    }
}

