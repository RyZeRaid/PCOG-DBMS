window.onload = function(){

    let viewDatabase = document.querySelector('#viewDatabase')
    let addMember = document.querySelector('#addMember')
    let editMember = document.querySelector('#editMember')
    let generateAttendee = document.querySelector('#generateAttendee')
    let viewArchive = document.querySelector('#viewArchive')
    let confirmAttendees = document.querySelector('#confirmAttendees')
    let logout = document.querySelector('.logout')
    let pcogLogo = document.querySelector('#pcog-logo')

    logout.addEventListener("click", clicked);
    pcogLogo.addEventListener("click", clicked);
    viewDatabase.addEventListener("click", onClick);
    addMember.addEventListener("click", onClick);
    editMember.addEventListener("click", onClick);
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
        }else if (e.target.id === "editMember") {
            window.location.href = "editmembers.php";
        }
    }

    function clicked(e){
        if (e.target.id === "pcog-logo"){
            window.location.href = "HomeScreen.php";
        }else{
            window.location.href = "logout.php";
        }
        
    }
}