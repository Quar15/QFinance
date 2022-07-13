var popup = document.querySelector("#item-panel-popup");
var itemForm = popup.querySelector("form");
var itemFormHeader = popup.querySelector("h2");
var itemIDInput = itemForm.querySelector("#id");
var popupExit = popup.querySelector("#close-popup")

function FindAndChangeFormInputValue(selector, value)
{
    formEl = itemForm.querySelector(selector);
    if(formEl)
        formEl.value = value;
}

function UpdateForm(itemID, formAction, header, itemName, itemValue, itemCategory)
{
    console.log(itemID, formAction, header, itemName, itemValue, itemCategory);

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