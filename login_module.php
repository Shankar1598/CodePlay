<?php
    session_start();
    require_once('connect.php');
    
    
    if($_SERVER['REQUEST_METHOD']=='GET'){
        $user=htmlentities($_GET['userid']);
        $pass=htmlentities($_GET['pass']);
        if(!empty($user)&&!empty($pass)){
            
            $sql="SELECT * FROM login WHERE userid='$user'";
            $res=mysqli_query($conn,$sql);
            if(mysqli_num_rows($res)>0){
                $r=mysqli_fetch_assoc($res);
                if($r['password']==$pass){
                    $_SESSION['userid']=$user;
                    session_write_close();
                    die('success');
                } else{
                    die('nope');
                }
            }
        }
    }
?>