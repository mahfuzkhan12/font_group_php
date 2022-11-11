const env = {
    font_list_url: "http://127.0.0.1:8000/backend/fontslists.php",
    font_upload_url: "http://127.0.0.1:8000/backend/upload_font.php",
    get_available_fonts: "http://127.0.0.1:8000/backend/getAvailableFonts.php",
    get_available_fonts_options: "http://127.0.0.1:8000/backend/getAvailableFonts.php?case=get_as_options",
    font_delete_url: "http://127.0.0.1:8000/backend/delete_font.php",
    create_new_font_group: "http://127.0.0.1:8000/backend/create_new_font_group.php",
    get_font_groups: "http://127.0.0.1:8000/backend/group_list.php",
    delete_font_group: "http://127.0.0.1:8000/backend/delete_font_group.php",
}


var available_Fonts = [];

$(document).ready(function () {

    $.ajax({
        url: env.get_available_fonts,
        type: 'GET',
        success: function(res) {
            const fonts_array = JSON.parse(res);
            available_Fonts = fonts_array;
            
            const style_El = document.createElement('style');
            
            fonts_array.forEach(element => {
                style_El.append(`
                    @font-face {
                        font-family: ${element.font_family};
                        src: url('/${element.src}');
                    }
                    body span[data-font="${element.font_family}"] {
                        font-family: ${element.font_family};
                    }
                `)
                
            });

            $("head").append(style_El);

        }
    });



    // label transfrom
    $('form').on('focusin', 'input.label_transform', function () { 
        const label = $(this).closest('.form-group').find('label');
        label.addClass("fix")
    })

    $('form').on('focusout', 'input.label_transform', function () { 
        const label = $(this).closest('.form-group').find('label');
        if($(this).val() == null || !$(this).val()) {
            console.log($(this).val());
            label.removeClass("fix")
        }else if($(this).val() != '') {
            label.addClass("fix")
        }else {
            label.removeClass("fix")
        }
    })


    $('form').on('change', '.required-entry', function() {
        $(this).removeClass('is-invalid')
    })



})
  