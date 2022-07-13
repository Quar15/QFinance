var popup = document.querySelector("#item-panel-popup");
var itemForm = popup.querySelector("form");

var itemFormHeader = popup.querySelector("h2");
var itemIDInput = itemForm.querySelector("#id");
var itemValueInput = itemForm.querySelector('#value');

var popupExit = popup.querySelector("#close-popup")

var symbolPlus = itemForm.querySelector("#symbol-plus");
var symbolMinus = itemForm.querySelector("#symbol-minus");
var symbol = '-';

function FindAndChangeFormInputValue(selector, value)
{
    formEl = itemForm.querySelector(selector);
    if(formEl)
        formEl.value = value;
}

function UpdateForm(itemID, formAction, header, itemName, itemValue, itemCategory)
{
    //console.log(itemID, formAction, header, itemName, itemValue, itemCategory);

    if(itemID == null || !formAction)
        return;

    itemForm.action = formAction;
    itemFormHeader.innerText = header;
    itemIDInput.value = itemID;

    FindAndChangeFormInputValue("#name", itemName);
    FindAndChangeFormInputValue("#value", itemValue);
    if(itemCategory)
        FindAndChangeFormInputValue("#category", itemCategory);

    popup.classList.add("active");
}

popupExit.addEventListener('click', ()=>{
    popup.classList.remove("active");
});

itemValueInput.addEventListener('change', ()=>{
    switch (symbol) {
        case '-':
            itemValueInput.value = -Math.abs(itemValueInput.value);
            break;
        case '+':
            itemValueInput.value = Math.abs(itemValueInput.value);
            break;
        
        default:
            break;
    }
});

function ChangeSymbol(_symbol)
{
    var event = new Event('change');

    switch (_symbol) {
        case '-':
            symbolPlus.classList.remove('active');
            symbolMinus.classList.add('active');
            symbol = "-";
            itemValueInput.dispatchEvent(event);
            break;
    
        case '+':
            symbolMinus.classList.remove('active');
            symbolPlus.classList.add('active');
            symbol = "+";
            itemValueInput.dispatchEvent(event);
            break;
        
        default:
            break;
    }
}

ChangeSymbol('-');

function EditItem(itemID, formAction, header, itemName, itemValue, itemCategory)
{
    if(itemValue >= 0)
        ChangeSymbol('+');
    else
        ChangeSymbol('-');

    UpdateForm(itemID, formAction, header, itemName, itemValue, itemCategory);
}

function AddItem(formAction, header)
{
    ChangeSymbol('-');

    UpdateForm(-1, formAction, header, '', '');
}