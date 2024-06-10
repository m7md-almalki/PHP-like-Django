<?php

class Router {
    protected $urls = [];

    function add($url, $view){
        $this->urls[$url] = $view;
    }

    function route($url){

        if (isset($this->urls[$url])){

            if (request_method() === "get"){
                $this->urls[$url]->get();

            }elseif (request_method() === "post"){
                $this->urls[$url]->post();
            }else{
                error_404();
            }

        }else{

            foreach ($this->urls as $the_url => $view_object){
                $passed_url = explode("/", trim($url , "/"));
                $parameters = [];

                if(str_contains($the_url, "{") & str_contains($the_url, "}")){
                    $the_url_as_array = explode("/", trim($the_url , "/"));
                    $the_url_as_array_to_compare = $the_url_as_array;
                    foreach($the_url_as_array as $index => $value){
                        if(str_contains($value, "{") & str_contains($value, "}")){
                            if(($passed_url[$index] ?? null)){
                                $parameters[trim(trim($value , "}") , "{")] = $passed_url[$index];
                                unset($passed_url[$index]);
                                unset($the_url_as_array_to_compare[$index]);
                            }
                        }
                    }

                    if($passed_url == $the_url_as_array_to_compare){
                        if (request_method() === "get"){
                            $view_object->get($parameters);
            
                        }elseif (request_method() === "post"){
                            $view_object->post($parameters);
            
                        }else{
                            error_404();
                        }

                        break;
                    }
                }
            }



            if(!($passed_url == $the_url_as_array_to_compare)){
                error_404();
            }
        }
    }
}

?>