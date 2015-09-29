<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
 * NEED WORK
 */
class bTable extends Element{
    
    
    private $head;
    private $body;
    
    function __construct($type) {
        //
        $this->type = 'table';
    }
    
    public function addHeader($head){
        if(count($this->innerElement)>0){
            //Need to code
            foreach($this->innerElement as $element){
                if($element->type == 'thead'){
                    $element->innerElement = [];
                    foreach(explode(',',$head) as $col){
                        $tr = new Element('tr');
                        $th = new Element('th');
                        $th->addHTML($col);
                        $tr->addElement($th);
                    }
                }
            }
        }
        else{
            $this->head = new Element('head');
            foreach(explode(',',$head) as $col){
                $tr = new Element('tr');
                $th = new Element('th');
                $th->addHTML($col);
                $tr->addElement($th);
            }
            $this->head->addElement($tr);
        }
    }
    
    public function addBody($body){
        
    }
    
    public function addRow($row){
        
    }
    
    private function buildGrid(){
        $this->innerElement = [];
        if(is_object($this->head))
            $this->addElement($this->head);
        if(is_object($this->body))
            $this->addElement($this->body);
    }
}

