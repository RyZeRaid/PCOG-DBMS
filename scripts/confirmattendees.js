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
                let button2 = document.querySelector("#add");
                button2.addEventListener("click", onClick)

                
            }
        }
        if(e.target.id === "search"){
            xhr.open('GET', "scripts/confirmattendees.php?context=" + "search", true);
        
            xhr.send();
            return;
        }else if(e.target.id === "add")
        {
                //Reference the Table.
            var grid = document.getElementById("Table1");
    
            //Reference the CheckBoxes in Table.
            var checkBoxes = grid.getElementsByTagName("INPUT");
            
    
            //Loop through the CheckBoxes.
            for (var i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                    var values = (checkBoxes[i].value).split(',');
                    check.push(values[0]);
                    pri.push(values[1]);
                }
            }
            JSON.stringify(check);
            xhr.open('GET', "scripts/confirmattendees.php?context=" + "add" +"&members_approved=" + check +"&priority=" + pri, true);
        
            xhr.send();
            return;

        }
    }
 
    
}
