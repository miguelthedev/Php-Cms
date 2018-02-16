$(document).ready(function() {

    $('#selectAllBoxes').click(function(e) {
        if(this.checked) {
            $('.checkBoxes').each(function() {
                this.checked = true;
            });
        } else {
            $('.checkBoxes').each(function() {
                this.checked = false;
            });
        }
    })


    //EDITOR
    ClassicEditor.create(document.querySelector('#body')).catch(error => {
        console.error(error);
    });

});

