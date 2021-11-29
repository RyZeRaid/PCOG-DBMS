window.onload = function(){

    let button1 = document.querySelector("#search");
    let button2 = document.querySelector("#sort");
    let logout = document.querySelector('.logout')

    button1.addEventListener("click", onClick);
    button2.addEventListener("click", onClick);
    

    logout.addEventListener("click", Click);

    function Click(e){
        window.location.href = "logout.php";
    }


    function onClick(e){
        let response = document.querySelector("#text").value;

        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("table").innerHTML = this.responseText;
            }
        }
        if(e.target.id === "search"){
            xhr.open('GET', 'members.php?member='+response+"&context", true);
        }else if (e.target.id === "sort"){
            //xhr.open('GET', 'world.php?country='+response+"&context=cities", true);
        }
        
        xhr.send();
    }
}