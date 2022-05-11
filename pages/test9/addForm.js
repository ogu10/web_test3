$(document).ready(function () {
    $("#form2").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        var formData = {
            name2: $("#name2").val(),
            no2: $("#no2").val(),
            team2: $("#team2").val(),
        };

        $.ajax({
            type: "POST",
            url: "regist9.php",
            data: formData,
            dataType: "json",
            encode: true,
        }).done(function (data) {
            console.log(data);
            if (!data.success) {
                if (data.errors.name2) {
                    $("#name-group").addClass("has-error");
                    $("#name-group").append(
                        '<div class="help-block" style="color: lime">' + data.errors.name2 + "</div>"
                    );
                }

                if (data.errors.no2) {
                    $("#no-group").addClass("has-error");
                    $("#no-group").append(
                        '<div class="help-block" style="color: lime">' + data.errors.no2 + "</div>"
                    );
                }

                if (data.errors.team2) {
                    $("#team-group").addClass("has-error");
                    $("#team-group").append(
                        '<div class="help-block" style="color: lime">' + data.errors.team2 + "</div>"
                    );
                }
            } else {
                $("#title9").append(
                    '<div class="alert alert-success help-block" style="color: lime">' + data.message + "</div>"
                );
/*                $("#players_list").html(
                   "<?php include 'table9.php' ?>"
                );*/
            }
        });
        event.preventDefault();
    });
});