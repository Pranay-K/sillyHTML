<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bProgressBar extends Element{
    
    
    
    function __construct($value,$class = null) {
        parent::__construct();
        $this->addClass('progress');
        $bar = new Element();
        $bar->attributes = array('class'=>'progress-bar','role'=>'progressbar','aria-valuenow'=>$value,'aria-valuemin'=>'0','aria-valuemax'=>'100','style'=>'width:'.$value.'%');
        $bar->addHTML($value.'%');
        if($class != null){
            foreach(explode(',',$class) as $cls){
                if($cls != 'active')
                    $bar->addClass('progress-bar-'.$cls);
                else
                    $bar->addClass('active');
            }
        }
        $this->addElement($bar);
    }
    
    public function addStack($value,$class = null){
        $bar = new Element();
        $bar->attributes = array('class'=>'progress-bar','role'=>'progressbar','aria-valuenow'=>$value,'aria-valuemin'=>'0','aria-valuemax'=>'100','style'=>'width:'.$value.'%');
        $bar->addHTML($value.'%');
        if($class != null){
            foreach(explode(',',$class) as $cls){
                if($cls != 'active')
                    $bar->addClass('progress-bar-'.$cls);
                else
                    $bar->addClass('active');
            }
        }
        $this->addElement($bar);
    }
    
    
    
}

