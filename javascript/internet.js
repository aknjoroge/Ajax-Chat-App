
 /*Internet checker NOTE USING HELPER .JS */  

 // Selecting all required elements
 /*
 const wrapper = document.querySelector(".net-wrapper"),
 toast = wrapper.querySelector(".net-toast"),
 title = toast.querySelector("span"),
 subTitle = toast.querySelector("p"),
 wifiIcon = toast.querySelector(".icon"),
 closeIcon = toast.querySelector(".close-icon");
 
 window.onload = ()=>{
     
     function ajax(){
         let xhr = new XMLHttpRequest(); //creating new XML object
         xhr.open("GET", "https://jsonplaceholder.typicode.com/posts", true); //sending get request on this URL
         xhr.onload = ()=>{ //once ajax loaded
             //if ajax status is equal to 200 or less than 300 that mean user is getting data from that provided url
             //or his/her response status is 200 that means he/she is online
             if(xhr.status == 200 && xhr.status < 300){
                 toast.classList.remove("offline");
                 title.innerText = "You're online now";
                 subTitle.innerText = "Hurray! Internet is connected.";
                 wifiIcon.innerHTML = '<i class="uil uil-wifi"></i>';
                 closeIcon.onclick = ()=>{ //hide toast notification on close icon click
                     wrapper.classList.add("hide");
                 }
                 setTimeout(()=>{ //hide the toast notification automatically after 5 seconds
                     wrapper.classList.add("hide");
                 }, 1000);
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
          $_SESSION['first_launch']=true;  
       wrapper.classList.remove("hide");
       toast.classList.add("offline");
       title.innerText = "You're offline";
       subTitle.innerText = "Opps! No Internet. Techkey Modules unavailable ";
       wifiIcon.innerHTML = '<i class="mdi mdi-wifi-strength-off"></i>';
   }
 
     setInterval(()=>{ //this setInterval function call ajax frequently after 100ms
         ajax();
     }, 5000);
 }
 */


 
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