
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
    <!-- plugins:css -->
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
      <div class="row p-0 m-0 proBanner" id="proBanner">
        <div class="col-md-12 p-0 m-0">
          <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
            <div class="ps-lg-1">
              <div class="d-flex align-items-center justify-content-between">
                <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and more with this template!</p>
                <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo" target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
              </div>
            </div>
            <div class="d-flex align-items-center justify-content-between">
              <a href="https://www.bootstrapdash.com/product/corona-free/"><i class="mdi mdi-home me-3 text-white"></i></a>
              <button id="bannerClose" class="btn border-0 p-0">
                <i class="mdi mdi-close text-white me-0"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <!-- partial:partials/_sidebar.html -->
    @include('admin.sidebar')
     @include('admin.navbar')
     <div class="container body-page-wrapper mt-5">
     <div class="container mt-5">
    <table class="table table-bordered  rounded" style="border-radius: 10px;">
      <thead >
      <tr>
            <th class="bg-primary text-white">Doctor Name</th>
            <th class="bg-secondary text-white">Phone</th>
            <th class="bg-success text-white">Speciality</th>
            <th class="bg-warning text-dark">Image</th>
            <th class="bg-success text-white">Delete</th>
            <th class="bg-danger text-white">Update</th>
        </tr>
      </thead>
      <tbody>
        @foreach($doctors as $doc)
        <tr>
          <td class="py-3 bg-light">{{$doc->name}}</td>
          <td class="py-3 bg-light">{{$doc->phone}}</td>
          <td class="py-3 bg-light">{{$doc->speciality}}</td>
          <td class="py-3 bg-light"><img height="150px" width="150px" src="doctorImage/{{$doc->image}}"></td>
          <td class="bg-light">
                <a href="{{url('deleteDoc',['id'=>$doc->id])}}" onclick="return confirm('are you sure,you want to delete this?')" class="btn btn-danger btn-rounded btn-vertical-center">
                    <span class="mx-auto">Delete</span>
                </a>
            </td>
            <td class="bg-light">
                <a href="{{url('updateDoc',['id'=>$doc->id])}}" class="btn btn-success btn-rounded btn-vertical-center">
                    <span class="mx-auto">Update</span>
                </a>
            </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>