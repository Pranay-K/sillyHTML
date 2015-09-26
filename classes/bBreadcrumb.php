<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bBreadcrumb extends Element{
    
    
    
    function __construct($items) {
        $this->type = 'ol';
        $this->addClass('breadcrumb');
        foreach($items as $key=>$item){
            $li = new Element('li');
            if($item != 'active'){
                $a = new Element('a');
                $a->addAttr('href', $item);
                $a->addHTML($key);
                $li->addElement($a);
            }
            else{
                $li->addClass ('active');
                $li->addHTML($item);
            }
            $this->addElement($li);
        }
    }
    
}

