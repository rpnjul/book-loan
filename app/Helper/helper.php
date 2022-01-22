<?php


function users()
{
    $user = auth()->user();
    if(auth('web')->check()){
        
    }elseif(auth('admin')->check()){

    }

    return $user;
}