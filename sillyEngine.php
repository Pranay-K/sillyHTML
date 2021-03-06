<?php
class sillyEngine{
    private $file;
    private $element_count = 0;
    private $excludeObjects = ['include','loop'];
    
    function __construct($file) {
        $this->file = $file;
        $this->parseFile();
    }
    
    private function parseFile(){
        $content = file_get_contents($this->file);
        $content = $this->removeComments($content);
        $content = trim(preg_replace('/\s+/', ' ', $content));
        $result = $this->countBraces($content);

        echo '<pre>';
        //print_r($result);

        echo '</pre>';
        $body = new Element();
        $this->parse_html($result,$body);
        //$this->parse_shtml($result,'body');
        $body->codeView();
        echo $body->build();

        //parse_to_file($result,'$body');

    }
    
    private function removeComments($content){
        $exclude = $this->getStringBetween($content,'/*','*/');
        $content = str_replace($exclude, '', $content);
        $content = str_replace('/*', '', $content);
        $content = str_replace('*/', '', $content);
        //$exclude = $this->getStringBetween($content,'//',PHP_EOL);
        //$content = str_replace($exclude, '', $content);
        return $content;
    }


    private function parse_html($result,$body){
        foreach($result as $key=>$element){
            if(!in_array($element['object'],$this->excludeObjects)){
                
                //Checking if object is custom element
                if(strpos($element['object'],'[')!==false && strpos($element['object'],']')!==false){
                    $obj_name = explode('[',$element['object'])[0];
                    $param = $this->getStringBetween($element['object'],'[',']');
                    //echo $obj_name;
                    $object = new $obj_name($param);
                }
                else{
                    $object = new Element($element['object']); //Creating dynamic Object
                }
                if($element['attr'] != ''){
                    foreach(explode(',',$element['attr']) as $attr){
                        $val = explode('=',$attr); // GETTING ATTRIBUTE VALUES
                        $object->addAttr($val[0], $val[1]);
                    }
                }
                if(is_array($element['inner'])){
                    $this->parse_html($element['inner'],$object); // ADDING INNER ELEMENTS TO OBJECT
                }
                else{
                    $object->addHTML($element['inner']); // ADDING HTML TO OBJECT
                }
                $body->addElement($object); // APPENDING OBJECT WITH INNER OBJECTS
                
            }
            else{
                $this->objectTypes($element,$body);
                //$body->addElement($object);
            }
        }
    }
    
    private function objectTypes($element,$body){ //element is type array
        //print_r($element);
        switch($element['object']){
            case 'include':
                global $$element['attr'];
                $val = $$element['attr'];
                foreach($val as $val){
                    if(strpos($val,'.css')){
                        $style = new Element('link');
                        $style->attributes = array("rel"=>"stylesheet","href"=>$val);
                        $body->addElement($style);
                    }
                    else if(strpos($val,'.js')){
                        $style = new Element('script');
                        $style->attributes = array("src"=>$val);
                        $body->addElement($style);
                    }
                }
                break;
            case 'loop':
                $opt = explode(',',$element['attr']);
                if(isset($opt[1])){
                    $margin = explode('/',$opt[1]);
                    foreach($margin as $val){
                        $item = new Element($opt[0]);
                        $data = $element['inner'];
                        //str_replace('#', $val, $data);
                        if(is_array($data)){
                            $data = $this->array_replacing($data,$val);
                            $this->parse_html($data,$item);
                            $body->addElement($item);
                        }
                        else{
                            $data = str_replace('#', $val, $data);
                            $item->addHTML($data);
                            $body->addElement($item);
                        }
                        //print_r($data);
                        
                    }
                }
                break;
        }
    }
    
    private function array_replacing($array,$replace){
        $map = array_map(function($v) use ($replace){
            if(is_array($v))
                $v =$this->array_replacing($v,$replace);
            else if(is_string($v))
                $v = str_replace('#', $replace, $v);
            //print_r($v);
            return $v;
        },$array);
        return $map;
    }
    
    
    

    private function parse_shtml($result,$body){
        foreach($result as $key=>$element){
            echo '<pre>';
            echo '$'.$element['object'].$key.' = new Element("'.$element['object'].'");'."\n";

            if($element['attr'] != ''){
                foreach(explode(',',$element['attr']) as $attr){
                    $val = explode('=',$attr);
                    echo '$'.$element['object'].$key.'->addAttr("'.$val[0].'","'.$val[1].'");'."\n";
                }
            }

            if(is_array($element['inner'])){
                $this->parse_shtml($element['inner'],'$'.$element['object'].$key);
            }
            else{
                echo '$'.$element['object'].$key.'->addHTML("'.$element['inner'].'");'."\n";
            }

            echo $body.'->addElement($'.$element['object'].$key.');';
            echo '</pre>';
        }

    }

    private function countBraces($content){
        $object = [];

        $block_start = 0;
        $block_end = 0;
        $block = 0;
        $block_string = '';
        for($i = 0;$i<strlen($content);$i++){
            //echo $content[$i].'<br/>';
            $temp = $block;
            $block_string .= $chr = $content[$i];
            if($chr == '{'){
                $block += 1;
            }
            if($chr == '}'){
                $block -= 1;
            }
            //Checks Opening Change
            if(($block - $temp) > 0){
               // echo 'Change Open:'.$i.'<br/>';
            }
            if(($block - $temp) < 0){
                //echo 'Change Close</br/>';
                //$block_end = $i;
                //echo $block;
                if($block == 0){
                    $block_end = $i;
                    //$block_string = substr($content, $block_start,$block_end+1);
                    echo $block_string.'<br/>';
                    $block_start = $i+1;
                    if( strpos($block_string,'=') !== FALSE  && strpos($block_string,'{') !== FALSE && strpos($block_string,'}') !== FALSE)
                        $object[count($object)]= $this->createObject(trim($block_string));
                    else
                        $object[count($object)]= trim($block_string);
                    $block_start = $i+1;
                    $block_string = '';
                }

            }

        }
        //echo $block_end;
        //print_r($object);
        return $object;
    }

    public function createObject($obj_block){
        //global $object;
        $after_count = 0;
        $this->element_count++;
        for($i = 0;$i<strlen($obj_block);$i++){
            if($obj_block[$i] == '{'){
                $outblock = substr($obj_block, 0,$i);
                $after_count = $i+1;
                break;
            }
        }
        $inblock = substr($obj_block, $after_count,strlen($obj_block)-$after_count-1);//46




        $object_name = $this->getStringBetween($outblock,'=','(');
        //echo $object_name.'<br/>';
        $attributes = $this->getStringBetween($outblock,'(',')');
        
        
        
        
        
        
        
        
        
        //Implementing short code ID 
        $obj_id = explode('#',$object_name);

        if(count($obj_id)==2 ){
            if($attributes != '')
                $attributes .= ",id=".$obj_id[1];
            else
                $attributes .= "id=".$obj_id[1];
            $object_name = $obj_id[0];
        }
        else if(count($obj_id)>2){
            echo 'Only one Id is allowed';
            die;
        }
        else{
            $object_name = $obj_id[0];
        }

        //Implementing short code CLASS 
        $obj_cl = explode('.',$object_name);

        if(count($obj_cl)>1){
            $class = '';
            for($i=1;$i<count($obj_cl);$i++){
                if($class == '')
                    $class .= $obj_cl[$i];
                else
                    $class .= ' '.$obj_cl[$i];
            }

            if($attributes != '')
                $attributes .= ",class=".$class;
            else
                $attributes .= "class=".$class;
            $object_name = $obj_cl[0];
        }
        else{
            $object_name = $obj_cl[0];
        }



        if( strpos($inblock,'=') !== FALSE && strpos($inblock,'{') !== FALSE && strpos($inblock,'}') !== FALSE )// && strpos($inblock,'{') != -1 && strpos($inblock,'}') != -1)
            $return = $this->countBraces(trim($inblock));
        else
            $return = trim($inblock);
        $value = array(
            'object' => $object_name,
            'attr' => $attributes,
            'inner' => $return
        );
        return $value;
    }

    // Gets string in bettwen braces
    private function getStringBetween($str,$from,$to)
    {
        $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
        return substr($sub,0,strpos($sub,$to));
    }
    
    
}







