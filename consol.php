<?php

require_once (__DIR__. '/vendor/autoload.php');

use App\Model\User;

$params = array(
    ''      => 'help',
    'n:'    => 'name:',
    'e:'    => 'email:',
    'p:'    => 'password:',
    'i:'    => 'isadmin:',
    'a:'    => 'avatar:'
);


$name       = '';
$email      = '';
$password   = null;
$isadmin    = null;
$avatar     = '';
$errors     = array();

$options = getopt( implode('', array_keys($params)), $params );

    if (isset($options['name']) || isset($options['n'])) {
        $name = isset( $options['name'] ) ? $options['name'] : $options['n'];
    }else{
        $errors[]   = 'name required';
    }

    if (isset($options['email']) || isset($options['e'])){
        $email = isset( $options['email'] ) ? $options['email'] : $options['e'];
    }else{
        $errors[]   = 'email required';
    }
    if (isset($options['isadmin']) || isset($options['i'])){
        $isadmin = isset( $options['isadmin'] ) ? $options['isadmin'] : $options['i'];
    }else{
        $errors[]   = 'isadmin required';
    }
    if (isset($options['password']) || isset($options['p'])){
        $password = isset( $options['password'] ) ? $options['password'] : $options['p'];
    }else{
        $errors[]   = 'password required';
    }
    if (isset($options['avatar']) || isset($options['a'])){
        $avatar = isset( $options['avatar'] ) ? $options['avatar'] : $options['a'];
    }else{
        $errors[]   = 'avatar required';
    }
    if ( isset($options['help']) || count($errors) ){
        $help = "
usage: php consol.php [--help] [-n|--name=vasiliy] [-e|--email=email@gmail.com]
 [-p|--password=123456] [-a|--avatar=/upload/ava.png] [-i|--isadmin=1]

Options:
            --help      Show this message
        -n  --name      User name
        -e  --email     Email 
        -p  --password  Password 
        -a  --avatar    Avatar url
        -i  --isadmin   isAdmin=1 or isAdmin=0
Example:
        php consol.php --name=vasiliy --email=email@gmail.com --password=123456 --avatar=/upload/ava.png --isadmin=1
";
    if ( $errors ){
        $help .= 'Errors:' . PHP_EOL . implode("\n", $errors) . PHP_EOL;
    }die($help);}
        $password = password_hash($password, PASSWORD_DEFAULT);
        $model = new User();
        $model->create([
            'name'      => $name,
            'email'     => $email,
            'password'  => $password,
            'is_admin'  => $isadmin,
            'avatar'    => $avatar
        ]);





