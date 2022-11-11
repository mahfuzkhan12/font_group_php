
$(document).ready(function () {

    var available_options = [];

    // get available fonts and add it in the font select part
    $.ajax({
        url: env.get_available_fonts_options,
        type: 'GET',
        success: function(res) {
            available_options = res;
            // console.log(res);
            $('.select_font_items').html(res);
        }
    });

    console.log(available_options);
    
  
    // add new create row append/ remove
    const row_item_append_area = $('.row_items_append_area');
    $(row_item_append_area).on('click', '.remove_row_button', function(e){
      e.preventDefault();
      $(this).closest(".font_group_row_item").remove()
    });
  
    $('#add_new_row').on('click', function(e){
      e.preventDefault();
      
      html = `<li class="ui-state-default font_group_row_item d-flex align-items-center">
                <div><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></div>
                <div class="row w-100">
                    <div class="col-sm-6 col-md-3 form-group">
                        <label>Font name</label>
                        <input type="text" name="font_name[]" placeholder="Font Name" class="form-control required-entry label_transform">
                    </div>
                    <div class="col-sm-6 col-md-3 form-group">
                        <select name="font_id[]" class="form-select select_font_items required-entry label_transform">
                            ${available_options}
                        </select>
                    </div>
                    <div class="col-sm-6 col-md-3 form-group">
                        <label>Specific size</label>
                        <input type="number" placeholder="Specific size" class="form-control label_transform">
                    </div>
                    <div class="col-sm-6 col-md-3 form-group">
                        <label>Price</label>
                        <input type="number" placeholder="Price" class="form-control label_transform">
                    </div>
                </div>
                <div class="del_icon">
                    <button type="button" class="remove_row_button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
                            <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
                        </svg>
                    </button>
                </div>
              </li>`
  
        $(row_item_append_area).append(html)
    });
  




    // create new font group
    $("#create_new_groupt_submit_btn").click(function() {

        const result_show_div = $("#error_meesage_font_upload");
        // const formData = new FormData(form);

        const errors = [];
        $('.required-entry').filter(function () {
            if(this.value == '' || this.value == null) {
                $(this).addClass('is-invalid');
                errors.push(true);
            }else {
                $(this).removeClass('is-invalid');
            }
        });


        if (errors.length > 0) {
            result_show_div.html(`<div class="card-header"><div class="alert alert-danger">Please fill out all required fields.</div></div>`)
        }else{

            result_show_div.html('');

            const overlay = $("#overlay");
            overlay.removeClass('hide');
            overlay.addClass('show');
            
            
            const form = $("#create_group_form");
            formData = new FormData(form[0]);

            setTimeout(function() { 
                $.ajax({
                  type: "POST",
                  url: env.create_new_font_group,
                  cache: false,
                  contentType: false,
                  processData: false,
                  data: formData, // serializes the form's elements.
            
                  success: function(data) {
                    if(data == '1') {
                      result_show_div.html(`<div class="card-header">
                          <div class="alert alert-success">
                            Succssfully crated the font group!
                            <a href="/font_groups.html"><b>go to font groups list</b></a>
                          </div>
                        </div>`);
                        form.trigger("reset");
                    }else {
                      result_show_div.html(data);
                    }
                    
                    overlay.addClass('hide');
                    overlay.removeClass('show');
                  },
            
                  error: function (error) {
                    result_show_div.html(`<div class="card-header"><div class="alert alert-danger">Error happend</div></div>`)
                    overlay.addClass('hide');
                    overlay.removeClass('show');
                  }
                });
            }, 1000);
        }

    })
  
  
  })