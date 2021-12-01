window.onload=function(){


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
   
    var submit=document.querySelector("#button");
    console.log(submit);

    submit.addEventListener("click", process);
    
    function process(e){
        alpha=/^[A-Za-z]+$/ ;
        numbers=/^[0-9]+$/ ;
        alpha2=/^[0-9A-Za-z]/;
        date=/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
        emailcheck=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        let valid = 0;
        e.preventDefault();
        var fname=document.querySelector("#fname").value.trim();
        var lname=document.querySelector("#lname").value.trim();
        var dob=document.querySelector("#dob").value;
        var age=document.querySelector("#age").value.trim();
        var gender=document.querySelector("#gender").value;
        var position=document.querySelector("#position").value.trim();
        var add1=document.querySelector("#add-line1").value;
        var add2=document.querySelector("#add-line2").value;
        var city=document.querySelector("#city").value;
        var parish=document.querySelector("#parish").value;
        var email=document.querySelector('#email').value.trim();
        var phonenum=document.querySelector('#phonenum').value.trim();
    
       
        console.log(fname,lname,dob,age,gender,position,add1,add2,city,parish);

        if (!fname.match(alpha)){
            document.querySelector("#fname").style.borderColor="red";
            return;
        }
        else{
            console.log('name worked ');
            valid = valid + 1;
            document.querySelector("#fname").style.borderColor="black";
        }

        if (!lname.match(alpha)){
            document.querySelector("#lname").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#lname").style.borderColor="black";
        }

        if (!dob.match(date)){
            document.querySelector("#dob").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#dob").style.borderColor="black";
        }

        if (!age.match(numbers)){
            document.querySelector("#age").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#age").style.borderColor="black";
        }

        if (!position.match(alpha)){
            document.querySelector("#position").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#position").style.borderColor="black";
        }

        if (!add1.match(alpha2)){
            document.querySelector("#add-line1").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#add-line1").style.borderColor="black";
        }

        if (add2 == ""){   
            valid = valid+1;
        }else{
            if(!add2.match(alpha2)){
                document.querySelector("#add-line2").style.borderColor="red";
                return;
            }else{
                valid = valid + 1;
                document.querySelector("#add-line2").style.borderColor="black";
            }
        }

        if (!city.match(alpha2)){
            document.querySelector("#city").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#city").style.borderColor="black";
        }

        if (!phonenum.match(numbers)){
            document.querySelector("#phonenum").style.borderColor="red";
            return;
        }
        else{
            valid = valid + 1;
            document.querySelector("#phonenum").style.borderColor="black";
        }

        if (!email.match(emailcheck)){
            document.querySelector("#email").style.borderColor="red";
            return;
        }
        else{
            console.log('name worked '+ valid);
            valid = valid + 1;
            document.querySelector("#email").style.borderColor="black";
        }

        console.log(valid);
        if (valid == 10){
            const xhr = new XMLHttpRequest();
            console.log('worked valid = 10');
            xhr.onreadystatechange = function(){


                if(this.readyState == 4 && this.status == 200){
                    document.getElementById("show").innerHTML = this.responseText;
                    console.log('went to php');
                    console.log(this.responseText)
                    
                }
            }
        
            xhr.open('GET', 'addmembers.php?fname='+ fname + "&lname=" + lname + "&dob=" + dob + "&age=" + age + "&gender=" + gender + "&position=" + position + "&add1=" + add1 + "&add2=" + add2 + "&city=" + city + "&parish=" + parish + "&email=" + email + "&phonenum=" + phonenum, true);
            
            xhr.send();
        }

    }

}
