<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bList extends Element{
    
    
    private $sub = [];
    
    function __construct($array = null) {
        //parent::__construct($type);
        $this->type = 'ul';
        
        
        /*
         * 
         * format of array
         * array(
         *  'name' => 'link',
         *  'name' => 'link'
         * );
         */
        if($array != null){
            $arr = explode(',',$array);
            foreach($arr as $value){
                $child = new Element('li');
                
                    $anc = new Element('a');
                    $anc->addAttr('href', '#');
                    $anc->addHTML($value);
                if($value != '|')
                    $child->addElement($anc);
                else
                    $child->attributes = array('class'=>'divider','role'=>'seperator');
                $this->addElement($child);
            }
        }
    }
    
    public function addSub($array){
        
        foreach($array as $key=>$value){
            if(is_string($value)){
                $child = new Element('li');
                        $anc = new Element('a');
                        $anc->addAttr('href', $value);
                        $anc->addHTML($key);
                if($key != '|'){
                    if($value != '')
                        $child->addElement($anc);
                }
                else
                    $child->attributes = array('class'=>'divider','role'=>'seperator');
                $this->addElement($child);
            }
            else{
                //$child->addElement($value);
                //$this->addElement($child);
                
            }
                
        }
    }
    
    
}

