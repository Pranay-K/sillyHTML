<?php
class HTML extends Element{
    private $elements = [];
    public $script = [];
    public $style = [];
    public $title = '';
    public $meta = [];
    //public $body = new Element('body');

    public function addMeta($name,$content){
        $this->meta[$name] = $content;
    }
    function __construct(){
        //echo 'HTML is constucted';	
    }


    public function render(){
        echo '<html>';
        echo '<head>';
        echo '<title>'.$this->title.'</title>';
        if(count($this->meta) > 0){
            foreach($this->meta as $key=>$value)
                echo '<meta name="'.$key.'" content="'.$value.'">';
        }
        echo '</head>';
        echo '<body>';
        echo $this->build();
        echo '</body>';
        echo '</html>';
    }

    public function push($element){

        $elements[] = $element;
    }

    public function pop($element){

    }

    //Not needed
    public function clean(){

    }

    //Not needed
    public function reboot(){

    }

    public function push_script($script){

    }

    public function push_style($style){

    }

    public function push_HTML($HTML){

    }

    public function render_array(){
        print_r($elements);
    }

    public function elementToHTML($element){

    }

    public function HTMLToElement($HTML){

    }
	
}

