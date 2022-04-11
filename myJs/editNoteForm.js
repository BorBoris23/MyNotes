function createdEditForm(title, content)
{
    let form = document.createElement('form');
    form.setAttribute('id', 'editNote');
    form.setAttribute('action', '/');
    form.appendChild(createdEditInput(`${title}`, 'title', 'editTitle'));
    form.appendChild(createdEditInput(`${content}`, 'content', 'editContent'));
    form.appendChild(createButtonPatchNote());
    form.classList.add('editForm');
    form.classList.add('displayNone');
    return form;
}

function createdEditInput(date, name, className)
{
    let input = document.createElement('input');
    input.required = true;
    input.classList.add(`${className}`);
    input.setAttribute('value', '');
    input.type = 'text';
    input.name = name;
    input.placeholder = date;
    return input;
}

function createButtonPatchNote()
{
    let button = document.createElement('button');
    button.classList.add('patchNote');
    button.textContent = 'Patch';
    button.type = 'submit';
    return button;
}
