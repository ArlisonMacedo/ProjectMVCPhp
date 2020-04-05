<?php 



define("URL_BASE", "http://localhost/MVC");






function url (string $uri = null)
{
    if($uri){
        return URL_BASE . "/{$uri}";
    }

    return URL_BASE;
}