<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Api in Codeigniter</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/style.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
  <h1>Api in codeigniter</h1>
  <p>Api in codeigniter and implement with html!</p> 
</div>
  
<div class="container">
  <button class="btn btn-info" id="addbook" data-toggle="modal" data-target="#exampleModal">Add New Book</button>
  <div class="row">
  	<table class="table">
  <caption>List of users</caption>
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">price</th>
      <th scope="col">author</th>
      <th scope="col">category</th>
      <th scope="col">action</th>
    </tr>
  </thead>
  <tbody id="table-data">

  </tbody>
</table>

  </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Books</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="target">
         <div class="form-group">
           <label>Name</label>
           <input type="text" name="name" class="form-control">
           <label>Price</label>
           <input type="text" name="price" class="form-control">
           <label>Author</label>
           <input type="text" name="author" class="form-control">
           <label>Category</label>
           <input type="text" name="category" class="form-control">
           <label>Language</label>
           <input type="text" name="language" class="form-control">
            <label>ISBN</label>
           <input type="text" name="isbn" class="form-control">
         </div>
      <!--  </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
       </form>
    </div>
  </div>
</div>
<!-- succes model start -->
  <div class="modal fade" id="ignismyModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
                    
                    <div class="modal-body">
                       
                        <div class="thank-you-pop">
                            <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                            <h1>Thank You!</h1>
                            <p>Your data submit successfully</p>                            
                        </div>
                         
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- success model end -->
        <!-- delete model start -->
<!--  <div id="myModal" class="modal fade">
    <div class="modal-dialog modal-confirm">
      <form id="deletebook">
                <div class="modal-content">
            <div class="modal-header">
                <div class="icon-box">
                    <i class="material-icons">&#xE5CD;</i>
                </div>              
                <h4 class="modal-title">Are you sure?</h4>  
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body">
                <p>Do you really want to delete these records? This process cannot be undone.</p>
            </div>
            <div class="modal-footer">
              <input type="hidden" name="deleteid">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-danger">Delete</button>
            </div>
        </div>
      </form>
    </div>
</div> -->
<!-- delete model end -->
<!-- view model start -->
<div class="modal fade" id="bookview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">View Books</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="form-group">
        <p>
         <label>Name:-</label>
         <span id="nameview"></span>
         </p>
         <p>Price:-
         <span id="priceview"></span></p><p>
           Author:-
           <span id="authorview"></span>
         </p><p>Category :-
         <span id="categoryview"></span></p><p>
           Language:-
           <span id="languageview"></span>
         </p><p>
         ISBN:-
         <span id="ISBNview"></span></p>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
      </div>
    </div>
  </div>
</div>
<!-- view model end -->
<!-- edit model start -->
<div class="modal fade" id="bookedit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1">Edit book</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <form id="postEdit">
         <div class="form-group">
           <label>Name</label>
           <input type="text" name="name" id="nameid" class="form-control">
            <label>Price</label>
           <input type="text" name="price" id="priceid" class="form-control">
          <label>Author</label>
           <input type="text" name="author" id="authorid" class="form-control">
            <label>Category</label>
           <input type="text" name="category" id="categoryid" class="form-control">
            <label>Language</label>
           <input type="text" name="language" id="languageid" class="form-control">
           <label>ISBN</label>
           <input type="text" name="isbn" id="isbnid" class="form-control">
           <input type="hidden" name="id" id="id" class="form-control">
         </div>
       <!-- </form> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- edit model end -->
<!-- succes update model start -->
  <div class="modal fade" id="ignismyupdateModal" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label=""><span>×</span></button>
                     </div>
                    
                    <div class="modal-body">
                       
                        <div class="thank-you-pop">
                            <img src="http://goactionstations.co.uk/wp-content/uploads/2017/03/Green-Round-Tick.png" alt="">
                            <h1>Thank You!</h1>
                            <p>Your data update successfully</p>                            
                        </div>
                         
                    </div>
                    
                </div>
            </div>
        </div>
        <!-- success update model end -->
</div>

</body>
        <script src="<?php echo base_url(); ?>assets/rest.js"></script>
</html>
