function createPopUpContainer(id, title, content)
{
    let container = document.createElement('div');
    container.classList.add('displayNone');
    container.classList.add('popUpContainer');
    container.appendChild(createdPopUpWindow(id, title, content));
    container.appendChild(createdEditForm(title, content));
    container.appendChild(createButtonClose());
    container.appendChild(createButtonBack());
    return container;
}

function createdPopUpWindow(id, title, content)
{
    let div = document.createElement('div');
    div.classList.add('displayShow');
    div.classList.add('popUpWindow')
    div.appendChild(popUpItem(title, 'titleText'));
    div.appendChild(popUpItem(content, 'contentText'));
    div.appendChild(createButtonEditNote());
    return div;
}

function popUpItem(date, className)
{
    let div = document.createElement('div');
    div.classList.add(className);
    div.textContent = `${date}`;
    return div;
}

function createButtonEditNote()
{
    let button = document.createElement('button');
    button.setAttribute('id', 'editNote');
    button.classList.add('editNote');
    button.textContent = 'Edit';
    return button;
}

function createButtonClose()
{
    let button = document.createElement('button');
    button.setAttribute('id', 'close');
    button.classList.add('close');
    button.textContent = 'Close';
    button.type = 'submit';
    return button;
}

function createButtonBack()
{
    let button = document.createElement('button');
    button.setAttribute('id', 'back');
    button.classList.add('back');
    button.classList.add('displayNone');
    button.textContent = 'Back';
    return button;
}