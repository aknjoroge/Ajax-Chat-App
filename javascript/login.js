


const form = document.getElementById('form_one');
form.onsubmit = (e)=>{
  e.preventDefault();
}
errorText = document.getElementById('1error-text');

function Verify_login(){ 
 
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/login.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
            let data = xhr.response;
            if(data === "success"){
              location.href = "home.php";
            }else{
               errorText.style.display = "block";
              errorText.textContent = data;
            }
        }
    }
  }
  let formData = new FormData(form);
  xhr.send(formData);

}

