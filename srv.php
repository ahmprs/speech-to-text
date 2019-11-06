<?php
header('Content-type: text/html; charset=UTF-8');
session_start();


if (!is_authorized()) return '';

if (isset($_POST['func'])) if ($_POST['func'] == 'fn_process_cmd') echo fn_process_cmd();

// comment
function fn_process_cmd()
{
    $cmd = $_POST['cmd'];
    $code = '';

    switch ($cmd) {
        case 'js for loop':
            $code = <<<JAVASCRIPT
for(let i=0; i<n; i++)
{

}
JAVASCRIPT;
            break;
        case 'js post':
            $code = <<<JAVASCRIPT
let pst = $.post(
    // server url
    '',

    // post parameters
    {func:'fn'},

    // server response
    function(d,s)
    {
        if(d.trim()=='') return;
        var resp = jQuery.parseJSON(d);

    });

    // On Failure
pst.fail(function(){

});

    // Finally
pst.always(function(){
});
// --------------------------------------------------

JAVASCRIPT;
            break;
        case 'db create database':
            $code = <<<SQL
    CREATE DATABASE IF NOT EXISTS `db_name`
    DEFAULT CHARACTER SET = utf8
    DEFAULT COLLATE = utf8_bin;
SQL;

            break;
        default:
            $code = ">>> $cmd --NOT RECOGNIZED--";

    }// end of case

    return $code;
}
// ====================================

function is_authorized()
{
    //if(!isset($_SESSION['user_id'])) return false;
    //$user_id = $_SESSION['user_id'];

    // do something with user_id
    return true;
}

?>
