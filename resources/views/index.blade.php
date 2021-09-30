@extends('layouts.app')
@section('content')
    
    <br><br>
    <div class="input-group">
        <div class="form-outline">
          <input type="search" id="search" class="form-control" style="width: 160%"/>
        </div>
        <button type="button" class="btn btn-primary" style="margin-left: 125px">
          <i class="fas fa-search"></i>
        </button>
    </div>
      <br>
        <div style="border: 2px solid red; width:20%">
            <ul id="bookList" style="list-style: none"></ul>
        </div>
        
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">Name</th>
              <th scope="col">Author</th>
              <th scope="col">Cover Image</th>
            </tr>
        </thead>
        <tbody id="table"> 
        </tbody>
    </table>
    <!-- JavaScript Bundle with Popper -->
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


<script>
   $(document).ready(function () 
{
    function getData() {
        // alert('abc');
        // $('#table').html('');
                        $.ajax({
                        type: "GET",
                        url: "http://127.0.0.1:8000/api/books",
                        data: "data",
                        success: function (response) {
                                console.log(response);
                                response.forEach(element => {
                                        // $('#data').append("<tr><td>"+element.name+"</td>"+"<td>"+element.author+"</td>"+"<td>"+element.coverImg+"</td></tr>");
                                        $('#table').append('<tr><td>'+element.name+'</td><td>'+element.author+'</td><td>'+element.coverImg+'</td><td><a href="/editbook/'+element.id+'" class="btn btn-dark">'+'Edit Post'+'</a></td><td><a href="/deletebook/'+element.id+'" class="btn btn-dark">'+'Delete Post'+'</a></td></tr>');
                                                            });
                                                    }
                                });
                        }
    getData();
    
    $('#search').keyup(function (e) { 
                         
                    let searchData = $('#search').val()
                    //console.log(searchData);
                    $.ajax({
                    type: "GET",
                    url: "http://127.0.0.1:8000/api/books/search/"+searchData,
                    data: "data",
        
                    success: function (response) {

                            $('#bookList').fadeIn(); 
                            if(searchData==='')
                                {
                                $('#bookList').html('');
                                } else
                                {
                                response.forEach(element =>  {
                                $('#bookList').html('<li>'+element.name+'</li>');
                                                            });
                                }
                        
                                console.log(response);

                                $('#table').html('');
                                response.forEach(element => {
                                    // $('#data').append("<tr><td>"+element.name+"</td>"+"<td>"+element.author+"</td>"+"<td>"+element.coverImg+"</td></tr>");
                                    $('#table').append('<tr><td>'+element.name+'</td><td>'+element.author+'</td><td>'+element.coverImg+'</td><td><a href="/editbook/'+element.id+'" class="btn btn-dark">'+'Edit Post'+'</a></td><td><a href="/deletebook/'+element.id+'" class="btn btn-dark">'+'Delete Post'+'</a></td></tr>');
                                                             });


                                                    }       
                                    //     error: function (request, status, error) {
                                    //     alert(request.responseText);
                                    // }
                            });  
     
     
                                $(document).on('click', 'li', function(){  
                                    $('#search').val($(this).text());  
                                    $('#bookList').fadeOut();  
                                });                            
                    });
});
</script>
@endsection
