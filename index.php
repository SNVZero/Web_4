<?php

$regname = '/^.*[^А-яЁё].*$/';
$err = [];
$flag = 0;


$name = $_POST['names'];
$mail = $_POST['email'];
$bio = $_POST['comment'];

$date = $_POST['dates'];
$test_arr_date  = explode('-', $date);

switch($_POST['gender']) {
    case 'm': {
        $gender='m';
        break;
    }
    case 'f':{
        $gender='f';
        break;
    }
};

switch($_POST['limbs']) {
    case '2': {
        $limbs='2';
        break;
    }
    case '4':{
        $limbs='4';
        break;
    }
    case '8':{
        $limbs='8';
        break;
    }
    case '16':{
        $limbs='16';
        break;
    }
};

$power1=in_array('s1',$_POST['capabilities']) ? '1' : '0';
$power2=in_array('s2',$_POST['capabilities']) ? '1' : '0';
$power3=in_array('s3',$_POST['capabilities']) ? '1' : '0';
$power4=in_array('s4',$_POST['capabilities']) ? '1' : '0';


if($power1 == 1){
    $powers1 = 'immortal';
}else{
    $powers1 = 'no spell';
}

if($power2 == 1){
    $powers2 = 'noclip';
}else{
    $powers2 = 'no spell';
}

if($power3 == 1){
    $powers3 = 'flying';
}else{
    $powers3 = 'no spell';
}

if($power4 == 1){
    $powers4 = 'lazer';
}else{
    $powers4 = 'no spell';
}



if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(!preg_match($regname,$name)){
        $err['name'] = '<small class=" text-danger">Введите имя кирилицей</small>';
    }
}








?>