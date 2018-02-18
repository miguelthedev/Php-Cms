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


    

    // // LOADER
    // var div_box = "<div id='load-screen'><div id='loading'></div></div>";

    // $("body").prepend(div_box);

    // $('#load-screen').delay(300).fadeOut(600, function() {
    //     $(this).remove();
    // });

    //EDITOR
    ClassicEditor.create(document.querySelector('#body')).catch(error => {
        console.error(error);
    });
});

function loadUsersOnline() {
    $.get("functions.php?onlineusers=result", function(data) {
        $(".usersonline").text(data);
    });
}

setInterval(function() {
    loadUsersOnline();
},500);

