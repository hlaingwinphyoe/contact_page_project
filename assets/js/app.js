
let btn = document.querySelector("#btn");
let sidebar = document.querySelector(".sidebar");

btn.onclick = function (){
    sidebar.classList.toggle("right");
    menuBtnChange(); //calling function
}

function menuBtnChange() {
    if(sidebar.classList.contains("right")){
        btn.classList.replace("bx-menu", "bx-menu-alt-right");
    }else {
        btn.classList.replace("bx-menu-alt-right","bx-menu");
    }
}

