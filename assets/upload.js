// ************************ Drag and drop ***************** //
let dropArea = document.getElementById("drop-area")

if(dropArea){
  // Prevent default drag behaviors
  ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, preventDefaults, false)   
    document.body.addEventListener(eventName, preventDefaults, false)
  })

  // Highlight drop area when item is dragged over it
  ;['dragenter', 'dragover'].forEach(eventName => {
    dropArea.addEventListener(eventName, highlight, false)
  })

  ;['dragleave', 'drop'].forEach(eventName => {
    dropArea.addEventListener(eventName, unhighlight, false)
  })

    
  // Handle dropped files
  dropArea.addEventListener('drop', handleDrop, false)
}



function preventDefaults (e) {
  e.preventDefault()
  e.stopPropagation()
}

function highlight(e) {
  dropArea.classList.add('highlight')
}

function unhighlight(e) {
  dropArea.classList.remove('active')
}

function handleDrop(e) {
  var dt = e.dataTransfer
  var files = dt.files

  handleFiles(files)
}



// check file exist in array
function fileExistInArray(filename, array) {
    if (array.filter(item=> item.name == filename).length != 0){
        return true;
    }
}


var files_array = [] // save file information in a array


$("#file_input").change(function(e) {
  handleFiles(e.target.files)
  e.target.files = null;
  e.target.value = ''
})


// delete file item from input
$('body').on('click', '.delete_file_item_btn',function(e) {
  const file = $(this).attr('data-id');
  
  if(file) {
    files_array.splice(files_array.findIndex(item => item.name === file), 1)
    previewFile(files_array)
  }
})


function handleFiles(files) {
  files = [...files]

  files.forEach(function(i, idx) {
    if(!fileExistInArray(i.name, files_array)) {
        files_array.push(i);
    }
  })
  previewFile(files_array)


  if(files_array.length > 0) {
    $(".submit_btn_wrapper").html(`<button type="button" id="upload_files_btn" class="btn btn-primary w-100">Upload</button>`)
  }else {
    $(".submit_btn_wrapper").html(``)
  }

}

function previewFile(files) {

  $("#preview_files").html('');
  files.forEach(function(i, idx) {
    $("#preview_files").append(`<div class="item">
        <div class="img">
            <img src="assets/ttf.png" alt="TTF" />
        </div>
        <div class="name">
            ${i.name}
        </div>

        <div>
          <button type="button" class="delete_file_item_btn" data-id="${i.name}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
              <path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
            </svg>
          </button>
        </div>
      </div>`)
    })
}



$("body").on('click', '#upload_files_btn', function(e) {
  const formData = new FormData();
  
  for (let i = 0; i < files_array.length; i++) {
    formData.append('files[]', files_array[i])
  }


  const error_message_div = $("#error_meesage_font_upload");
  const overlay = $("#overlay");
  overlay.removeClass('hide');
  overlay.addClass('show');
  

  setTimeout(function() { 
      $.ajax({
        type: "POST",
        url: env.font_upload_url,
        enctype: 'multipart/form-data',
        cache: false,
        contentType: false,
        processData: false,
        data: formData, // serializes the form's elements.
  
        success: function(data) {
          if(data == '1') {
            $(".submit_btn_wrapper").html(``)
            files_array = [];
            previewFile([]);
            error_message_div.html(`<div class="card-header">
                <div class="alert alert-success">
                  Succssfully uploaded the fonts
                  <a href="/"><b>go to fonts list</b></a>
                </div>
              </div>`);
          }else {
            error_message_div.html(data);
          }
          
          overlay.addClass('hide');
          overlay.removeClass('show');
        },
  
        error: function (error) {
          error_message_div.html(`<div class="card-header"><div class="alert alert-danger">Error happend</div></div>`)

          console.log(error.message);
         
          overlay.addClass('hide');
          overlay.removeClass('show');
        }
      });
  }, 1000);

})



