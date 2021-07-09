<?php
    ob_start(); 
    session_start();
    $page_name = "delete";
    require_once "init.php";
    if(isset($_SESSION['username'])){
        if ($_GET['from'] == "members" && isset($_GET['id']) && is_numeric($_GET['id'])){
            $member_id = $_GET['id'];
            $stmt = $con->prepare("DELETE FROM members WHERE id = :member_id");
            $stmt->bindParam(":member_id" , $member_id);
            $stmt->execute();
            echo "<h3 class='alert alert-danger'>member has deleted successfuly ... you will return to previous page in 5s</h3>";
            header("refresh:2;url=members.php");
        }
        else{
            header("location:dashboard.php");
        }
    }else{
        header("location:dashboard.php");
    }
    ob_end_flush();