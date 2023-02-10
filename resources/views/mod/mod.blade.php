<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>QR code</title>
</head>
<body>
    <div class="container-fluid  bg-light">
    </div>
   
        <nav class="container  navbar  ms-auto">
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
          
        </nav>
        </div>
    </div>
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
                <div class="card-body"  id="attendance_card">
                  
                    {!! QrCode::size(300)->generate(route("add_attendance",$uuid->qr_code)) !!}
                </div>
            @php
                echo route("add_attendance",$uuid->qr_code);
            @endphp
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
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
                    {!! QrCode::size(300)->generate(route("update_attendance",$uuid->qr_code)) !!}
                </div>
            @php
                echo route("update_attendance",$uuid->qr_code);
            @endphp
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            </div>
          </div>
        </div>
      </div>
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script>
function hh()
{
    window.location="{{route('update_qrcode')}}"
}

 setInterval(hh, 5*60*1000);

</script>

</html>