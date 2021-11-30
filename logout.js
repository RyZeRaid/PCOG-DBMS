window.onload = function(){

    console.log(8)

    let logout = document.querySelector('.logout')

    logout.addEventListener("click", Click);

    function Click(e){
        window.location.href = "logout.php";
    }

    //Attendee List Script

    const htrCount = new XMLHttpRequest();

    htrCount.onreadystatechange = function(){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById("member-count").innerHTML = this.responseText;
        }
    }

    htrCount.open("GET", "attendeelist.php?mode=count");
    htrCount.send();

    console.log(5)

    let generateListBtn = document.getElementById("generateList");
    let overideListBtn = document.getElementById("overrideList");
    let confirmListBtn = document.getElementById("confirmList");

    generateListBtn.addEventListener("click", btnClicked);
    overideListBtn.addEventListener("click", btnClicked);
    confirmListBtn.addEventListener("click", btnClicked);

    function btnClicked(e){

        if(e.target.id == "generateList"){

            console.log("Button Press: " + e.target.id)

            let mode = "generate"

            const htr = new XMLHttpRequest();

            htr.onreadystatechange = function(){
                if(this.readyState == 4 && this.status == 200){
                    document.querySelector(".table").innerHTML = this.responseText;
                }
            }

            htr.open("GET", "attendeelist.php?mode="+mode);
            htr.send();

        }else if(e.target.id == overrideList){


        }else if(e.target.id == confirmList){

        }

    }

}