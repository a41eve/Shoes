const form_reg = document.forms["form_reg"];
const button = form_reg.elements["button"];

const inputArr = Array.from(form_reg);
const validInputArr = [];

inputArr.forEach((el) => {
    if (el.hasAttribute("data-reg")) {
        el.setAttribute("is-valid", "0");
        validInputArr.push(el);
    }
});

form_reg.addEventListener("input", inputHandler);
button.addEventListener("click", buttonHandler);

function inputHandler({target}) {
    if(target.hasAttribute("data-reg")) {
        inputCheck(target);
    }
}

function inputCheck (el) {
    const inputValue = el.value;
    const inputReg = el.getAttribute("data-reg");
    const reg = new RegExp(inputReg);
    if (reg.test(inputValue)) {
        el.style.borderBottom = "1px solid rgb(0, 196, 0)";
        el.setAttribute("is-valid", "1");
    } else {
        el.style.borderBottom = "1px solid rgb(255, 0, 0)";
        el.setAttribute("is-valid", "0");
    }
}

function buttonHandler (e) {
    const isAllValid = [];
    validInputArr.forEach((el) => {
        isAllValid.push(el.getAttribute("is-valid"));
    });

    const isValid = isAllValid.reduce((acc, current) => {
        return acc && current;
    });
    if (!Boolean(Number(isValid))) {
        e.preventDefault();
    }
}