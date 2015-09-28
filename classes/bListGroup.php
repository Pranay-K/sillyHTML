<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bListGroup extends Element{
    
    
    
    function __construct($array = []) {
        $this->addClass('list-group');
        if(count($array)>0){
            foreach($array as $key=>$element){
                $item = new Element();
                $item->addClass('list-group-item');
            }
                
        }
    }
    
    public function addItems($array){
        
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

