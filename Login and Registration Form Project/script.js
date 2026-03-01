function showform(formId){
 document.querySelectorAll(".form-box").forEach(form=>form.classList.remove("active"));//Hide all forms first
 document.getElementById(formId).classList.add("active");


}