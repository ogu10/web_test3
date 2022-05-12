$(document).ready(function () {
    $("#no2").keyup(function (event) {
        $(".help-block2").remove();
        var checkNum = $.isNumeric($("#no2").val());
/*        console.log(checkNum);*/

            if (!checkNum) {
                $("#no-group").append(
                    '<div class="alert alert-success help-block2" style="color: lime">' + "please type number! 😠" + "</div>"
                );
            }
        });
        event.preventDefault();
    });