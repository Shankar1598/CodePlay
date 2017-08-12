<?php

require_once('connect.php');
    

    $qid=$_GET['qid'];
    
    $sql="SELECT * FROM questions WHERE id=$qid";
    $res=mysqli_query($conn,$sql);
    if($res){
        $r=mysqli_fetch_assoc($res);
        @$qar->question=$r['question'];
        $qar->op1=$r['op1'];
        $qar->op2=$r['op2'];
        $qar->op3=$r['op3'];
        $qar->op4=$r['op4'];
        $qar->crt=$r['crt'];
        $json=json_encode($qar);
        
        //$qid++; //To be changed to random number
        
        die($json);
    }

?>