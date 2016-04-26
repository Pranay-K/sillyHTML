=include(jquery){}
=include(bootstrap){}
=style(){
    .trello{
        color:red;
    }
   #name{
    background-color:black;
color:white;
    }
}
=div(){ This is a div }
=p.trello.pharma(){
    =span(){ This is a span }
    =b(){ This is bold Feature }
    =b(){
        =i.stalker(){ Bold and Italic Text }
    }
}
=h1#header(){ This is just header }
=img(src=https://s0.2mdn.net/viewad/4362922/1-goibibo-irctc-970x250.jpg){}
=ul(){
    =li(){ First }
    =li(){ Second }
    =li(){ Third }
}
=ol(){
    =loop(li,First/Second/Third){
       This loops #
    
    }
}


=div#name(data-id=magic){

    =b(){My name is pranay}
}



=bButton[This is button](){}
=bButtonGroup[Left,Middle,Right](){}
=bGraphicon[minus](){}

=bToolbar[](){
    =bButton[This is button](){}
    =bButtonGroup[Left,Middle,Right](){}
}