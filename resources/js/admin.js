let checkbox = document.querySelector("#available");

if(checkbox.value != null && checkbox.value == true){
    checkbox.checked = true;
}else{
    checkbox.checked = false;
}
