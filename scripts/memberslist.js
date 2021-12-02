window.onload = function(){

    let button1 = document.querySelector("#search");
    let button2 = document.querySelector("#sort");
    let button3 = document.querySelector("#des");

    button1.addEventListener("click", onClick);
    button2.addEventListener("click", onClick);
    button3.addEventListener("click", onClick);
    

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
        let response = document.querySelector("#text").value;
        let radios = document.getElementsByName('f');


        for (var i = 0, length = radios.length; i < length; i++) {
            if (radios[i].checked) {
                let option  = radios[i].id;  
                
                const xhr = new XMLHttpRequest();

                xhr.onreadystatechange = function(){
                    if(this.readyState == 4 && this.status == 200){
                        document.getElementById("table").innerHTML = this.responseText;
                    }
                }
                if(e.target.id === "search"){
                    xhr.open('GET', 'members.php?member='+response+"&option="+option+"&context=search", true);
                }else if (e.target.id === "sort"){
                    xhr.open('GET', 'members.php?member='+response+"&option="+option+"&context=sort", true);
                }else if (e.target.id === "des"){
                    xhr.open('GET', 'members.php?member='+response+"&option="+option+"&context=des", true);
                }
                xhr.send();
                return;
            }
        }

        
        if(e.target.id === "sort" && response === ""){
            document.getElementById("table").innerHTML = "Please Select a Sort key";
        }
        if(e.target.id === "des" && response === ""){
            document.getElementById("table").innerHTML = "Please Select a Sort key";
        }

        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                document.getElementById("table").innerHTML = this.responseText;
            }
        }
        if(e.target.id === "search" && response === ""){
            xhr.open('GET', 'members.php?member='+response+"&context=search"+"&option", true);
        }else if (e.target.id === "search" && response !== "") {
            document.getElementById("table").innerHTML = "Please Select a Search key";
        }
        
        xhr.send();
    }
    
}