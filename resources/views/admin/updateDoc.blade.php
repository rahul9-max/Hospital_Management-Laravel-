
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Corona Admin</title>
   <!-- <base> can help ensure that your application's relative URLs work correctly regardless 
   of the server configuration or the application's location within the domain. -->
    <base href="/public">
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
     <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
              @if(session()->has('message'))
              <div class="alert alert-success mt-2">
              {{session()->get('message')}}
              <button type="button" class="close" data-dismiss="alert">
                X
                </button>
              </div>
              @endif
                <div class="card-header">
                    <h4 class="flex justify-content-center">Doctor Registration Form</h4>
                </div>
                <div class="card-body">
                    <form action="{{route('edit_doc',$doctors->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Doctor Name</label>
                            <input type="text" class="form-control" value="{{$doctors->name}}" style="color:black;" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="tel" class="form-control" value="{{$doctors->phone}}" style="color:black;" name="phone" required>
                        </div>
                        <div class="form-group">
                            <label for="speciality">Speciality</label>
                            <select class="form-control" style="color:black;" name="speciality" required>
                                <option value="" disabled selected>{{$doctors->speciality}}</option>
                                <option value="Dermatologist">Dermatologist</option>
                                <option value="Cardiology">Cardiology</option>
                                <option value="Psychiatrist">Psychiatrist</option>
                                <option value="Nephrologists">Nephrologists</option>
                                <option value="Orthopedic">Orthopedic</option>
                                <!-- Add more options as needed -->
                            </select>
                            <!-- <input type="text" class="form-control" value="{{$doctors->speciality}}" style="color:black;" name="speciality" required> -->
                        </div>
                        <div class="form-group">
                            <label for="room_no">Room No</label>
                            <input type="text" class="form-control" style="color:black;" value="{{$doctors->room_no}}" name="room_no" required>
                        </div>
                        <div class="form-group">
                            <label for="doctor_image">Old Image</label>
                            <!-- <input type="file" class="form-control" id="doctor_image" name="doctor_image" accept="image/*" required> -->
                            <img height="150px" width="150px" src="doctorImage/{{$doctors->image}}" name="doctor_image" >
                        </div>
                        <div class="form-group">
                          <label>New Image</label>
                          <input type="file" class="form-control" name="image">
                          </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

   @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>