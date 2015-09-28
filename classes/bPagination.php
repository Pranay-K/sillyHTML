<?php
/**
 * @author Pranay Katiyar <pranay.k.katiyar@gmail.com>@
 */
class bPagination extends Element{
    
    
    
    function __construct($count,$active,$link,$np = null,$class=null) {
        $this->type = 'nav';
        $arr = [];
        for($i=0;$i<$count;$i++){
            //$link = 
            $arr[$i+1] = str_replace('@', ($i+1), $link);
        }
        
        $list = new bList();
        
        if(($np == 1) && ($active-1) > 0){
            //Creating Previous Button
            
            $li = new Element('li');
            $a = new Element('a');
            $a->attributes = array('href'=>str_replace('@', ($active-1), $link),'aria-label'=>'Previous');
            $span = new Element('span');
            $span->attributes = array('aria-hidden','true');
            $span->addHTML('&laquo;');
            $a->addElement($span);
            $li->addElement($a);
            $list->addElement($li);
            //End of Previous button
        }
        
        
        
        $list->addSub($arr);
        if($class != null){
            foreach(explode('|',$class) as $cls)
                $list->addClass ('pagination-'.$cls);
        }
        $list->addClass('pagination');
        if($np == 1)
            $list->innerElement[$active]->addClass('active');
        else
            $list->innerElement[$active-1]->addClass('active');
        
        if(($np == 1)&& ($active+1)<=$count){
            //Creating Next button
            $pi = new Element('li');
            $ap = new Element('a');
            $ap->attributes = array('href'=>str_replace('@', ($active+1), $link),'aria-label'=>'Next');
            $spanp = new Element('span');
            $spanp->attributes = array('aria-hidden','true');
            $spanp->addHTML('&raquo;');
            $ap->addElement($spanp);
            $pi->addElement($ap);
            $list->addElement($pi);
            //End of Next button
        }
        
        $this->addElement($list);
    }
    
}

