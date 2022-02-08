const form = document.querySelector(".typing-area"),
incoming_id = form.querySelector(".incoming_id").value,
inputField = document.getElementById("sendmessageinput"),
sendBtn = document.getElementById("sendMessage"),
chatBox = document.getElementById("chat-box"),
chatBox2 = document.getElementById("chat-box2");

var run=0;

var audiosend = new Audio('assets/sendtone.mp3');
var audioreceive = new Audio('assets/receivetone.mp3');


//custom variables
var personal_send = false;
var i = 0;
var first_data, second_data;


form.onsubmit = (e)=>{
    e.preventDefault();
}

inputField.focus();
inputField.onkeyup = ()=>{

    if(inputField.value != ""){
        sendBtn.classList.remove("active-state");
       
    }else{
      
        sendBtn.classList.add("active-state");
        
    }
}

sendBtn.onclick = ()=>{
    var el = $("#sendmessageinput").emojioneArea( { search: false });
    // var html = el.data("emojioneArea").getText();
    var html = el.data("emojioneArea").editor.html();

    if(html == ""){
        throw new Error("Main Text Field is empty");
    }
    document.getElementById("sendmessageinputValue").value = html;
     
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insert-chat.php", true);
    el.data("emojioneArea").setText("");
   // $(".emojionearea-editor").html('');
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
            
              audiosend.play();
             
              personal_send=true;
              scrollToBottom();
          }
      }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}
chatBox.onmouseenter = ()=>{
     chatBox.classList.add("activkkkke");
}

chatBox.onmouseleave = ()=>{
 chatBox.classList.remove("active");
}


//over ride checking chat function to only update when user is online
function checkChats(){
    let xhr = new XMLHttpRequest(); //creating new XML object
    xhr.open("GET", "https://jsonplaceholder.typicode.com/posts", true); //sending get request on this URL
    xhr.onload = ()=>{ //once ajax loaded
        //if ajax status is equal to 200 or less than 300 that mean user is getting data from that provided url
        //or his/her response status is 200 that means he/she is online
        if(xhr.status == 200 && xhr.status < 300){

            let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/get-chat.php", true); 
            xhr.onload = ()=>{    
              if(xhr.readyState === XMLHttpRequest.DONE){
                  if(xhr.status === 200){
                      if(i == 0){
                          //alert("first");
                           first_data =xhr.response;
                           chatBox.innerHTML= first_data;
                           scrollToBottom();
                          i++;
                      }
                       second_data =xhr.response;
                       if(!(second_data == first_data)){
                        first_data =xhr.response;
                        chatBox.innerHTML= first_data;
                        //send notification
                        if(!(personal_send)){
                        audioreceive.play();
                        notifyuser();
                        }
                        scrollToBottom();    
                        personal_send =false;         
                       }
                    if(!chatBox.classList.contains("active")){      
                      }
                  }
              }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("incoming_id="+incoming_id);

  
        }else{ }
    }
    xhr.onerror = ()=>{ }
    xhr.send(); //sending get request to the passed url
  } 

  setInterval(()=>{ //this setInterval function call ajax frequently after 100ms
    checkChats();
  }, 1000);




if(run==0){
    let xhr = new XMLHttpRequest();
            xhr.open("POST", "php/get-chat.php", true); 
            xhr.onload = ()=>{    
              if(xhr.readyState === XMLHttpRequest.DONE){
                  if(xhr.status === 200){
                      if(i == 0){
                          //alert("first");
                           first_data =xhr.response;
                           chatBox.innerHTML= first_data;
                           scrollToBottom();
                          i++;
                      }
                       second_data =xhr.response;
                       if(!(second_data == first_data)){
                        first_data =xhr.response;
                        chatBox.innerHTML= first_data;
                        //send notification
                        if(!(personal_send)){
                        audioreceive.play();
                        notifyuser();
                        }
                        scrollToBottom();    
                        personal_send =false;         
                       }
                    if(!chatBox.classList.contains("active")){      
                      }
                  }
              }
            }
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.send("incoming_id="+incoming_id);
            run++;

}


/* ORIGINAL CHECK CHAT FUNCTION
setInterval(() =>{
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true); 
    xhr.onload = ()=>{    
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              if(i == 0){
                  //alert("first");
                   first_data =xhr.response;
                   chatBox.innerHTML= first_data;
                   scrollToBottom();
                  i++;
              }
               second_data =xhr.response;
               if(!(second_data == first_data)){
                first_data =xhr.response;
                chatBox.innerHTML= first_data;
                //send notification
                if(!(personal_send)){
                audioreceive.play();
                notifyuser();
                }
                scrollToBottom();    
                personal_send =false;         
               }
            if(!chatBox.classList.contains("active")){      
              }
          }
      }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send("incoming_id="+incoming_id);
}, 1000);

*/



function scrollToBottom(){
    chatBox.scrollTop = chatBox.scrollHeight;
    chatBox2.scrollTop = chatBox.scrollHeight;
   
  }
  
function scroll_down(){
    chatBox.scrollTop = chatBox.scrollHeight;
    chatBox2.scrollTop = chatBox.scrollHeight;
}  

function notifyuser(){

    var k, f = -1,
        m = 0;
        var duration ='500';
        var HideDuration ='1000';
        var timeout ='0';
        var extendedTimeout ='1000';
        var showEasing= 'swing';
        var hideEasing= 'linear';
        var showMethod= 'fadeIn';
        var hideMethod= 'fadeOut';
        
            //code start
            var t, o, e = 'info', //info - success - warning - error
            a = 'you have a new message',
            n = 'success',
            s = duration,
            i = HideDuration,
            r = timeout,
            l = extendedTimeout,
            c = showEasing,
            p = hideEasing,
            d = showMethod,
            h = hideMethod,
            u = m++,
            g = $('#addClear').prop('checked');
    
            toastr.options = {
            closeButton: $('#closeButton').prop('checked'),
            debug: $('#debugInfo').prop('checked'),
            newestOnTop: $('#newestOnTop').prop('checked'),
            progressBar: true,
            positionClass: $('#positionGroup input:radio:checked').val() || 'toast-top-right',
            preventDuplicates: $('#preventDuplicates').prop('checked'),
            onclick: null
            }
            , $('#addBehaviorOnToastClick').prop('checked') && (toastr.options.onclick = function() {
            alert('You can perform some custom action after a toast goes away')
            }), 300 && (toastr.options.showDuration = duration), HideDuration && (toastr.options.hideDuration = HideDuration), timeout && (toastr.options.timeOut = g ? 0 : timeout), extendedTimeout && (toastr.options.extendedTimeOut = g ? 0 : extendedTimeout), showEasing && (toastr.options.showEasing = showEasing), hideEasing && (toastr.options.hideEasing = hideEasing), showMethod && (toastr.options.showMethod = showMethod), hideMethod && (toastr.options.hideMethod = hideMethod), g && (t = (t = a) || '', a = t += '', toastr.options.tapToDismiss = !1), a || (++f === (o = ['', '', 'aq!', '', '']).length && (f = 0), a = o[f]), $('#toastrOptions').text('hi');
            var v = toastr[e](a, n);
            void 0 !== (k = v) && (v.find('#okBtn').length && v.delegate('#okBtn', 'click', function() {
            alert('you clicked me. i was toast #' + u + '. goodbye!'), v.remove()
            }), v.find('#surpriseBtn').length && v.delegate('#surpriseBtn', 'click', function() {
            alert('Surprise! you clicked me. i was toast #' + u + '. You could perform an action here.')
            }), v.find('.clear').length && v.delegate('.clear', 'click', function() {
            toastr.clear(v, {
                force: !0
            })
            }))
}


