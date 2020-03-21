$(function() {
    $("[type=tel]").mask("+7 (999) 999-99-99");
    var delay = 300;
    
    $('.validate-form').each(function(){
        $(this).validate({
            rules: {
                GIYGuydguw87ye3: {
                    required: true,
                    minlength: 2
                },
                dwh7yehjiewdtew: {
                    required: true
                },
            },
            messages: {
                GIYGuydguw87ye3: {
                    required: "Укажите Ваше имя",
                    minlength: "Не менее 2-х букв"
                },
                dwh7yehjiewdtew: {
                    required: "Укажите телефон"
                }
            }
        });
    });

    $('#recall-form').submit(function(e) {
        e.preventDefault();

        var thi = $(this);
        
        if ($(this).find("[name='GIYGuydguw87ye3']").val() == "" || $(this).find("[name='dwh7yehjiewdtew']").val() == "" || $(this).find("[name='dwh7yehjiewdtew']").attr("value") == "+7 (___) ___-__-__")
            return false;

        $.ajax( {
            url: '/wp-admin/admin-ajax.php',
            type: 'POST',
            data: {
                action: 'recall_back_form',
                form: {
                    name: thi.find("[name='name']").attr("value"),
                    phone: thi.find("[name='phone']").attr("value"),
                    email: thi.find("[name='email']").attr("value"),
                    GIYGuydguw87ye3: thi.find("[name='GIYGuydguw87ye3']").val(),
                    dwh7yehjiewdtew: thi.find("[name='dwh7yehjiewdtew']").val(),
                },
            },
            beforeSend: function() {
                thi.find("button").addClass("active").text("Загрузка...");
            },
            success: function( json ) {
                thi.parent().parent().addClass("success");

                setTimeout(function() {

                    $("#saleOrder").modal("hide");

                    thi.find("[name='GIYGuydguw87ye3']").val('');
                    thi.find("[name='dwh7yehjiewdtew']").val('');
                    thi.parent().parent().removeClass("success");
                    
                }, 3000);

                thi.find("button").removeClass("active").text("Отправить");

            }
        });

        return false;
    });
});
