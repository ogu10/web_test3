function checkName() {
    const name = document.getElementById("name");
    const button = document.getElementById("button");
    if (name.value && name.value.length) {
        button.disabled = false;
    } else {button.disabled = true;}
}


