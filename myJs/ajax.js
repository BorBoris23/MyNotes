$(document).ready (
    function () {

        function showNotesList()
        {
            $.ajax({
                type: "GET",
                dataType: "json",
                url: "api/note",
                success: function (response) {
                    createNoteContainer(response);
                    NoteOperation();
                    let pageNumber = 1;
                    loadNotes(pageNumber);
                }
            });
        }

        function loadNotes(pageNumber)
        {
            let pageSize = 32;

            let windowHeight = $(window).height();
            let documentHeight = $(document).height();

            let block = false;
            $(window).scroll(function () {
                let scrollTop = $(window).scrollTop();
                if(windowHeight + scrollTop >= documentHeight && !block) {
                    block = true;
                    pageNumber++;
                    $.ajax({
                        type: "GET",
                        dataType: "json",
                        url: `api/note/?pageNumber=${pageNumber}&pageSize=${pageSize}`,
                        success: function (response) {
                            let notes = response.notes;
                            if(notes.length !== 0) {
                                for(let i = 0; i < notes.length;i ++) {
                                    $('.noteList').append(createNoteItem(notes[i].id, notes[i].title, notes[i].content, notes[i].created.date));
                                }
                                NoteOperation();
                                loadNotes(pageNumber);
                            }
                        }
                    });
                }
            });
        }

        function eventDeleteNote()
        {
            $('button[class=deleteNote]').on('click', $('#deleteNote'),function (e) {
                let thisNote = $(this).closest('li.noteItem')
                deleteNote(e, thisNote);
            });
        }

        function eventOpenReadNoteWindow()
        {
            $('button[class=readNote]').on('click', $('#readNote'),function () {
                let thisContainer = $(this).next('div.popUpContainer');
                thisContainer.removeClass('displayNone');
                thisContainer.addClass('displayShow');
            });
        }

        function eventCloseNoteWindow()
        {
            $('button[class=close]').on('click', function () {
                let thisContent = $(this).closest('div.popUpContainer');
                thisContent.removeClass('displayShow');
                thisContent.addClass('displayNone');
            });
        }

        function eventBackToNoteWindow()
        {
            $('button.back').on('click', $('#back'), function () {

                let editForm = $(this).siblings('form.editForm');
                editForm.removeClass('displayShow');
                editForm.addClass('displayNone');

                let thisWindow = $(this).siblings('div.popUpWindow');
                thisWindow.removeClass('displayNone');
                thisWindow.addClass('displayShow');

                let buttonClose = $(this).siblings('button.close');
                buttonClose.removeClass('displayNone');
                buttonClose.addClass('displayShow');

                let buttonBack = $(this);
                buttonBack.removeClass('displayShow');
                buttonBack.addClass('displayNone');

            });
        }

        function eventOpenPatchNoteForm()
        {
            $('button.editNote').on('click', $('#editNote'),function () {

                let popUpWindow = $(this).closest('div.popUpWindow');
                popUpWindow.removeClass('displayShow');
                popUpWindow.addClass('displayNone');

                let editForm = $(this).parent().siblings('form.editForm');
                editForm.removeClass('displayNone')
                editForm.addClass('displayShow')

                let buttonClose = $(this).parent().siblings('button.close');
                buttonClose.removeClass('displayShow');
                buttonClose.addClass('displayNone');

                let buttonBack = $(this).parent().siblings('button.back');
                buttonBack.removeClass('displayNone');
                buttonBack.addClass('displayShow');

                $('button[class=patchNote]').one('click', function () {
                    let thisNote = $(this).closest('li.noteItem');
                    patchNote(thisNote);
                });
            });
        }

        function patchNote(thisNote) {
            $('.editForm').submit(function(e) {
                e.preventDefault();
                let noteId = thisNote.attr('noteId');
                let form = $(this);
                let formData = form.serialize();
                $.ajax({
                    type: "PATCH",
                    data: formData,
                    dataType: "json",
                    url: `api/note/${noteId}`,
                    success: function (response) {
                        let note = response.notes[0];
                        thisNote.children('span.titleText').html(`${note.title} `);
                        thisNote.children('span.dateText').html(`${note.created.date} `);
                        thisNote.find('div.titleText').html(`${note.title}`);
                        thisNote.find('div.contentText').html(`${note.content}`);
                    }
                });
            })
        }

        function addNote() {
            $('#addNote').submit(function(e) {
                e.preventDefault();
                let form = $(this);
                let formData = form.serialize();
                $.ajax({
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    url: 'api/note',
                    success: function (response) {
                        let note = response.notes[0];
                        $('.noteList').append(createNoteItem(note.id, note.title, note.content, note.created.date));
                        NoteOperation();
                    }
                });
            });
        }

        function deleteNote(e, thisNote) {
            e.preventDefault();
            let noteId = thisNote.attr('noteId');
            let url = `api/note/${noteId}`;
            $.ajax({
                type: "DELETE",
                url: url,
                success: function () {
                    $(`li[noteId=${noteId}]`).remove();
                }
            });
        }

        $('button[class=addNote]').one('click', function () {
            addNote();
        });

        function NoteOperation()
        {
            eventDeleteNote();
            eventOpenReadNoteWindow();
            eventCloseNoteWindow();
            eventOpenPatchNoteForm();
            eventBackToNoteWindow();
        }
        showNotesList();
    }
)
