
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
        <div class="container-fluid body-page-wrapper mt-5">
        <div class="table-responsive mt-5">
        <table class="table table-striped">
    <thead>
        <tr>
            <th class="bg-primary text-white">Customer Name</th>
            <th class="bg-secondary text-white">Email</th>
            <th class="bg-success text-white">Doctor Name</th>
            <th class="bg-warning text-dark">Message</th>
            <th class="bg-secondary text-white">Status</th>
            <th class="bg-success text-white">Approved</th>
            <th class="bg-danger text-white">Cancelled</th>
            <th class="bg-secondary text-white">Email</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $appoint)
        <tr>
            <td class="bg-light">{{$appoint->name}}</td>
            <td class="bg-light">{{$appoint->email}}</td>
            <td class="bg-light">{{$appoint->doctor}}</td>
            <td class="bg-light">{{$appoint->message}}</td>
            <td class="bg-light">{{$appoint->status}}</td>
            <td class="bg-light">
                <a href="{{url('approveAppoint',['id'=>$appoint->id])}}" class="btn btn-success btn-rounded btn-vertical-center">
                    <span class="mx-auto">Approved</span>
                </a>
            </td>
            <td class="bg-light">
                <a href="{{url('cancelAppoint',['id'=>$appoint->id])}}" class="btn btn-danger btn-rounded btn-vertical-center">
                    <span class="mx-auto">Cancel</span>
                </a>
            </td>
            <td class="bg-light">
                <a href="{{url('viewEmail',['id'=>$appoint->id])}}" class="btn btn-primary btn-rounded btn-vertical-center">
                    <span class="mx-auto">Send Email</span>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
        </div>
   @include('admin.script')
  
  </body>
</html>