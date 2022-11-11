

// function loadFonts() {
//     $('#fonts_list').DataTable({
//         "pagingType": "numbers",
//         "processing": true,
//         "serverSide": true,
//         'serverMethod': 'post',
//         searching: false,
//         "ajax": env.font_list_url,
        
//         columns: [
//             { data: 'font_name' },
//             { data: 'font_family' },
//             { data: 'id' }
//         ],

//         columnDefs: [
//             {
//                 targets: 1,
//                 orderable: false,
//                 render: function (data) {
//                     return `<span class="preview" data-font="${data}">Example Style</span>`
//                 }
//             },
//             {
//                 targets: 2,
//                 orderable: false,
//                 render: function (data, type, row) {
//                     return `<button class="delete_font_item btn btn-outline-danger" data-font="${row.font_family}" data-id='${data}'>delete</button>`
//                 }
//             },
//         ]
//     });
// }


$(document).ready(function () {
    // loadFonts();


    // font lists table
    const fonts_list_table = $('#fonts_list').DataTable({
        "pagingType": "numbers",
        "processing": true,
        "serverSide": true,
        'serverMethod': 'post',
        searching: false,
        "ajax": env.font_list_url,
        
        columns: [
            { data: 'font_name' },
            { data: 'font_family' },
            { data: 'id' }
        ],

        columnDefs: [
            {
                targets: 0,
                orderable: false,
                render: function (data) {
                    return data
                }
            },
            {
                targets: 1,
                orderable: false,
                render: function (data) {
                    return `<span class="preview" data-font="${data}">Example Style</span>`
                }
            },
            {
                targets: 2,
                orderable: false,
                render: function (data, type, row) {
                    return `<button class="delete_font_item btn btn-outline-danger" data-font="${row.font_family}" data-id='${data}'>delete</button>`
                }
            },
        ]
    });


    
    // delete font item with sweet alert 
    $("#fonts_list").on('click', 'tbody tr .delete_font_item', function(e) {
        const font_name = $(this).data('font')
        const id = $(this).data('id')

        Swal.fire({
            title: `Are you sure?`,
            html: `you want to delete "${font_name}" font`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            }).then((result) => {
                
                if (result.isConfirmed) {

                    const formData = new FormData();
                    formData.append('id', id)
                    
                    $.ajax({
                        type: "POST",
                        url: env.font_delete_url,
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData, // serializes the form's elements.
                
                        success: function(data) {
                            console.log(data);
                            if(data == '1') {
                                Swal.fire('Deleted!', '', 'success')

                                // renove the item from table
                                fonts_list_table
                                    .row( $(this).parents('tr') )
                                    .remove()
                                    .draw();
                            }else {
                                Swal.fire('Error Happend!', '', 'warning')
                            }
                        },
                
                        error: function (error) {
                            Swal.fire('Error Happend!', '', 'warning')
                        }
                    });

                }
        })
    })


    // font groups table
    const font_group_list_table = $('#groups_list').DataTable({
        "pagingType": "numbers",
        "processing": true,
        "serverSide": true,
        'serverMethod': 'post',
        searching: false,
        "ajax": env.get_font_groups,
        
        columns: [
            { data: 'title' },
            { data: 'fonts' },
            { data: 'fonts' },
            { data: 'id' }
        ],

        columnDefs: [
            {
                targets: 0,
                orderable: false,
                render: function (data) {
                    return data
                }
            },
            {
                targets: 1,
                orderable: false,
                render: function (data) {
                    var fonts = [];
                    data.forEach(element => {
                        fonts.push(element.font_family);
                    });
                    return `<span class="preview">${fonts.join(", ")}</span>`
                }
            },
            {
                targets: 2,
                orderable: false,
                render: function (data) {
                    return `<span>${data.length}</span>`
                }
            },
            {
                targets: 3,
                orderable: false,
                render: function (data, type, row) {
                    return `
                            <button class="btn btn-outline-success" data-id='${data}'>edit</button>
                            <button class="delete_font_group_item btn btn-outline-danger" data-font="${row.title}" data-id='${data}'>delete</button>
                        `
                }
            },
        ]
    });




    // delete font group item with sweet alert 
    $("#groups_list").on('click', 'tbody tr .delete_font_group_item', function(e) {
        const font_name = $(this).data('font')
        const id = $(this).data('id')

        Swal.fire({
            title: `Are you sure?`,
            html: `you want to delete "${font_name}" group`,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Delete',
            }).then((result) => {
                
                if (result.isConfirmed) {

                    const formData = new FormData();
                    formData.append('id', id)
                    
                    $.ajax({
                        type: "POST",
                        url: env.delete_font_group,
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData, // serializes the form's elements.
                
                        success: function(data) {
                            console.log(data);
                            if(data == '1') {
                                Swal.fire('Deleted!', '', 'success')

                                // renove the item from table
                                font_group_list_table
                                    .row( $(this).parents('tr') )
                                    .remove()
                                    .draw();
                            }else {
                                Swal.fire('Error Happend!', '', 'warning')
                            }
                        },
                
                        error: function (error) {
                            Swal.fire('Error Happend!', '', 'warning')
                        }
                    });

                }
        })
    })


});