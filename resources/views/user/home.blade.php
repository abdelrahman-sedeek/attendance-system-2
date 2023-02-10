<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>attendance</title>
    <link rel="stylesheet" href="assets/CSS/bootstrap/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    
  <nav class="navbar sticky-top bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Sticky top</a>
    @if (Route::has('login'))
                
    <div class="user-area dropdown float-right ">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            
            <a class="nav-link p-1" href="{{ route('logout') }}"
            onclick="event.preventDefault(); this.closest('form').submit();"> Logout</a>
            
        </form>
    </div>
    
    @endif
    
  </div>
</nav>
    
        @if (session()->has('message'))
                <div class="alert alert-success" role="alert">
                    {{session()->get('message')}}
                </div>
                @endif
        <div class="attendance_btn align-content-center text-center m-5 ">
            
              
                <button type="submit" class="btn btn-danger attend_btn" data-bs-toggle="modal" data-bs-target="#qr_modal">تسجيل حضور</button>
                <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#qr__leave_modal">تسجيل انصراف</button>
            
            <div class="modal fade" tabindex="-1"id="qr_modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">امسح الكود</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <div class="card-body">
                          
                            {!! QrCode::size(300)->generate(route("add_attendance")) !!}
                        </div>
                    @php
                        echo route("add_attendance");
                    @endphp
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    </div>
                  </div>
                </div>
              </div>
            
        </div>
            <div class="modal fade" tabindex="-1"id="qr__leave_modal">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">امسح الكود</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" >
                        <div class="card-body">
                            {!! QrCode::size(300)->generate(route("update_attendance")) !!}
                        </div>
                    @php
                        echo route("update_attendance");
                    @endphp
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                    </div>
                  </div>
                </div>
              </div>
            
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
<script>
  function change_uuid(){
    // $uuid=crypto.randomUUID();
    // $.ajax({
    //   type: "get",
    //   data:  
    //   url: "/get_qrcode",
    //   [
    //           somefield: "Some field value", _token: '{{csrf_token()}}',
              
    //   ],
      
    //   success: function (response) {
    //     console.log('done')
    //   }
    //   // error: function (jqXHR, exception) {
    //   //   var msg = '';
    //   //   if (jqXHR.status === 0) {
    //   //       msg = 'Not connect.\n Verify Network.';
    //   //   } else if (jqXHR.status == 404) {
    //   //       msg = 'Requested page not found. [404]';
    //   //   } else if (jqXHR.status == 500) {
    //   //       msg = 'Internal Server Error [500].';
    //   //   } else if (exception === 'parsererror') {
    //   //       msg = 'Requested JSON parse failed.';
    //   //   } else if (exception === 'timeout') {
    //   //       msg = 'Time out error.';
    //   //   } else if (exception === 'abort') {
    //   //       msg = 'Ajax request aborted.';
    //   //   } else {
    //   //       msg = 'Uncaught Error.\n' + jqXHR.responseText;
    //   //   }
    //   // }
    // });
    $('.attend_btn').click( { 
      
      $.get("/get_qrcode",function ($qr) {
            

        },
        
      );
      
    });

  }
  
  console.log('hi')
  let interval=1;
  setInterval(change_uuid(), 10000);
</script>
</html> 