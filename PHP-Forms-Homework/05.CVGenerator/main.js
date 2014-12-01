window.onload = init;
var languages = 1;
var computerLanguages = 1;
function init()
{
    document.getElementById('removeLanguage').onclick = RemoveLang;
    document.getElementById('addLanguage').onclick = AddLang;
    document.getElementById('removeComputerLanguage').onclick = RemoveComputerLang;
    document.getElementById('addComputerLanguage').onclick = AddComputerLang;
}

function RemoveComputerLang()
{
    if(computerLanguages > 0) {
        document.getElementById("computerLanguages").removeChild(document.getElementById("computerLanguages").lastChild);
        computerLanguages--;
    }
}

function AddComputerLang()
{
    var section = document.createElement('section');
    var input = document.createElement('input');
    var level = document.createElement('select');

    input.type = 'text';
    input.name = 'computerLanguage[]';
    input.classList.add('displayInline');

    level.name = 'computerLanguage-level[]';

    level.appendChild(createOptionElement('Beginner', 'Beginner'));
    level.appendChild(createOptionElement('Programmer', 'Programmer'));
    level.appendChild(createOptionElement('Ninja', 'Ninja'));

    section.appendChild(input);
    section.appendChild(level);

    document.getElementById("computerLanguages").appendChild(section);
    computerLanguages++;
}

function RemoveLang()
{
    if(languages > 0) {
        document.getElementById("languages").removeChild(document.getElementById("languages").lastChild);
        languages--;
    }
}

function AddLang()
{
    var section = document.createElement('section');
    var input = document.createElement('input');
    var comprehension = document.createElement('select');
    var reading = document.createElement('select');
    var writing = document.createElement('select');

    input.type = 'text';
    input.name = 'language[]';
    input.classList.add('displayInline');

    comprehension.name = 'language-Comprehension[]';
    reading.name = 'language-Reading[]';
    writing.name = 'language-Writing[]';

    comprehension.appendChild(createOptionElement('default','-Comprehension-'));
    comprehension.appendChild(createOptionElement('beginner','beginner'));
    comprehension.appendChild(createOptionElement('intermediate','intermediate'));
    comprehension.appendChild(createOptionElement('advanced','advanced'));

    reading.appendChild(createOptionElement('default','-Reading-'));
    reading.appendChild(createOptionElement('beginner','beginner'));
    reading.appendChild(createOptionElement('intermediate','intermediate'));
    reading.appendChild(createOptionElement('advanced','advanced'));

    writing.appendChild(createOptionElement('default','-Writing-'));
    writing.appendChild(createOptionElement('beginner','beginner'));
    writing.appendChild(createOptionElement('intermediate','intermediate'));
    writing.appendChild(createOptionElement('advanced','advanced'));

    section.appendChild(input);
    section.appendChild(comprehension);
    section.appendChild(reading);
    section.appendChild(writing);

    document.getElementById("languages").appendChild(section);
    languages++;
}

function createOptionElement(valueString, innerHTMLString)
{
    var temp = document.createElement('option');
    temp.value = valueString;
    temp.innerHTML = innerHTMLString;
    return temp;
}