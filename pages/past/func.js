function func() {
    const name = document.getElementById("name");
    const button = document.getElementById("button");
    if (name.value && name.value.length){
        button.disable = false;
    } else {button.disabled = true;}
}