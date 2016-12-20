<?php
/*
 * author : he fan
 *
 * date : 16.07.08 10.46
 */

class  Route {

    /*
     * Http Method
     */
     protected $method;

    /*
     * URI
     */
     protected $uri;

    /*
     * Rules
     */
     protected  $getRules=[];

     protected  $postRules=[];

     protected $isMatch=false;

     public  function   __construct()
    {
       $this->method=$_SERVER['REQUEST_METHOD'];

       $this->uri=$_SERVER['PATH_INFO'];

    }

    public function  get($route,$callback)//$route->get('/url',function(){ ... })
    {
         $this->getRules[$route]=$callback;

    }

    public function  post($route,$callback)//$route->post('/url?id=1',function(){ ... })
    {
         $this->postRules[$route]=$callback;

    }

  
    public function  group(array $group ){
    //没写
    }

    public function  run()
    {
        $method= $this->method;

        switch($method){
            case 'GET':
                foreach($this->getRules as $key =>$callback )
                {
                    $this->match('GET',$this->uri,$key);
                    if($this->isMatch){
                      $callback();
                        break;
                    }
                }
                break;
            case 'POST':
                foreach($this->postRules as $key =>$callback )
                {
                      //调用match方法匹配
                }
                 break;
         

        }

    }

    protected function match($method,$uri,$rule){

      if($method=='GET'){
          if($uri==$rule){
                  $this->isMatch=true;
              }

      }
       elseif($method=='POST'){

           /*
            * 如果是post的话，应该调用  $this->parseURL()
            *
            * 然后再进行匹配
            */

       }
       //可以继续elseif下去
    }

    protected function parseURL(){
        /*
         * 这个方法可以用来 解析URL
         *
         */

    }
}