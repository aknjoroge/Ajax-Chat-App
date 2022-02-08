
   $(document).ready(function() {

    var el = $("#sendmessageinput").emojioneArea( { search: false });

    

    
  
   });


 function chatHelper(){

  $(document).ready(function() {

    var el = $("#sendmessageinput").emojioneArea( { search: false });
    /* 
     WORKING DO NOT TOUCH
    el[0].emojioneArea.on("emojibtn.click", function(btn, event) {
      alert("hi");
    });
    --------------TEXT------------
    Var text = el.data("emojioneArea").getText();
    alert(text);
    ----------HTML----------
    var html = el.data("emojioneArea").editor.html();
    ------------ Reset Emoji field-----------
    el.data("emojioneArea").setText('');
    */
 
    var html = el.data("emojioneArea").editor.html();

    if(html == ""){
      alert("empty");
      throw new Error("Text Field is empty");
    }else{
      

      document.getElementById("sendmessageinputValue").value = html;


    }

   
  
   });
   

 }


 //var emoji_input = document.getElementsByClassName("emojionearea");
 ///var one =emoji_input[0];

 //one.setAttribute("id", "id_you_like");

//emoji_input.setAttribute("id", "id_you_like"); working



  

// When the user clicks on div, open the popup
  function myFunction() {
    var popup = document.getElementById("myPopup");
    popup.classList.toggle("show");
  }

  //Left Message Modal
function sendtoModal( messageId, messagetxt, date ){
 //var label = document.getElementById("offcanvasMessageLabel").textContent;
 document.getElementById("offcanvasMessageLabel").innerHTML = "Message ID " + messageId;
 document.getElementById("OffcanvasMessageText").innerHTML = messagetxt;
 document.getElementById("OffcanvasDate").innerHTML = date;
 document.getElementById("deleteID").value = messageId;
 document.getElementById("messageTXT").value = messagetxt;
}

//Right Message Modal
function sendtoModalRight( messageId, messagetxt, date ){
  //var label = document.getElementById("offcanvasMessageLabel").textContent;
  document.getElementById("RightoffcanvasMessageLabel").innerHTML = "Message ID " + messageId;
  document.getElementById("RightOffcanvasMessageText").innerHTML = messagetxt;
  document.getElementById("RightOffcanvasDate").innerHTML = date;
  document.getElementById("RightdeleteID").value = messageId;
  document.getElementById("RightmessageTXT").value = messagetxt;
 }


 //test of internet helper after first launch

 function ajax(){
  let xhr = new XMLHttpRequest(); //creating new XML object
  xhr.open("GET", "https://jsonplaceholder.typicode.com/posts", true); //sending get request on this URL
  xhr.onload = ()=>{ //once ajax loaded
      //if ajax status is equal to 200 or less than 300 that mean user is getting data from that provided url
      //or his/her response status is 200 that means he/she is online
      if(xhr.status == 200 && xhr.status < 300){
        let wrap =document.getElementById("internet_check");
       wrap.classList.add("hide");

      }else{
          offline(); //calling offline function if ajax status is not equal to 200 or not less that 300
      }
  }
  xhr.onerror = ()=>{
      offline(); ////calling offline function if the passed url is not correct or returning 404 or other error
  }
  xhr.send(); //sending get request to the passed url
}



function offline(){ //function for offline
  console.clear();
  let wrap =document.getElementById("internet_check");
  let toast =document.getElementById("net-toast");
  let cont =document.getElementById("net-content");
  let icon =document.getElementById("net-icon");
  let ic =document.getElementById("net-ic");
  let details =document.getElementById("details");
  let close_icon=document.getElementById("net-close-icon");
  let close_ic=document.getElementById("net-icX");

  wrap.classList.remove("hide");
  wrap.classList.add("net-wrapper");
  toast.classList.add("net-toast");
  cont.classList.add("net-content");
  icon.classList.add("icon");
  ic.classList.add("mdi","mdi-wifi-strength-off");
  details.classList.add("details");
  close_icon.classList.add("close-icon");
  close_ic.classList.add("mdi","mdi-close-thick");
  wrap.style.display="block";

}
function hide_net(){
  let wrap =document.getElementById("internet_check");
  wrap.classList.add("hide");
}

setInterval(()=>{ //this setInterval function call ajax frequently after 100ms
  ajax();
}, 5000);