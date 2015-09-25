<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bNav extends Element{
    
    function __construct($array,$class = null) {
        //parent::__construct($type);
        $this->type = 'div';
        $list = new bList();
        $list->addClass('nav');
        if($class == null)
            $list->addClass('nav-tabs');
        else{
            $cls = explode('|',$class);
            foreach($cls as $cls){
                $list->addClass('nav-'.$cls);
            }
        }
        $list->addSub($array);
        
        foreach($array as $key=>$arr){
            if(is_array($arr)){
                $drp = new bDrop($key);
                $drp->addSubmenu($arr);
                $li = new Element('li');
                $li->attributes = array('role'=>'presentation','class'=>'dropdown');
                $inn1 = $drp->innerElement[0];
                $inn1->type = 'a';
                $inn1->addAttr('href','#');
                $inn1->removeClass('btn');
                $inn1->removeClass('btn-default');
                $inn2 = $drp->innerElement[1];
                $li->addElement($inn1);
                $li->addElement($inn2);
                $list->addElement($li);
            }
            
        }
        
        
        
        
        $items = $list->innerElement;
        foreach($items as $item)
            $item->addAttr('role', 'presentation');
        $items[0]->addClass('active');
        $this->addElement($list);
    }
    
    
    
    
}

