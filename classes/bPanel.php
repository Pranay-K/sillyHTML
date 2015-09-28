<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
 */
class bPanel extends Element{
    
    function __construct($content = null) {
        $this->type = 'div';
        parent::addClass('panel');
        parent::addClass('panel-default');
        $body = new Element();
        $body->addClass('panel-body');
        if($content != null){
            if(is_string($content))
                $body->addHTML ($content);
            else if(is_object($content))
                $body->addElement ($content);
                
        }
        $this->addElement($body);
    }
    
    public function addHeader($header_content){
        $head = new Element();
        $head->addClass('panel-heading');
        $title = new Element();
        $title->addClass('panel-title');
        if(is_string($header_content))
            $title->addHTML($header_content);
        else if(is_object($header_content))
            $title->addElement ($header_content);
        $head->addElement($title);
        $this->prependElement($head);
    }
    
    public function addFooter($footer_content){
        $foot = new Element();
        $foot->addClass('panel-footer');
        if(is_string($footer_content))
            $foot->addHTML($footer_content);
        else if(is_object($footer_content))
            $foot->addElement ($footer_content);
        $this->addElement($foot);
    }
    
    public function addClass($class) {
        $class = 'panel-'.$class;
        parent::addClass($class);
    }
   
    
}

    


