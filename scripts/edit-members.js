window.onload=function(){
    var btn=document.querySelector("#editInfo");
    console.log(btn);

    var btn2=document.querySelector("#button");
    console.log(btn2);

    var dlt=document.querySelector("#dlt");
    console.log(dlt);

    btn.addEventListener("click", editClick);
    numbers=/^[0-9]+$/;

    function editClick(){
        var txt=document.getElementById("text").value.trim();
        console.log(txt);

        if (!txt.match(numbers)){
            document.getElementById("text").style.borderColor="red";
            return;
        }
        else{
            document.getElementById("text").style.borderColor="black";
        }
        
        document.getElementById("edit").style.display="contents";

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){


            if(this.readyState == 4 && this.status == 200){
                document.getElementById("table").innerHTML = this.responseText;
            }
        }
    
        xhr.open('GET', 'scripts/edit-members.php?id='+txt+"&fname=&lname=&dob=&age=&gender=&position=&add1=&add2=&city=&parish=&email=&phonenum=&context=find", true);
        xhr.send();
    }

    btn2.addEventListener("click",enter);

    function enter(e){
        alpha=/^[A-Za-z]+$/ ;
        numbers=/^[0-9]+$/ ;
        alpha2=/^[0-9A-Za-z]/;
        date=/([12]\d{3}-(0[1-9]|1[0-2])-(0[1-9]|[12]\d|3[01]))/;
        emailcheck=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
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
    
       
        console.log(fname,lname,dob,age,gender,position,add1,add2,city,parish,email,phonenum);
        if (fname!=""){
            if (!fname.match(alpha)){
                document.querySelector("#fname").style.borderColor="red";
                return;
            }
            else{
                console.log('name worked ');
                
                document.querySelector("#fname").style.borderColor="black";
            }
        }   

        if (lname!=""){
            if (!lname.match(alpha)){
                document.querySelector("#lname").style.borderColor="red";
                return;
            }
            else{
                
                document.querySelector("#lname").style.borderColor="black";
            }
        }

        if (dob!=""){
            if (!dob.match(date)){
                document.querySelector("#dob").style.borderColor="red";
                return;
            }
            else{
                
                document.querySelector("#dob").style.borderColor="black";
            }
        }

        if (age!=""){
            if (!age.match(numbers)){
                document.querySelector("#age").style.borderColor="red";
                return;
            }
            else{
            
                document.querySelector("#age").style.borderColor="black";
            }
        }

        if (position!=""){
            if (!position.match(alpha)){
                document.querySelector("#position").style.borderColor="red";
                return;
            }
            else{
            
                document.querySelector("#position").style.borderColor="black";
            }
        }

        if (add1!=""){
            if (!add1.match(alpha2)){
                document.querySelector("#add-line1").style.borderColor="red";
                return;
            }
            else{
            
                document.querySelector("#add-line1").style.borderColor="black";
            }
        }

        if (add2 == ""){   
        
        }else{
            if(!add2.match(alpha2)){
                document.querySelector("#add-line2").style.borderColor="red";
                return;
            }else{
            
                document.querySelector("#add-line2").style.borderColor="black";
            }
        }

        if (city!=""){
            if (!city.match(alpha2)){
                document.querySelector("#city").style.borderColor="red";
                return;
            }
            else{
            
                document.querySelector("#city").style.borderColor="black";
            }
        }

        if (phonenum!=""){
            if (!phonenum.match(numbers)){
                document.querySelector("#phonenum").style.borderColor="red";
                return;
            }
            else{
            
                document.querySelector("#phonenum").style.borderColor="black";
            }
        }

        if (email!=""){
            if (!email.match(emailcheck)){
                document.querySelector("#email").style.borderColor="red";
                return;
            }
            else{
            
                document.querySelector("#email").style.borderColor="black";
            }
        }
        var txt=document.getElementById("text").value.trim();

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){


            if(this.readyState == 4 && this.status == 200){
                document.getElementById("table").innerHTML = this.responseText;
            }
        }
    
        xhr.open('GET', 'scripts/edit-members.php?id='+txt+"&fname="+ fname + "&lname=" + lname + "&dob=" + dob + "&age=" + age + "&gender=" + gender + "&position=" + position + "&add1=" + add1 + "&add2=" + add2 + "&city=" + city + "&parish=" + parish + "&email=" + email + "&phonenum=" + phonenum+"&context=edit", true);
            
        xhr.send();
    }
    
    dlt.addEventListener("click",dltClick);

    function dltClick(){
        var id=document.getElementById("text").value.trim();
        console.log(id);
        numbers=/^[0-9]+$/ ;
        
        if (!id.match(numbers)){
            document.getElementById("text").style.borderColor="red";
            return;
        }
        else{
            document.getElementById("text").style.borderColor="black";
        }

        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function(){


            if(this.readyState == 4 && this.status == 200){
                document.getElementById("table").innerHTML = this.responseText;
            }
        }
        xhr.open("GET", 'scripts/dlt-members.php?id='+id, true);
        xhr.send();
    }


}