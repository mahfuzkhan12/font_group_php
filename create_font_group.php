<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-JS Developer Assignment – Zepto Apps</title>


    <!-- bootstrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <!-- jquery UI CSS CDN -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- custome css file -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    

    <!-- overlay while uploading -->
    <div id="overlay" class="overlay hide">
        <div class="overlay_wrapper">
            <div class="spinner-square">
                <div class="square-1 square"></div>
                <div class="square-2 square"></div>
                <div class="square-3 square"></div>
            </div>
            <h3 class="overlay_text">Uploading please wait!</h3>
        </div>
    </div>
    <!-- overlay while uploading -->

    


    <div class="container">

                
        <div class="links">
            <div class="item">
                <a href="/">
                    <button class="btn btn-primary">Fonts List</button>
                </a>
            </div>
            <div class="item">
                <a href="/upload_font">
                    <button class="btn btn-primary">Upload Font</button>
                </a>
            </div>
            <div class="item">
                <a href="/font_groups">
                    <button class="btn btn-primary">Font Groups</button>
                </a>
            </div>
            <div class="item">
                <a href="/create_font_group">
                    <button class="btn btn-primary">Create Font Group</button>
                </a>
            </div>
        </div>

        

        <!-- UPLAOD AREA -->
        <div class="upload_area mt-5">

            <div>
                <div class="card-title"> Create Font Group </div>
                <div class="card-subtitle">You have to select at least two fonts. </div>
            </div>
            
            <form id="create_group_form" class="mt-4 label_move">

                <div id="error_meesage_font_upload"></div>
                
                <div class="form-group">
                    <label>Group title</label>
                    <input type="text" name="group_title" id="" placeholder="Group title" class="required-entry form-control label_transform">
                </div>

                <ul id="sortable" class="row_items_append_area">
                    <li class="ui-state-default font_group_row_item d-flex align-items-center">
                        <div><span class="ui-icon ui-icon-arrowthick-2-n-s"></span></div>
                        <div class="row w-100">
                            <div class="col-sm-6 col-md-3 form-group">
                                <label>Font name</label>
                                <input type="text" name="font_name[]" placeholder="Font Name" class="form-control required-entry label_transform">
                            </div>
                            <div class="col-sm-6 col-md-3 form-group">
                                <select name="font_id[]" class="form-select select_font_items required-entry label_transform"></select>
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
                    </li>
                </ul>

                <div class="submit_btn_wrapper">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="add_row_wrapper">
                            <button class="btn btn-outline-success" id="add_new_row" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                </svg>
                                Add row
                            </button>
                        </div>
                        <div class="add_row_wrapper">
                            <button id="create_new_groupt_submit_btn" class="btn btn-success" type="button">Create</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
        <!-- UPLAOD AREA -->

        <!-- divider -->
        <div class="h-divider">
            <div class="shadow_S"></div>
            <div class="text2"><img src="https://t1.gstatic.com/images?q=tbn:ANd9GcQsmMfybMIwoE5etmOIAuvnFWdfv_8C1Bq15urJFqwhhI55FyYNP2YuUA" /></div>
        </div>
        <!-- divider -->
    </div>
      
    
    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- boostrap JavaScript CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <!-- jquery UI CDN -->
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>



    <!-- js files -->
    <script src="assets/app.js"></script>
    <script src="assets/create_new_group.js"></script>

    <script>
        $( function() {
          $( "#sortable" ).sortable();
        } );
    </script>
</body>
</html>