$(document).ready(function () {
    $("#name2").keyup(function (event) {
        $(".help-block").remove();
/*        console.log( $(this).val() );*/
/*        a = $(this).val();
        console.log(a)
        $("#title9").append(
            '<div class="alert alert-success help-block" style="color: lime">' + a + "</div>");*/
        var formData = {
            name2: $("#name2").val(),
        };
/*        console.log(formData)*/

        $.ajax({
            type: "POST",
            url: "message.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data) {
/*            console.log(data);*/
            if (data.message != "") {
                /*window.location.reload();*/
                $("#name-group").append(
                    '<div class="alert alert-success help-block" style="color: lime">' + data.message + "</div>"
                );
            }
        });
        event.preventDefault();
    });
});

