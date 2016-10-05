$(document).ready(function() {
    var inp = $("#title-input");
    var inpMsg = $("#title-input-msg-slide");

    var body = $("#body-input");
    var bodyMsg = $("#body-input-msg-slide");

    inp.click(function() {
        if(bodyMsg.hasClass("showit")) {
            bodyMsg.removeClass('showit animated slideInRight');
            bodyMsg.addClass('showit animated slideOutRight');
        }

        if (inpMsg.hasClass("slideOutRight")) {
            inpMsg.removeClass("showit animated slideOutRight");
            inpMsg.addClass('showit animated slideInRight');
        } else {
            inpMsg.removeClass('hideit');
            inpMsg.addClass('showit animated slideInRight');
        }
    });

    body.click(function() {
        if(inpMsg.hasClass("showit")) {
            inpMsg.removeClass('slideInRight');
            inpMsg.addClass('slideOutRight');
        }
        if (bodyMsg.hasClass("slideOutRight")) {
            bodyMsg.removeClass("showit animated slideOutRight");
            bodyMsg.addClass('showit animated slideInRight');
        } else {
            bodyMsg.removeClass('hideit');
            bodyMsg.addClass('showit animated slideInRight');
        }
    });
});