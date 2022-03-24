$(document).ready (
    function () {
        $('#addNote').submit(function(e) {
            e.preventDefault();
            let form = $(this);
            let formData = form.serialize();
            $.ajax({
                type: "POST",
                data: formData,
                url: 'api/note',
            });
        });
        $.ajax({
            type: "GET",
            dataType: "json",
            url: "api/note",
            success: function (response) {
                let notes = response.notes;
                for(let i = 0; i < notes.length; i++) {
                    console.log(notes[i].title);
                }
            }
        });
    }
)
