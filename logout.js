window.onload = function(){

    let logout = document.querySelector('.logout')

    logout.addEventListener("click", onClick);

    function onClick(e){
        window.location.href = "logout.php";
    }
}