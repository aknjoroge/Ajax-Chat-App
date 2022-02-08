
const pswrdField = document.getElementById('password_field'),
  toggleIcon = document.getElementById('pass_reveal');

toggleIcon.onclick = () =>{

  if(pswrdField.type === "password"){
    pswrdField.type = "text";
    toggleIcon.classList.add("active");
  }else{
    pswrdField.type = "password";
    toggleIcon.classList.remove("active");
  }
  
}



const field = document.getElementById('password_field2'),
  icon = document.getElementById('pass_reveal2');

icon.onclick = () =>{

  if(field.type === "password"){
    field.type = "text";
    icon.classList.add("active");
  }else{
    field.type = "password";
    icon.classList.remove("active");
  }
  
}
