jQuery(function () {

        $( "#target" ).submit(function( event ) {
      event.preventDefault();
       var str = $( "#target" ).serialize();
       jQuery.ajax({
        type: 'post',
        url: 'http://localhost/testing/api/api/addBook',
        data:str,
        // dataType:json,
        success: function(result) {
           $('#exampleModal').modal('hide');
           $('#ignismyModal').modal('show');
           load_wp_posts();
        }

       })
    });

$('body').on('click', '.post-View', function () {
    var id = $(this).data("id");
    // alert(id);
             $.ajax({
            type: "get",
            url:'http://localhost/testing/api/api/single_books/'+id,
            data: {
               id: id
            },
            success: function (response) {
                 $('#bookview').modal('show');
                $('#nameview').html(response.name);
                $('#priceview').html(response.price);
                $('#authorview').html(response.author);
                $('#categoryview').html(response.category);
                $('#languageview').html(response.language);
                $('#ISBNview').html(response.ISBN);
            },
            error: function (data) {
               console.log('Error:', data);
            }
         });
});

    jQuery(document).on("click", ".post-edit", function () {
            var id = $(this).data("id");
            // alert(id);
            $.ajax({
            type: "get",
            url:'http://localhost/testing/api/api/single_books/'+id,
            data: {
               id: id
            },
            success: function (response) {
                $('#bookedit').modal('show');
                 // alert(response.name);
                  $('#nameid').val(response.name);
                  $('#priceid').val(response.price);
                  $('#authorid').val(response.author);
                  $('#categoryid').val(response.category);
                  $('#languageid').val(response.language);
                  $('#isbnid').val(response.ISBN);
                  $('#id').val(response.id);
                  // $('#id').html(response.id);
            },
            error: function (data) {
               console.log('Error:', data);
            }
         });
    });

    $( "#postEdit" ).submit(function( event ) {
      event.preventDefault();
       var str = $( "#postEdit" ).serialize();
       jQuery.ajax({
        type: 'put',
        url: 'http://localhost/testing/api/api/updateBook',
        data:str,
        // dataType:json,
        success: function(result) {
           $('#bookedit').modal('hide');
           $('#ignismyupdateModal').modal('show');
           load_wp_posts();
        }

       })
    });

        jQuery(document).on("click", ".post-delete", function () {
            var id = $(this).data("id");
            alert(id);
            $.ajax({
            type: "delete",
            url:'http://localhost/testing/api/api/deleteBook',
            data: {
               id: id
            },
            success: function (response) {
                load_wp_posts();
            },
            error: function (data) {
               console.log('Error:', data);
            }
         });
    });

load_wp_posts();
});

function load_wp_posts() {
    jQuery.get("http://localhost/testing/api/api/books", function(result){
    var post = result;
    // alert(post);
    var html = "";
    jQuery.each(post, function (index, get) {
    html += '<tr><td>' + (index + 1) + '</td><td>' + get.name + '</td><td>' + get.price + '</td><td>' + get.author + '</td><td>' + get.category + '</td><td><a class="post-View" href="javascript:void(0)" data-toggle="modal" data-target="#postView" data-id="' + get.id + '"><i class="fa fa-eye" aria-hidden="true"></i></i></a><a class="post-edit" href="javascript:void(0)" data-toggle="modal"  data-id="' + get.id + '"><i class="fa fa-pencil" aria-hidden="true"></i></a><a class="post-delete" href="#myModal" data-toggle="modal" data-target="#myModal" data-id="' + get.id + '"><i class="fa fa-trash" aria-hidden="true"></i></a></td></tr>';
    });
    jQuery("#table-data").html(html);
  });
}