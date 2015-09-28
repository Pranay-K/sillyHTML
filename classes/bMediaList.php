<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bMediaList extends Element{
    
    
    /*Takes value as array
     * array form as
     * array = [
     *      'img'=>url or object,
     *      'header' => string or object,
     *      'body' => string or object
     * ]
     */
    function __construct($array = []) {
        $this->addClass('media');
        if(count($array)>0){
            foreach($array as $element){
                $item = new Element();
                $item->addClass('list-group-item');
            }
        }
    }
    
    
    
    
    
}

