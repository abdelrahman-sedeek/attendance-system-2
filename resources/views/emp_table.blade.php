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
    <div class="container all ">
        <div class="container-fluid  bg-light">

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
      {{-- <section class="container">
          
          @if (session()->has('message'))
          <div class="alert alert-success" role="alert">
              {{session()->get('message')}}
          </div>
          @endif
      </section> --}}


      <h4 class="m-5 text-center">الحضور</h4>
      <div class="table container">
        <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col text-center">الحالة</th>
                <th scope="col text-center">موعد الحضور</th>
                <th scope="col text-center">اسم الموظف</th>
                <th scope="col text-center">#</th>
            </tr>
        </thead>
        <tbody>
            
            <?php 
               
                $counte=1; ?>
            @foreach ($user as $user)
            
            
               
               <tr>
                
                <td>{{$user->name}}</td>
                <th scope="row">{{$counter}}</th>
            
            </tr>
            @endforeach
            
            
        </tbody>
        </table>

      </div>
      <div class="add_emp_btn text-center m-3">
        <button class="btn btn-danger"  data-bs-toggle="modal" type="submit" data-bs-target="#addEmp-modal">اضافة موظف</button>
      </div>
      <div class="modal fade" tabindex="-1"id="addEmp-modal">
        <div class="modal-dialog">
          <name class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">اضافة موظف </h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" >
                <div class="card-body ">
                    <form action="{{route('add_employee')}}" method="POST">
                        @csrf
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label float-end text-end">الاسم</label>
                          <input type="text" class="form-control" name="name" >
                          
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label float-end text-end">البريد</label>
                          <input type="email" class="form-control"  name="email" aria-describedby="emailHelp" >
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label float-end text-end">كلمه السر</label>
                          <input type="password" class="form-control" name="password">
                        </div>
                        <label  class="form-label float-end text-end">اختر الصلاحية</label>
                        <div class="mb-3">
                            <select id="Select" name="user_type"class="form-select">
                                <option value="0">موظف</option>
                                <option value="1">مسؤل</option>
                              </select>
                            

                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>
          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            </div>
          </name
        </div>
      </div>
    
</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>