function createAddNoteFormContainer()
{
    let container = document.createElement('div');
    container.classList.add('addContainer');
    container.appendChild(createAddNoteForm());
    document.body.appendChild(container);
}

function createAddNoteForm()
{
    let form = document.createElement('form');
    form.setAttribute('id', 'addNote');
    form.setAttribute('action', '/');
    form.appendChild(createInput('Enter the title', 'title'));
    form.appendChild(createInput('Enter the content', 'content'));
    form.appendChild(createButtonAN());
    form.classList.add('addNoteForm');
    return form;
}

function createInput(placeholderMessage, name)
{
    let input = document.createElement('input');
    input.required = true;
    input.type = 'text';
    input.name = name;
    input.placeholder = placeholderMessage;
    return input;
}

function createButtonAN()
{
    let button = document.createElement('button');
    button.setAttribute('class', 'addNote');
    button.textContent = 'Add note';
    button.type = 'submit';
    return button;
}

createAddNoteFormContainer();



