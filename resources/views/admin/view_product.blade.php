<!DOCTYPE html>
<html>
  <head> 
    @include('admin.css')
    <style>
        .div_deg{
            display:flex;
            justify-content: center;
            align-items: center;
            margin-top: 16px;
        }
        .table_deg{
            border: 2px solid greenyellow;
        }
        th{
            background-color: skyblue;
            color: white;
            font-size: 19px;
            font-weight: bold;
            padding:15px;
        }
        input[type='search']{
            width:500px;
            height: 60px;
            margin-left: 50px;
        }
        td{
            border: 1px solid skyblue;
            text-align: center;
            color:white;
        }
    </style>
  </head>
  <body>
    @include('admin.header')
    @include('admin.sidebar')
      <!-- Sidebar Navigation end-->
      <div class="page-content">
        <div class="page-header">
          <div class="container-fluid">
          
          <form method="get" action="{{url('product_search')}}" >
            @csrf
            <input type="search" name="search">
            <input type="submit" class="btn btn-secondary" value="Search">
          </form>

            <div class="div_deg">
                <table class="table_deg">
                    <tr>
                        <th>Product Title</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Image</th>
                        <th>Edit</th>
                        <th>Delete</th>
                       
                    </tr>
                   @foreach($product as $products)
                   <tr>
                        <td>{{$products->title}}</td>
                        <!-- <td>{{$products->description}}</td>   -->   <!--shows complete description -->
                        <td>{!!Str::limit($products->description,50)!!}</td>    <!-- shows only 50 characters if you use words in place of limit it wil give 50 words -->
                        <td>{{$products->category}}</td>
                        <td>{{$products->price}}</td>
                        <td>{{$products->quantity}}</td>
                        <td>
                            <img height="120" width="120" src="products/{{$products->image}}">
                        </td>
                        <td>
                            <a class="btn btn-success" href="{{url('update_product',$products->slug)}}">Edit</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="confirmation(event)" href="{{url('delete_product',$products->id)}}">Delete</a>
                        </td>
                        
                    </tr>
                   @endforeach
                </table>
              
            </div>
          <div class="div_deg">
          {{$product->links()}}
          <!-- {{$product->onEachSide(3)->links()}} --> <!-- it will show some page numbers instead of all the page numbers -->
          </div>

          </div>
      </div>
    </div>
    <!-- JavaScript files-->
    <script type="text/JavaScript">
        function confirmation(ev)
        {
            ev.preventDefault();
            var urlToRedirect = ev.currentTarget.getAttribute('href');
            console.log(urlToRedirect);

            swal({
                title:"Are you sure to delete this",
                text:"This delete will be permanent",
                icon:"warning",
                buttons:true,
                dangerMode:true,
            })
            .then((willCancel)=>{
                if(willCancel)
            {
                window.location.href=urlToRedirect;
            }
            });
        }
     </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
     integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" 
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{asset('/admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/popper.js/umd/popper.min.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery.cookie/jquery.cookie.js')}}"> </script>
    <script src="{{asset('/admincss/vendor/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('/admincss/vendor/jquery-validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('/admincss/js/charts-home.js')}}"></script>
    <script src="{{asset('/admincss/js/front.js')}}"></script>
  </body>
</html>