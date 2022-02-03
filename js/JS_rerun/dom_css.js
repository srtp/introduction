const box =  document.getElementById('box')

// เพิ่ม CSS
function addDarkMode(){
    box.classList.add("darkmode")
}

// ลบ CSS
function removeDarkMode(){
    box.classList.remove("darkmode")
}

//  Toggle css
function toggleMode(){
    box.classList.toggle("darkmode")
}

//  Compare css
function containsMode(){
    box.classList.toggle("darkmode")
    
    if(box.classList.contains("darkmode")){
        box.style.color="yellow";
    }else{
        box.style.color="red";
    }
 
}