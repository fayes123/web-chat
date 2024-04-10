<?php

function required_input($str){
    if(strlen($str) <=0){
        return false;
    }
    return true;
}