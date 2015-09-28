<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
 */
class bThumbnail extends Element{
    
    
    /**
     * 
     * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
     * @param type $href : STRING
     * @param Element $img : STRING
     * @param type $content : STRING or OBJECT
     */
    function __construct($href,$img,$content=null) {
        if($content != null)
            parent::__construct();
        else{
            $this->type = 'a';
            $this->addAttr('href', $href);
            
        }
        $this->addAttr('class', 'thumbnail');
        $img = new Element('img');
        $img->attributes = ['src'=>$img];
        if($content != null){
            $div = new Element();
            $div->addClass('caption');
            if(is_string($content))
                $div->addHTML ($content);
            else if(is_object($content))
                $div->addElement ($content);
            $this->addElement($div);
        }
    }
    
}

