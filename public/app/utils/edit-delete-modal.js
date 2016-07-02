

function showEditModal(id) {

    if (debug) {
        console.log("showEditModal().id: " + id);
    }
    
    setTimeout(function() {
        $('#editModal').modal('show');
    }, 230);


}

