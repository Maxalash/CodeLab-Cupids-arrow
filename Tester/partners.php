<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}

require_once "db_connection.php";
$link=OpenCon();

$id=$_SESSION["id"];
$sql="SELECT DISTINCT `friend_id`FROM `friends` WHERE `person_id`=".$id.";";

$result = mysqli_query($link, $sql);

$friend_ids=array();
$i=0;
/* извлечение ассоциативного массива */
while ($row = mysqli_fetch_assoc($result)) {
    $friend_ids[$i]=$row["friend_id"];
    $i++;
}
$i=0;
$frname=array(array());
foreach($friend_ids as &$frid){
    $sql="SELECT `name`FROM `personal` WHERE `id`=".$frid.";";
    $stmt = mysqli_prepare($link, $sql);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if(mysqli_stmt_num_rows($stmt) == 1){                    
        // Bind result variables
        mysqli_stmt_bind_result($stmt,$name);
        if(mysqli_stmt_fetch($stmt)){
            $frname[$i][0]=$name;
            $frname[$i++][1]=$frid;
        }
    } else{
        echo '<script language="javascript">';
                echo 'alert("Binding parameters failed:")';
                echo '</script>';
    }
}
$chattings=array(array(array()));
$j=$i=0;
foreach($friend_ids as &$frid){
    $sql="SELECT `conversation`,`sent_time` FROM `friends` WHERE `person_id`=".$id." AND `friend_id`=".$frid.";";
    $ch = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($ch)) {
        $chattings[$i][$j][0]=$row["conversation"];
        $chattings[$i][$j][1]=$row["sent_time"];
        $chattings2[$i][$j][2]=$id;
        $chattings[$i][$j++][3]=$frid;
    }
    $i++;
    $j=0;
}
$chattings2=array(array(array()));
$j=$i=0;
foreach($friend_ids as &$frid){
    $sql="SELECT `conversation`,`sent_time` FROM `friends` WHERE `person_id`=".$frid." AND `friend_id`=".$id.";";
    $ch = mysqli_query($link, $sql);
    while ($row = mysqli_fetch_assoc($ch)) {
        $chattings2[$i][$j][0]=$row["conversation"];
        $chattings2[$i][$j][1]=$row["sent_time"];
        $chattings2[$i][$j][2]=$frid;
        $chattings2[$i][$j++][3]=$id;
    }
    $i++;
    $j=0;
}




    $link->close();

?>

<!DOCTYPE html>
<html>
<head>
	<title>	Partners</title>
	<link rel="shortcut icon" type="image/png" href="images/Heart.png" />
	<link rel="stylesheet" type="text/css" href="css/partners.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>	
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script type="text/javascript"></script>
</head>
<body>
<div id="main">
        
    <div id="allfriends" class="container">
        <article class="friendline">
            <section class="headernamepart" id="7">
                <h1 class="friendname">Makhmoud</h1>
                <div class="delFriend">delete</div>
            </section>
            <div class="chatdata" style="display: block;">
                <div class="chatdatascroller" id="chat7">
                    <div class="sendedmessage">Ah Hiiiii</div>
                    <div class="sendedmessage">Iam good, im good</div>
                    <div class="sendedmessage">What about you?</div>
                    <div class="sendedmessage">Hey dude what r doin?</div>
                    <div class="sendedmessage">i am fine</div>
                </div>
                <form class="messaging">
                    <textarea class="chatting" name="chatting" id="text7" placeholder="message..."></textarea>
                    <div class="sendmessage"><img src="images/sentmessagecup.png" width="100%" onclick="sendmessage('text7','chat7','7')"></div>
                </form>
            </div>
        </article>
    </div>
</div>


	<script>
$(document).ready(function(){
    <?php
        foreach($frname as &$nm){
            
            echo 'createFriendElement("'.$nm[0].'","'.$nm[1].'");';
            
        }
        
        $sen=$rec=$frids=0;

        while($frids<count($friend_ids)){
            $l1=count($chattings[$frids]);
            $l2=count($chattings2[$frids]);
            $n=$l1+$l2;
            while($n-->1){
                if(empty($chattings2[$frids][$rec])!=1){
                    // echo 'alert("They send to you");';
                    if($sen==$l1){
                        echo 'receivemessage("chat'.$chattings2[$frids][$rec][2].'","'.$chattings2[$frids][$rec++][0].'");';
                    }
                    else if($rec==$l2){
                        echo 'sentmessage("chat'.$chattings[$frids][$sen][3].'","'.$chattings[$frids][$sen++][0].'");';
                    }
                    else{
                        if(strcmp(strtotime($chattings[$frids][$sen][1]),strtotime($chattings2[$frids][$rec][1]))<0){
                            echo 'sentmessage("chat'.$chattings[$frids][$sen][3].'","'.$chattings[$frids][$sen++][0].'");';
                            // echo 'alert("send first to receive");';
                            // $sen++;
                        }
                        else if(strcmp(strtotime($chattings[$frids][$sen][1]),strtotime($chattings2[$frids][$rec][1]))>0){
                            echo 'receivemessage("chat'.$chattings2[$frids][$rec][2].'","'.$chattings2[$frids][$rec++][0].'");';
                            // echo 'alert("send second to receive");';
                            // $rec++;
                        }else{
                            echo 'sentmessage("chat'.$chattings[$frids][$sen][3].'","'.$chattings[$frids][$sen++][0].'");';
                            echo 'receivemessage("chat'.$chattings2[$frids][$rec][2].'","'.$chattings2[$frids][$rec++][0].'");';
                            // echo 'alert("send equal receive");';
                            // $sen++;
                            // $rec++;
                        }
                    }


                }else {
                    // $rec++;
                    echo 'sentmessage("chat'.$chattings[$frids][$sen][3].'","'.$chattings[$frids][$sen++][0].'");';
                    // echo 'alert("there no message from them");';
                    // $sen++;
                }

            }
            $sen=$rec=0;
            $frids++;
        }
        
        // foreach($chattings as &$chat){
        //     foreach($chat as &$chard){
            
        //     echo 'sentmessage("chat'.$chard[3].'","'.$chard[0].'");';
            
        //     }
        // }

        // for($o=0;$o<count($chattings2);$o++){
        //     for($b=0;$b<count($chattings2[$o]);$b++){
        //         if(!empty($chattings2[$o][$b])){

        //             echo 'receivemessage("chat'.$chattings2[$o][$b][2].'","'.$chattings2[$o][$b][0].'");';
    
        //         }else continue;               
        //     }

        // }
        // foreach($chattings2 as &$chatter){
        //     foreach($chatter as &$chare){
        //         // if($chare[0]=="")continue;
        //         // else 
        //             echo 'receivemessage("chat'.$chare[2].'","'.$chare[0].'");';
        //     }
        // }


        // $p=0;
        // foreach($number as &$num){
        //     $c=$r=0;
        //     for($l=0;$l<$num;$l++){
        //         if(strcmp($chattings[$p][$sen][1],$chattings2[$p][$rec][1])<0){
        //             echo 'sentmessage("chat'.$chattings[$p][$sen][3].'","'.$chattings[$p][$sen][0].'");';
        //             $c++;
        //         }
        //         else if(strcmp($chattings[$p][$sen][1],$chattings2[$p][$rec][1])>0){
        //             echo 'receivemessage("chat'.$chattings2[$p][$rec][2].'","'.$chattings2[$p][$rec][0].'");';
        //             $r++;
        //         }else{
        //             echo 'sentmessage("chat'.$chattings[$p][$sen][3].'","'.$chattings[$p][$sen][0].'");';
        //             echo 'receivemessage("chat'.$chattings2[$p][$rec][2].'","'.$chattings2[$p][$rec][0].'");';
        //             $c++;
        //             $r++;
        //         }
        //     }
        //     $p++;
        // }
    ?>
});
// $(document).ready(function(){
//     createFriendElement("max",4);
// });
	// -----------------togglers------------------

    $('body').on('click', '.headernamepart', function(){
        $(this).siblings(".chatdata").slideToggle(500);
        scr=$(this).siblings(".chatdata").find(".chatdatascroller");
        $(this).siblings(".chatdata").find(".chatting").focus();
        var divka = document.createElement("div");
        divka.setAttribute("class","sendedmessage");
        divka.innerHTML=text;
        // scr.appendChild(divka);
    });

    // $("#allfriends").on("click", "div.headernamepart", function() {
    //     $("div.chatdata")[index].slideToggle(500);
    // });

    // $(".headernamepart").on("click", function() {
    //     $("div.chatdata")[index].slideToggle(500);
    // });

    // var friends=allFriends.children;
	// friends.forEach(item => {
    //     $(item).find('.headernamepart').addEventListener('click', event => {
    //         next=item.nextElementSibling;
    //         $(next).slideToggle(500);
    //     })
    // })

      // --------------------functioons----------------

      function createFriendElement(frname,index){
    var indexchat="chat"+index;
    var indextext="text"+index;
    var main=document.createElement("article");
    main.setAttribute("class","friendline");
    var head=document.createElement("section");
    head.setAttribute("class","headernamepart");
    head.setAttribute("id",index);
    var chat=document.createElement("div");
    chat.setAttribute("class","chatdata");
    var name=document.createElement("h1");
    name.setAttribute("class","friendname");
    var scroll=document.createElement("div");
    scroll.setAttribute("class","chatdatascroller");
    scroll.setAttribute("id",indexchat);
    var form=document.createElement("form");
    form.setAttribute("class","messaging");
    var text=document.createElement("textarea");
    text.setAttribute("class","chatting");
    text.setAttribute("name","chatting");
    text.setAttribute("id",indextext);
    text.setAttribute("placeholder","message...");
    var sendim=document.createElement("div");
    sendim.setAttribute("class","sendmessage");
    var ima=document.createElement("img");
    ima.setAttribute("src","images/sentmessagecup.png");
    ima.setAttribute("width","100%");
    ima.setAttribute("onclick","sendmessage('"+indextext+"','"+indexchat+"','"+index+"')");
    sendim.appendChild(ima);
    form.appendChild(text);
    form.appendChild(sendim);
    name.innerHTML=frname;
    head.appendChild(name);
    chat.appendChild(scroll);
    chat.appendChild(form);
    main.appendChild(head);
    main.appendChild(chat);
    document.getElementById("allfriends").appendChild(main);
	}
	function sendmessage(textid,chatid,ind){
		var text = document.getElementById(textid).value;
        
	  if(text!=""){
        $.post( "messageSender.php", { freak: ind, tesx: text },function(){      });
	 var divka = document.createElement("div");
	 divka.innerHTML=text;
	 divka.setAttribute("class","sendedmessage");
	 document.getElementById(chatid).appendChild(divka);

     document.getElementById(textid).value="";
	}
    document.getElementById(textid).focus();
	}
    function receivemessage(chatid,text){
        if(text!=""){
            var divka = document.createElement("div");
            divka.setAttribute("class","receivedmessage");
            divka.innerHTML=text;
            document.getElementById(chatid).appendChild(divka);
        }
	}
    function sentmessage(chatid,text){
        if(text!=""){
            var divka = document.createElement("div");
            divka.setAttribute("class","sendedmessage");
            divka.innerHTML=text;
            document.getElementById(chatid).appendChild(divka);
        }
	}
	</script>
</body>
</html>