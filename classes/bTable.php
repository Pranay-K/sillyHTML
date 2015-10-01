<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>
 * NEED WORK
 */
class bTable extends Element{
    
    
    private $head;
    private $body;
    
    function __construct($type = null,$class = null) {
        //
        $this->type = 'table';
        $this->addClass('table');
    }
    
    public function addHeader($head){
        if(count($this->innerElement)>0){
            //Need to code
            foreach($this->innerElement as $element){
                if($element->type == 'thead'){
                    $element->innerElement = [];
                    $tr = new Element('tr');
                    foreach(explode(',',$head) as $col){
                        $th = new Element('th');
                        $th->addHTML($col);
                        $tr->addElement($th);
                    }
                    
                }
                else{
                    $this->head = new Element('thead');
                    $tr = new Element('tr');
                    foreach(explode(',',$head) as $col){
                        $th = new Element('th');
                        $th->addHTML($col);
                        $tr->addElement($th);
                    }
                    
                    $this->head->addElement($tr);
                }
                
            }
        }
        else{
            $this->head = new Element('thead');
            foreach(explode(',',$head) as $col){
                $tr = new Element('tr');
                $th = new Element('th');
                $th->addHTML($col);
                $tr->addElement($th);
            }
            $this->head->addElement($tr);
        }
        $this->buildGrid();
    }
    
    public function addBody($body){
        if(count($this->innerElement)>0){
            //Need to code
            foreach($this->innerElement as $element){
                if($element->type == 'tbody'){
                    $element->innerElement = [];
                    foreach(explode(',',$head) as $col){
                        $tr = new Element('tr');
                        $th = new Element('td');
                        $th->addHTML($col);
                        $tr->addElement($th);
                    }
                }
                else{
                    $this->head = new Element('tbody');
                    foreach(explode(',',$head) as $col){
                        $tr = new Element('tr');
                        $th = new Element('td');
                        $th->addHTML($col);
                        $tr->addElement($th);
                    }
                    $this->body->addElement($tr);
                }
                
            }
        }
        else{
            $this->body = new Element('tbody');
            foreach(explode(',',$head) as $col){
                $tr = new Element('tr');
                $th = new Element('td');
                $th->addHTML($col);
                $tr->addElement($th);
            }
            $this->body->addElement($tr);
        }
        $this->buildGrid();
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

