<?php
namespace phpmatch;


function match(&...$args){
    return new Match($args);
}
