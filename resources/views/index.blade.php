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
                       @include('form')
                </div>
            </div>
        </div>

        <div class="col-md-7">
        <div class="card mt-5 mb-3">
            <div class="card-body">
                <h5 class="card-title">List of Students</h5>
                <p class="card-text">Students Who Recently Submitted their Assignments</p>

                @include('studentList')

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
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">List of students</h5>
                        <p class="card-text">Submitted assignments of all student.</p>

                            @include('studentList')

                    </div>  
                </div>
       
                </section>
            </div>
        </div>
    </div>

@elseif($layout == 'edit')
    <section class="container" style="width: 35%">
        <div class="card mt-5 mb-3">
            <div class="card-body">
            <h5 class="card-title">Update Information</h5>
            @include('form')
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