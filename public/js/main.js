$(document).ready(
    coolSliderLink(),
    coolSliding(),
    carousel()
);

function coolSliderLink() {
    $(".INL_CoolSlider").click(function () {
        var linkRef = $(this).attr('href');
        $.ajax({
            type: "post",
            url: linkRef,
            success: function (result) {
                $("#cool_content").html(result);
                $.fancybox.close();
                $("#cool_confirm").slideDown("slow");
                $(".cool_close").click(function () {
                    cool_slideUP();
                    //window.location.replace("<?=site_url()?>");
                    return false;
                });

                $(".cancel_btn").click(function () {
                    cool_slideUP();
                    //window.location.replace("<?=site_url()?>");
                    return false;
                });
            }
        });
        return false;
    });
}

function coolSliding() {
    if ($("#cool_content").html())
        $("#cool_confirm").slideDown("slow");

    $(".cool_close").click(function () {
        cool_slideUP();
        return false;
    });

    $(".cancel_btn").click(function () {
        cool_slideUP();
        return false;
    });
}
function cool_slideUP() {
    $("#cool_confirm").slideUp("slow");
    $(".formErrorContent").remove();
    $(".formErrorArrow").remove();
}

function carousel() {
    //$('#products').carouFredSel();
    $('#products').carouFredSel({
        width: 990,
        height: 'auto',
        prev: '#prev_add',
        next: '#next_add',
        auto: {
            play: true,
            delay: 6
        },
        scroll : {
            items: 1,
            duration: 800
        },
        items : {
            visible : 4
            //start:  Math.floor(Math.random() * 20)
        },
        mousewheel: true,
        swipe: {
            onMouse: true,
            onTouch: true
        }
    });
}
