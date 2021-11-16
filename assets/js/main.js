function is_mobile() {return (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent));}
function is_OSX() {return navigator.platform.match(/(Mac|iPhone|iPod|iPad|Android)/i) ? true : false;}

jQuery(function($) {

    $("[type=tel]").mask("+7 (999) 999-99-99");
    
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

});