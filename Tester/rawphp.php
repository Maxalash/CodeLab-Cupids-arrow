<?php
$ray=array(1,3,5,7,9,21,22);
$ary=array(2,4,6,8,20,21,23);
$fis=$sec=0;
$l1=count($ray);
$l2=count($ary);
$n=$l1+$l2;

// echo $l1.$l2.$n;

while($n-->1){
    echo " (indexes: ".$fis.$sec." here.) ";
    if($sec==$l2){
        echo " first condition: ".$ray[$fis++];
    }else if($fis==$l1){
        echo " second condition: ".$ary[$sec++];
    }else{
    if(strcmp($ray[$fis],$ary[$sec])<0) echo " third first condition: ".$ray[$fis++];
    else if(strcmp($ray[$fis],$ary[$sec])>0) echo " third second condition: ".$ary[$sec++];
    else {
        echo " forth condition: ".$ray[$fis++];
        echo " forth condition: ".$ary[$sec++];
    }
}
}
?>