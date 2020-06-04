<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <title>Classroom</title>
</head>
<body>

<!-- Navbar Section -->
<section>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">
                <span class="title-navbar">Assignment Submission Form</span>
            </a>
        </div>
    </nav>
</section>

@if($layout == 'index')
<!-- Student Form Submission Section -->
<section class="container">
    <div class="row">

        <div class="col-md-5">
            <div class="card mt-5 mb-3">
                <div class="card-body">
                    <h5 class="card-title">Dear Student, Submit Your Asssignment Here</h5>
                    <form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Roll Id</label>
                            <input name="roll_id" value="{{ old('roll_id') }}" type="text" class="form-control"  placeholder="Enter your Roll Id">
                            <small class="text-danger">{{ $errors->first('roll_id') }}</small>
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input name="firstName" value="{{ old('firstName') }}" type="text" class="form-control"  placeholder="Enter the first name">
                            <small class="text-danger">{{ $errors->first('firstName') }}</small>
                        </div>

                        
                        <div class="form-group">
                            <label>Second Name</label>
                            <input name="secondName" value="{{ old('secondName') }}" type="text" class="form-control"  placeholder="Enter second name">
                            <small class="text-danger">{{ $errors->first('secondName') }}</small>
                        </div>
                        
                        <div class="form-group">
                            <label>Faculty</label>
                            <input name="faculty" value="{{ old('faculty') }}" type="text" class="form-control"  placeholder="Enter the faculty">
                            <small class="text-danger">{{ $errors->first('faculty') }}</small>
                        </div>
                        <div class="form-group">
                            <label>Assignment Title</label>
                            <input name="assignment_title" value="{{ old('assignment_title') }}" type="text" class="form-control"  placeholder="Enter the assignment title">
                            <small class="text-danger">{{ $errors->first('assignment_title') }}</small>
                        </div>
                        <div class="form-group">
                            <label>Assignment</label>
                            <input name="assignment_file" value="{{ old('assignment_file') }}" type="file" class="form-control"  placeholder="">
                            <small class="text-danger">{{ $errors->first('assignment_file') }}</small>
                        </div>
                        <input type="submit" class="btn btn-info" value="Save">
                        <input type="reset" class="btn btn-warning" value="Reset">

                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-7">
        <div class="card mt-5 mb-3">
                <div class="card-body">
                    <h5 class="card-title">List of Students</h5>
                    <p class="card-text">Students Who Recently Submitted their Assignments</p>

                    <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Roll Id</th>
                <th scope="col">First name</th>
                <th scope="col">Second Name</th>
                <th scope="col">Faculty</th>

            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                    <td>{{ $student->roll_id }}</td>
                    <td>{{ $student->firstName }}</td>
                    <td>{{ $student->secondName }}</td>
                    <td>{{ $student->faculty }}</td>

                </tr>
            @endforeach
            </tbody>
        </table>

                </div>
        </div>        
        </div>

    </div>

</section>

@elseif($layout == 'teacher')
    <div class="container-fluid mt-4">
        <div class="container-fluid mt-4">
            <div class="row justify-content-center">
                <section class="col-md-11">
                    @include("studentList")
                </section>
            </div>
        </div>
    </div>

@elseif($layout == 'edit')
    <section class="container" style="width: 35%">
        <div class="card mt-5 mb-3">
            <div class="card-body">
            <h5 class="card-title">Update Information</h5>
            <form action="{{ url('/update/'.$student->id) }}" method="post" action="patchlink" enctype="multipart/form-data">
            @method('PATCH')    
            @csrf
                <div class="form-group">
                    <label>Roll Id</label>
                    <input value="{{ $student->roll_id }}" name="roll_id" type="text" class="form-control"  placeholder="Enter your Roll Id">
                    <small class="text-danger">{{ $errors->first('roll_id') }}</small>
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input value="{{ $student->firstName }}" name="firstName" type="text" class="form-control"  placeholder="Enter the first name">
                    <small class="text-danger">{{ $errors->first('firstName') }}</small>
                </div>

                
                <div class="form-group">
                    <label>Second Name</label>
                    <input value="{{ $student->secondName }}" name="secondName" type="text" class="form-control"  placeholder="Enter second name">
                    <small class="text-danger">{{ $errors->first('secondName') }}</small>
                </div>
                
                <div class="form-group">
                    <label>Faculty</label>
                    <input value="{{ $student->faculty }}" name="faculty" type="text" class="form-control"  placeholder="Enter the faculty">
                    <small class="text-danger">{{ $errors->first('faculty') }}</small>
                </div>
                <div class="form-group">
                    <label>Assignment Title</label>
                    <input value="{{ $student->assignment_title }}" name="assignment_title" type="text" class="form-control"  placeholder="Enter the assignment title">
                    <small class="text-danger">{{ $errors->first('assignment_title') }}</small>
                </div>
                <div class="form-group">
                    <label>Assignment</label>
                    <input value="{{ $student->assignment_file }}" name="assignment_file" type="file" class="form-control"  placeholder="">
                    <small class="text-danger">{{ $errors->first('assignment_file') }}</small>
                </div>
                <input type="submit" class="btn btn-info" value="Save">
                <input type="reset" class="btn btn-warning" value="Reset">

            </form>
            </div>
        </div>    
    </section>

@endif

<footer></footer>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>   
</body>
</html>