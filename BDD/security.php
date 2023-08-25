<?php

function protect($param){
    $param= trim($param);
    $param= stripslashes($param);
    $param= htmlspecialchars($param);
    return $param;
}

