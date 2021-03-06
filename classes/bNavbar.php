<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bNavbar extends Element{
    
    function __construct($menu,$id = null) {
        $this->type = 'nav';
        $this->addClass('navbar');
        $header = new Element();
        $header->addClass('navbar-header');
        $button = new bButton('');
        if($id==null)
            $id = '';
        else
            $id = '#'.$id;
        $button->attributes = array('class'=>'navbar-toggle collapse','data-toggle'=>'collapse','aria-expanded'=>'false','data-target'=>$id);
        $icon = new bIcon('bar');
        $sr = new Element('span');
        $sr->addHTML('Toggle Navigation');
        $sr->addClass('sr-only');
        $button->addElements([$sr,$icon,$icon,$icon]);
        $brand = new Element();
        $brand->addClass('navbar-brand');
        $brand->addAttr('href', '#');
        $brand->addHTML('Brand');
        $header->addElements([$button,$brand]);
        
        $colapse = new Element();
        $colapse->addClass('collapse navbar-collapse');
        $colapse->addAttr('id',$id);
        $nav = new bNav($menu);//'pills|justified';
        $colapse->addElement($nav);
        
        
        $this->addElements([$header,$colapse]);
    }
    
    
    public function extendMenu($element,$class = null){
        $item = $this->innerElement[1];
        if($class != null)
            $element->addClass('navbar-'.$class);
        $element->removeClass('nav-tabs');
        $element->addClass('navbar-nav');
        $element->removeAttr('role');
        $item->addElement($element);
    }
    
}

    


