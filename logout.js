window.onload = function(){

    let logout = document.querySelector('.logout')

    logout.addEventListener("click", Click);

    function Click(e){
        window.location.href = "logout.php";
    }
}