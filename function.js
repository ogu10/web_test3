function checkName() {
    const name = document.getElementById("name");
    const button = document.getElementById("button");
    if (name.value && name.value.length) {
        button.disable = true;
    } else {button.disabled = false;}
}