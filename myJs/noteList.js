function createNoteContainer(response)
{
    let container = document.createElement('div');
    container.appendChild(createNoteList(response));
    container.classList.add('noteContainer');
    document.body.appendChild(container);
}

function createNoteList(response)
{
    let list = document.createElement('ol');
    renderNoteList(list, response);
    list.classList.add('noteList');
    return list;
}

function renderNoteList(list, response)
{
    let notes = response.notes;
    for(let i = 0; i < notes.length; i++) {
        let title = notes[i].title;
        let content = notes[i].content;
        let created = notes[i].created.date;
        let id = notes[i].id;
        list.appendChild(createNoteItem(id, title, content, created));
    }
}

function createNoteItem(id, title, content, created)
{
    let item = document.createElement('li');
    item.classList.add('noteItem');
    item.setAttribute('class', `noteItem`);
    item.setAttribute('noteId', `${id}`);
    item.appendChild(textContent(title, 'titleText'));
    item.appendChild(textContent(created, 'dateText'));
    item.appendChild(createButtonDelete());
    item.appendChild(createButtonRead());
    item.appendChild(createPopUpContainer(id, title, content));
    return item;
}

function createButtonDelete()
{
    let button = document.createElement('button');
    button.setAttribute('class', 'deleteNote');
    button.setAttribute('id', 'deleteNote');
    button.textContent = 'Delete';
    button.type = 'submit';
    return button;
}

function createButtonRead()
{
    let button = document.createElement('button');
    button.setAttribute('class', 'readNote');
    button.setAttribute('id', 'readNote');
    button.textContent = 'Read';
    button.type = 'submit';
    return button;
}

function textContent(data, className)
{
    let span = document.createElement('span');
    span.classList.add(className);
    span.textContent = `${data} `;
    return span;
}