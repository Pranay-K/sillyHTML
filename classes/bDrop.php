<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bDrop extends Element{
    
    //public $submenu = [];
    public $dType = 'default';
    public $way = 'down';
    public $direction = 'left';
    public $haspopup = 'true';
    public $expanded = 'false';
    //private $button_class = ''
    
    function __construct($value,$options = [],$class = null) {//parent::__construct($type);
        $this->type = 'div';
        $this->addAttr('class', 'btn-group');
        $this->addAttr('role', 'group');
        
        if(isset($options['dType']))
            $this->way = $options['dType'];
        if(isset($options['way']))
            $this->way = $options['way'];
        
        if(isset($options['direction']))
            $this->direction = $options['direction'];
        
        if($class == null)
            $button = new bButton($value);
        else
            $button = new bButton($value,$class);
        $caret = new Element('span');
        $caret->addClass('caret');
        $caret->addAttr('class', 'caret');
        if($this->dType == 'default'){
            $button->addClass('dropdown-toggle');
            $button->addAttr('data-toggle', 'dropdown');
            $button->addAttr('aria-haspopup', $this->haspopup);
            $button->addAttr('aria-expanded', $this->expanded);
            $button->addElement($caret);
            $this->addElement($button);
        }
        else if($this->dType == 'split'){
            //dropup code goes here
            if($class == null)
                $bb = new bButton('');
            else
                $bb = new bButton('',$class);
            $bb->addClass('dropdown-toggle');
            $bb->addAttr('data-toggle', 'dropdown');
            $bb->addAttr('aria-haspopup', $this->haspopup);
            $bb->addAttr('aria-expanded', $this->expanded);
            $bb->addElement($caret);
            $td = new Element('span');
            $td->attributes = array('class'=>'sr-only');
            $td->addHTML('Toggle Dropdown');
            $bb->addElement($td);
            $this->addElement($button);
            $this->addElement($bb);
        }
        
        if($this->way == 'up')
            $this->addClass ('dropup');
        
    }
    
    public function addSubmenu($array){
        $list = new bList();
        $list->addClass('dropdown-menu');
        if($this->direction == 'right')
            $list->addClass('dropdown-menu-right"');
        $list->addSub($array);
        $this->addElement($list);
    }
    
    public function buildY(){
        
    }
    
}

