<?
   $dsn="mysql:host=localhost;dbname=blog";
   $db=new PDO($dsn,'root','');
   $db->query('set names utf8');
?>