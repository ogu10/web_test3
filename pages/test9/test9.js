$(document).ready(function () {
    $("form").submit(function (event) {
        $(".form-group").removeClass("has-error");
        $(".help-block").remove();
        var formData = {
            name: $("#name2").val(),
            no: $("#no2").val(),
            team: $("#team2").val(),
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
                if (data.errors.name) {
                    $("#name-group").addClass("has-error");
                    $("#name-group").append(
                        '<div class="help-block" style="color: lime">' + data.errors.name + "</div>"
                    );
                }

                if (data.errors.no) {
                    $("#no-group").addClass("has-error");
                    $("#no-group").append(
                        '<div class="help-block" style="color: lime">' + data.errors.no + "</div>"
                    );
                }

                if (data.errors.team) {
                    $("#team-group").addClass("has-error");
                    $("#team-group").append(
                        '<div class="help-block" style="color: lime">' + data.errors.team + "</div>"
                    );
                }
            } else {
                $("form2").html(
                    '<div class="alert alert-success">' + data.message + "</div>"
                );
            }
        });
        event.preventDefault();
    });
});