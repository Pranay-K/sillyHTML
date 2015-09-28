<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
 */
class bGrid extends Element{
    
    function __construct($portions) {
        $this->type = 'div';
        $this->addClass('row');
        
        if(is_int($portions)){
            if($portions > 6)
                $portions = 6;
            $cols = 12/$portions;
            $div = new Element('div');
            $div->addClass('col-md-'.$cols);
            for($i=0;$i<$portions;$i++){
                $this->addElement($div);
            }
                
        }
        
        $device = explode('|',$portions);
        //print_r($device);
        foreach($device as $device){
            echo $device;
            $this->addDivisions($device);
        }
        
    }
    
    public function addDivisions($portions){
        $arg = explode('-',$portions);
        
        $markup = $arg[0];
        $div = $arg[1];
        $division = explode(',',$div);
        //print_r($division);
        $items = $this->innerElement;
        if(count($items)>0){
            $i = 0;
            foreach($division as $division){
                $items[$i]->addClass('col-'.$markup.'-'.$division);
                $i++;
            }
        }
        else{
            foreach($division as $division){
                $item = new Element('div');
                $item->addClass('col-'.$markup.'-'.$division);
                $this->addElement($item);
            }
        }
        
            
    }
    
}

    


