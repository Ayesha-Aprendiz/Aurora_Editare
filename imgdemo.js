let uploadButton = document.querySelector(".uploadButton");
let uploadForm = document.querySelector(".uploadForm");
uploadButton.addEventListener("change",()=>{
    alert("Submit");
    uploadForm.submit();
    fetch('uploadFun.php');
})