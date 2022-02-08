


const form2 = document.getElementById('form_two');

form2.onsubmit = (e)=>{
  e.preventDefault();
}

errorText_two = document.getElementById('error-text2');
function signup(){ 
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/signup.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            if(data === "success"){
              location.href="home.php";
            }else{
              errorText_two.style.display = "block";
              errorText_two.textContent = data;
            }
        }
    }
  }
  let formData = new FormData(form2);
  xhr.send(formData2);

}

