window.onload = function(){

    let login = document.querySelector("#btn");
    let error = document.querySelector(".error")
    let error1 = document.querySelector(".error1")

    login.addEventListener("click", onClick);

    function onClick(e) {
        let valid = 0;

        let username = document.querySelector("#username").value
        let password = document.querySelector("#password").value


        if (username === ""){
            error.innerHTML = "*Please enter username"
        }else {
            valid += 1;
            error.innerHTML = ""
        }

        if (password === ""){
            error1.innerHTML = "*Please enter password"
        }else {
            valid += 1;
            error1.innerHTML = ""
        }


        if (valid == 2){
            const xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function(){


                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("show").innerHTML = this.responseText;

                    console.log(this.responseText)

                    
                    window.location.href = "HomeScreen.php";
                    

                }
            }
            xhr.open('GET', 'login.php?user='+ username + " " + password, true);
            
            xhr.send();
        }

    }
}