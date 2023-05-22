<html lang="en">
    <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/4.7.0/css/font-awesome.min.css">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css"
        href="//cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
        <title>Admin | Dashboard | All Products</title>
        <style>
            body{
                margin-left: 5%;
                margin-right: 5%;
                margin-top: 2%;
            }
            fieldset{
                background-color: rgb(235, 235, 235);
                padding: 20px;
                border-radius: 10px;
                box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px; 
            }
            tbody td {
                text-align: center;
                color: black;
            }
        </style>
    </head>
    <body>
    <div class="row">
        <div class="col-lg-12 margin-tb d-flex align-items-center">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success me-3 mx-2" href="{{ route('products.create') }}">Create New Product</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                <button class="btn btn-success ms-2" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</button>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <fieldset>
      @php
      $i = 1;
      @endphp
      <table id="ProductTable" class="table table-striped table-responsive table-bordered">
        <thead class="bg-light">
          <tr>
            <!-- <th>Id</th> -->
            <th>Name</th>
            <th>Details</th>
            <th>Price</th>
            <th>Category</th>
            <th>Image</th>
            <th width="280px">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($products as $product)
          <tr>
            <!-- <td>{{ $product->id}}</td> -->
            <td>{{ $product->name }}</td>
            <td>{{ $product->detail }}</td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->category }}</td>
            <td><img src="/image/{{ $product->image }}" width="80px" height="80px"></td>
            <td>
              <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </fieldset>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#ProductTable').DataTable({
        "pagingType": "full_numbers",
        "lengthMenu": [
          [5, 10, 25, 50, -1],
          [5, 10, 25, 50, "All"]
        ],
        responsive: true,
        language: {
          search: "_INPUT_",
          searchPlaceholder: "Search",
        }
      });
    });
  </script>
    </body>
</html>
