<?php

class Element{
    
    //Public Variables
    public $attributes = [];
    
    
    //Private Variables
    private $innerHTML = '';
    private $inline = 0;
    
    //Protected Variables
    protected $type = '';
    protected $innerElement = [];
    
    /**
     * 
     * @param type $type : STRING [div,ul,li....pre]
     */
    function __construct($type = null){
        if($type == null){
                $this->type = 'div';
                $this->inline = 0;
        }
        else{
                $this->type = $type;
                if($type == 'img' || $type == 'input')
                    $this->inline = 1;
        }
    }

    /**
     * 
     * @param type $attr : STRING
     * @param type $value : STRING
     */
    public function addAttr($attr,$value){
        $this->attributes[$attr] = $value;
    }
    
    /**
     * 
     * @param type $html : STRING
     */
    public function addHTML($html){
        $this->innerHTML = $html;
    }

    /**
     * 
     * @param type $element : ELEMENT
     */
    public function addElement($element){
        $this->innerElement[count($this->innerElement)] = $element;
    }


    //Not needed for now
    public function removeAttr(){

    }


    /*Just for testing, Not needed
    public function intoHTML(){
            $attr = '';
            $inH = '';

            foreach($this->attributes as $key=>$value){
                    $attr .= ' '.$key.'="'.$value.'" ';
            }

            if(count($this->innerElement)>0){
                    foreach($this->innerElement as $element){
                            $inH .= $element->build();
                    }
            }

            //echo $inH;

            echo '<'.$this->type.$attr.'>'.$this->innerHTML.' '.$inH.'</'.$this->type.'>'."\n";
    }*/

    /**
     * 
     * @return type
     */
    public function build(){
        $attr = '';
        $inH = '';

        foreach($this->attributes as $key=>$value){
                $attr .= ' '.$key.'="'.$value.'" ';
        }

        if(count($this->innerElement)>0){
                foreach($this->innerElement as $element){
                        $inH .= $element->build();
                }
        }
        
        if($this->inline == 0){
            if(READABLE == 'TRUE'){
                global $space_count;
                return $this->tabbing_space($space_count = $space_count+1).'<'.$this->type.$attr.'>'."\n".$this->tabbing_space($space_count = $space_count+1).$this->innerHTML.' '.$inH."\n".$this->tabbing_space($space_count = $space_count-2).'</'.$this->type.'>'."\n";
            }
            else{
                return '<'.$this->type.$attr.'>'.$this->innerHTML.' '.$inH.'</'.$this->type.'>';
            }
        }
        else{
            if(READABLE == 'TRUE')
                return '<'.$this->type.$attr.' />'."\n";
            else 
                return '<'.$this->type.$attr.' />'."\n";
        }
    }
    
    public function tabbing_space($space_count){
        $space = '';
        for($i = 0;$i<$space_count;$i++)
            $space .= ' ';
        return $space;
    }
    
    public function tree(){
        echo '<pre>';
        print_r($this);
        echo '</pre>';
    }
    
    
    
    /**
     * 
     */
    public function codeView(){
        ?>
        <style>
            body {background-color:white;padding:50px 50px}
            pre {background-color:#ccc;overflow:auto;margin:0 0 1em;padding:.5em 1em;word-wrap:break-word;}
            pre code,pre .line-number {
              /* Ukuran line-height antara teks di dalam tag <code> dan <span class="line-number"> harus sama! */
              font:normal normal 12px/14px "Courier New",Courier,Monospace;color:black;display:block;
            }
            pre .line-number {float:left;display:block;padding:0 1em 0 1em;margin:0 1em 0 -1em;text-align:right;color : #000;}
            pre .odd{background-color:#fff;}
            pre .even{background-color:#eee;}
            pre .code {display:block;padding:0 1em 0 1em;margin:0 1em 0 2em;}
            pre .line-number span {display:block;padding:0 .5em 0 1em;}
            pre .cl {display:block;clear:both;}
        </style>
        <?php
        echo '<pre><code>';
        echo htmlentities($this->build());
        echo '</code></pre>';
        ?>
        <script>
            (function() {
                var pre = document.getElementsByTagName('code'),
                    pl = pre.length;
                for (var i = 0; i < pl; i++) {
                    var num = pre[i].innerHTML.split(/\n/).length;
                    var item = pre[i].innerHTML.split(/\n/);
                    pre[i].innerHTML = '';
                    for (var j = 0; j < num; j++) {
                        
                        if((j%2) === 0)
                            pre[i].innerHTML += '<div><span class="line-number">'+(j + 1)+'.</span><span class="code even">'+item[j]+'</span><span class="cl"></span></div>';
                        else
                            pre[i].innerHTML += '<div><span class="line-number">'+(j + 1)+'.</span><span class="code odd">'+item[j]+'</span><span class="cl"></span></div>';
                    }
                }
            })();
        </script>
        <?php
    }
    
}
