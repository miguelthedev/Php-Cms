$(document).ready(function() {

    //EDITOR
    ClassicEditor.create(document.querySelector('#body')).catch(error => {
        console.error(error);
    });

});

