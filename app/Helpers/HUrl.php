<?php
function getUrl($dbUrl){
    return str_replace(",","/", $dbUrl);
}