<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>	Partners</title>
	<link rel="shortcut icon" type="image/png" href="images/Heart.png" >
	<link rel="stylesheet" type="text/css" href="css/loading-page.css">
	
	<link rel="stylesheet" type="text/css" href="css/partners.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>	
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script type="text/javascript"></script>
</head>
<body>
<script>
       
		$(window).on("load",function(){
		$(".wrap").fadeOut("slow")
    })
	
        </script>
		
<div id="main">
        
        <div id="allfriends" class="container">
            
            <!-- <div class="friendline">
                <div id="0" class="headernamepart">
                    <div class="friendicon"></div>
                    <div class="friendname">Friend Name</div>
                </div>
                <div id="chat0" class="chatdata">
                    <div class="chatdatascroller"></div>
                    <form class="messaging">
                        <textarea  id="text0" name="chatting" class="chatting" placeholder="message..." ></textarea>
                        <div class="sendmessage" ><img src="images/sentmessagecup.png" width="100%" onclick="sendmessage('text0')"></div>
                    </form>
                </div>
            </div> -->
	    </div>
        <button onclick="createFriendElement('Jasper')">Add friend</button>
</div>
	<div class = "wrap" >
	<div class="rhombus2" >
        <div class="circle21"></div>
        <div class="circle22"></div>
    </div>
	</div>
	<script>
        $(document).ready(function(){
            createFriendElement("Tamerlan");
            createFriendElement("Dias");
            createFriendElement("Max");
            
        });  

	// -----------------togglers------------------
    function scroldown(){
    var friend = document.getElementById('allfriends').children;
    $( friend ).each(function( index, element ) { // производим перебор элементов <li> коллекции jQuery
    $('.headernamepart')[index].click(function(){
        $('.chatdata')[index].slideToggle(500);
    });
    });
}

    // var friends=allFriends.children;
	// friends.forEach(item => {
    //     $(item).find('.headernamepart').addEventListener('click', event => {
    //         next=item.nextElementSibling;
    //         $(next).slideToggle(500);
    //     })
    // })

      // --------------------functioons----------------
      var index=1;
      function createFriendElement(frname){
    var indexchat="chat"+index;
    var indextext="text"+index;
    var main=document.createElement("div");
    main.setAttribute("class","friendline");
    var head=document.createElement("div");
    head.setAttribute("class","headernamepart");
    head.setAttribute("id",index);
    var chat=document.createElement("div");
    chat.setAttribute("class","chatdata");
    chat.setAttribute("id",indexchat);
    var name=document.createElement("div");
    name.setAttribute("class","friendname");
    var scroll=document.createElement("div");
    scroll.setAttribute("class","chatdatascroller");
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
    ima.setAttribute("onclick","sendmessage('"+indextext+"')");
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
    index++;

    scroldown();
	}
	function sendmessage(senttext){
		var text = document.getElementById(senttext).value;
	  if(text!=""){
	 var divka = document.createElement("div");
	 divka.innerHTML=text;
	 divka.setAttribute("class","sendedmessage")
	 document.getElementById("chatdatascroller").appendChild(divka);
		$(".chatting").val("");
	}
	  $("#chatting1").focus();
	}
	</script>
</body>
</html>