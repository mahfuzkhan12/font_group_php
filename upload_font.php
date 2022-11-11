<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-JS Developer Assignment – Zepto Apps</title>


    <!-- bootstrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
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
        <div class="upload_area">

            <h5 class="title">Select Font Files to upload</h5>
            <div id="error_meesage_font_upload"></div>
            
            <form id="uplaod_form">
                <label for="file_input">
                    <div class="drop-area" id="drop-area">
                        <div class="wrapper">
                            <div class="img">
                                <img src="assets/cloud.png" alt="UPLOAD">
                            </div>
                            <div>
                                <span>Click to upload</span> or drag and drop
                            </div>
                            <div> Only TTF file allowed</div>
                        </div>
                        <input type="file" class="file_input" id="file_input" accept=".ttf">
                    </div>

                </label>

                <input type="hidden" id="file_items_array">

                <div class="preview_files" id="preview_files">
                </div>

                <div class="submit_btn_wrapper"></div>

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
    

    <!-- js files -->
    <script src="assets/app.js"></script>
    <script src="assets/upload.js"></script>
</body>
</html>