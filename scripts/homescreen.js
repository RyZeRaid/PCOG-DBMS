window.onload = function(){

    let viewDatabase = document.querySelector('#viewDatabase')
    let addMember = document.querySelector('#addMember')
    let generateAttendee = document.querySelector('#generateAttendee')
    let viewArchive = document.querySelector('#viewArchive')
    let confirmAttendees = document.querySelector('#confirmAttendees')

    viewDatabase.addEventListener("click", onClick);
    addMember.addEventListener("click", onClick);
    generateAttendee.addEventListener("click", onClick);
    viewArchive.addEventListener("click", onClick);
    confirmAttendees.addEventListener("click", onClick);

    function onClick(e){
        if (e.target.id === "viewDatabase"){
            window.location.href = "memberslist.php";
        }
    }
}