window.onload = function(){

    console.log(8)

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


//------------- Attendee List Script -------------

    //Requesting the number of members currently stored in the datatbase and displays it on the webpage
    
    const htrCount = new XMLHttpRequest();

    htrCount.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            console.log(this.responseText);
            document.getElementById("member-count").placeholder = this.responseText + " Members Currently Registered";
        }
    }

    htrCount.open("GET", "generatelist.php?mode=count");
    htrCount.send();

    let table = document.querySelector(".table");

    let generateListBtn = document.getElementById("generateList");
    let overideListBtn = document.getElementById("overrideList");
    let confirmListBtn = document.getElementById("confirmList");

    generateListBtn.addEventListener("click", btnClicked);
    overideListBtn.addEventListener("click", btnClicked);
    confirmListBtn.addEventListener("click", btnClicked);

    function btnClicked(e){

        if(e.target.id == "generateList"){

            let mode = "generate";

            amount = document.getElementById("member-count").value;

            console.log(amount)

            const htr = new XMLHttpRequest();

            htr.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    table.innerHTML = this.responseText;
                }
            }

            htr.open("GET", "generatelist.php?mode=" + mode + "&amount=" + amount);
            htr.send();


        }else if(e.target.id == "overrideList"){


        }else if(e.target.id == "confirmList"){
            console.log(e.target.id + " button pressed");

            let generatedTable = document.getElementById('generatedTable');

            attendeeList = "";

            for(i=2;i<generatedTable.rows.length;i+=2){

                console.log(generatedTable.rows.item(i).cells.item(0).innerHTML);
                id = generatedTable.rows.item(i).cells.item(0).innerHTML
                attendeeList += id.toString() + " ";

            }

            console.log(attendeeList);

            const htrID = new XMLHttpRequest();

            htrID.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){

                    document.querySelector(".List").innerHTML = this.responseText;
                }
            }

            htrID.open("GET", "confirmlist.php?ids=" + attendeeList);
            htrID.send();



        }

    }

}