window.onload = function(){

    let viewDatabase = document.querySelector('#viewDatabase')
    let addMember = document.querySelector('#addMember')
    let generateAttendee = document.querySelector('#generateAttendee')
    let viewArchive = document.querySelector('#viewArchive')
    let confirmAttendees = document.querySelector('#confirmAttendees')
    let logout = document.querySelector('.logout')

    logout.addEventListener("click", clicked);
    viewDatabase.addEventListener("click", onClick);
    addMember.addEventListener("click", onClick);
    generateAttendee.addEventListener("click", onClick);
    viewArchive.addEventListener("click", onClick);
    confirmAttendees.addEventListener("click", onClick);

    function onClick(e){

        if (e.target.id === "viewDatabase"){
            window.location.href = "memberslist.php";
        }else if (e.target.id === "generateAttendee"){
            window.location.href = "Attendee-List.php";
        }else if (e.target.id === "addMember") {
            window.location.href = "add-members.php";
        }
    }

    function clicked(e){
        window.location.href = "logout.php";
    }
}