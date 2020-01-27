$(document).ready(main);

// Con un click se muestra el menu
var flag = true;
$("#menu-flex").show();
function main() {
    $('.menu-bar').click(function () {
        if (flag) {
            $("#menu-flex").show();
            $('#menu-flex').animate({
                left: '0'
            });
            flag = false;
        } else {
            flag = true;
            $("#menu-flex").hide();
            //$("#menu-flex").css("margin-left", "-500%");
            $('#menu-flex').animate({
                left: '-100%'
            });
        }

    });
};
