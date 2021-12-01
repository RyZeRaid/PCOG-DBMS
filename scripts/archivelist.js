window.onload = function(){

    let button1 = document.querySelector("#search");
    button1.addEventListener("click", onClick);
    var check=[];
    var pri =[];
    

    let logout = document.querySelector('.logout')
    let pcogLogo = document.querySelector('#pcog-logo')

    logout.addEventListener("click", clicked);
    pcogLogo.addEventListener("click", clicked);

    function clicked(e){
        if (e.target.id === "pcog-logo"){
            window.location.href = "HomeScreen.php";
        }else{
            window.location.href = "logout.php";
        }
        
    }


    function onClick(e){
        console.log('clicked search');

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("table").innerHTML = this.responseText;
                
            }
        }
        if(e.target.id === "search"){
            xhr.open('GET', "scripts/archivelist.php?context=" + "find", true);
        
            xhr.send();
            return;
        }
    }
 
    
}