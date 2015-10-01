<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require('main.php');
$file='parseFile.php';
parseFile($file);

function parseFile($file_path){
    $count = 0;
    $object = [];
    $file = fopen($file_path,"r");
    $content = file_get_contents($file_path);
    
    $content = trim(preg_replace('/\s+/', ' ', $content));
    $content = trim($content); //str_replace(' ', '', $content);
    //$content = removeNewline($content);
    
    $result = countBraces($content);
    
    echo '<pre>';
    //print_r($result);
    
    echo '</pre>';
    $body = new Element();
    parse_html($result,$body);
    //parse_shtml($result,'body');
    $body->codeView();
    echo $body->build();
    //parse_to_file($result,'$body');
    
}


function parse_html($result,$body){
    foreach($result as $key=>$element){
        //print_r($element);
        //echo '$'.$element['object'].$key.' = new Element("'.$element['object'].'");'."\n";
        //$object = $element['object'].$key;
        $object = new Element($element['object']);//Creating dynamic Object
        if($element['attr'] != ''){
            foreach(explode(',',$element['attr']) as $attr){
                $val = explode('=',$attr);
                //echo '$'.$element['object'].$key.'->addAttr("'.$val[0].'","'.$val[1].'");'."\n";
                $object->addAttr($val[0], $val[1]);
            }
        }
        
        if(is_array($element['inner'])){
            parse_html($element['inner'],$object);
        }
        else{
            //echo '$'.$element['object'].$key.'->addHTML("'.$element['inner'].'");'."\n";
            $object->addHTML($element['inner']);
        }
        
        //echo $body.'->addElement($'.$element['object'].$key.');';
        $body->addElement($object);
        //echo '</pre>';
    }
}

function parse_shtml($result,$body){
    foreach($result as $key=>$element){
        echo '<pre>';
        //print_r($element);
        echo '$'.$element['object'].$key.' = new Element("'.$element['object'].'");'."\n";
        
        if($element['attr'] != ''){
            foreach(explode(',',$element['attr']) as $attr){
                $val = explode('=',$attr);
                echo '$'.$element['object'].$key.'->addAttr("'.$val[0].'","'.$val[1].'");'."\n";
            }
        }
        
        if(is_array($element['inner'])){
            parse_shtml($element['inner'],'$'.$element['object'].$key);
        }
        else{
            echo '$'.$element['object'].$key.'->addHTML("'.$element['inner'].'");'."\n";
        }
        
        echo $body.'->addElement($'.$element['object'].$key.');';
        echo '</pre>';
    }
    
}






function countBraces($content){
    $object = [];
    
    $block_start = 0;
    $block_end = 0;
    $block = 0;
    $block_string = '';
    for($i = 0;$i<strlen($content);$i++){
        //echo $content[$i].'<br/>';
        $temp = $block;
        $chr = $content[$i];
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
            if($block == 0){
                $block_end = $i;
                $block_string = substr($content, $block_start,$block_end+1);
                //echo $block_string.'<br/>';
                $block_start = $i+1;
                if( strpos($block_string,'=') !== FALSE  && strpos($block_string,'{') !== FALSE && strpos($block_string,'}') !== FALSE)
                    $object[count($object)]= createObject(trim($block_string));
                else
                    $object[count($object)]= trim($block_string);
            }
            
        }
        
    }
    //echo $block_end;
    //print_r($object);
    return $object;
}

function createObject($obj_block){
    //global $object;
    $after_count = 0;
    
    for($i = 0;$i<strlen($obj_block);$i++){
        if($obj_block[$i] == '{'){
            $outblock = substr($obj_block, 0,$i);
            $after_count = $i+1;
            break;
        }
    }
    $inblock = substr($obj_block, $after_count,strlen($obj_block)-$after_count-1);//46
    
    
    
    
    $object_name = getStringBetween($outblock,'=','(');
    $attributes = getStringBetween($outblock,'(',')');
    
    //Implementing short code ID 
    $obj_id = explode('#',$object_name);
    
    if(count($obj_id)>1 && count($obj_id)<2 ){
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
        $return = countBraces(trim($inblock));
    else
        $return = trim($inblock);
    $value = array(
        'object' => $object_name,
        'attr' => $attributes,
        'inner' => $return
    );
    return $value;
}

function getStringBetween($str,$from,$to)
{
    $sub = substr($str, strpos($str,$from)+strlen($from),strlen($str));
    return substr($sub,0,strpos($sub,$to));
}
