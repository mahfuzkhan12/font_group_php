<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP-JS Developer Assignment – Zepto Apps</title>


    <!-- bootstrap css cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- boostrap datatable css -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <!-- custome css file -->
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

    

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


        <!-- UPLOADED FONTS LIST -->
        <div class="card uploaded_fonts_list">
            <div class="card-body">

                <div>
                    <div class="card-title">
                        Our Fonts
                    </div>
                    <div class="card-subtitle">Browse a list of Zepto fonts to build your font group. </div>
                </div>

                <div class="table_wrapper mt-4">
                    <table id="fonts_list" class="table" style="width:100%">
                        <thead>
                            <tr>
                              <th scope="col">FONT NAME</th>
                              <th scope="col">PREVIEW</th>
                              <th scope="col"></th>
                            </tr>
                          </thead>
                        <tbody>
                            <tr scope="row"></tr>
                        </tbody>
                    </table>
                </div>
                 
            </div>

        </div>
        <!-- UPLOADED FONTS LIST -->

        <!-- divider -->
        <div class="h-divider">
            <div class="shadow_S"></div>
            <div class="text2"><img src="https://t1.gstatic.com/images?q=tbn:ANd9GcQsmMfybMIwoE5etmOIAuvnFWdfv_8C1Bq15urJFqwhhI55FyYNP2YuUA" /></div>
        </div>
        <!-- divider -->

    </div>
      
    
    <!-- JQUERY CDN -->
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

    <!-- dattable -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- bootstrap data table -->
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

    <!-- boostrap JavaScript CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <!-- sweet alert cdn -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- js files -->
    <script src="assets/app.js"></script>
    <script src="assets/data_loaders.js"></script>
</body>
</html>