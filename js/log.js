const form_log = document.forms["form_log"];
const button1 = form_log.elements["button"];

const inputArr1 = Array.from(form_log);
const validInputArr1 = [];

inputArr1.forEach((el) => {
    if (el.hasAttribute("data-reg")) {
        el.setAttribute("is-valid", "0");
        validInputArr1.push(el);
    }
});

form_log.addEventListener("input", inputHandler);
button1.addEventListener("click", buttonHandler);

function inputHandler({target}) {
    if(target.hasAttribute("data-reg")) {
        inputCheck(target);
    }
}

function inputCheck (el) {
    const inputValue1 = el.value;
    const inputReg1 = el.getAttribute("data-reg");
    const reg1 = new RegExp(inputReg1);
    if (reg1.test(inputValue1)) {
        el.style.borderBottom = "1px solid rgb(0, 196, 0)";
        el.setAttribute("is-valid", "1");
    } else {
        el.style.borderBottom = "1px solid rgb(255, 0, 0)";
        el.setAttribute("is-valid", "0");
    }
}

function buttonHandler (e) {
    const isAllValid1 = [];
    validInputArr1.forEach((el) => {
        isAllValid1.push(el.getAttribute("is-valid"));
    });

    const isValid1 = isAllValid1.reduce((acc, current) => {
        return acc && current;
    });
    if (!Boolean(Number(isValid1))) {
        e.preventDefault();
    }
}