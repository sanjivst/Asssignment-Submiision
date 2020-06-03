<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    
    <title>Classroom</title>
</head>
<body>

<!-- Navbar Section -->
<section>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{url('/')}}">Classroom</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link " href="{{url('/create')}}">Create</a>
                </div>
            </div>
        </div>
    </nav>
</section>

<!-- Student Form Submission Section -->
<section class="container">
    <div class="row">
        <div class="col-md-5">
        <div class="card mt-5 mb-3">
        <div class="card-body">
            <h5 class="card-title">Dear Student, Submit your asssignment here.</h5>
            <form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Roll Id</label>
                    <input name="roll_id" type="text" class="form-control"  placeholder="Enter your Roll Id">
                </div>
                <div class="form-group">
                    <label>First Name</label>
                    <input name="firstName" type="text" class="form-control"  placeholder="Enter the first name">
                </div>

                
                <div class="form-group">
                    <label>Second Name</label>
                    <input name="secondName" type="text" class="form-control"  placeholder="Enter second name">
                </div>
                
                <div class="form-group">
                    <label>Faculty</label>
                    <input name="faculty" type="text" class="form-control"  placeholder="Enter the faculty">
                </div>
                <div class="form-group">
                    <label>Assignment Title</label>
                    <input name="assignment_title" type="text" class="form-control"  placeholder="Enter the faculty">
                </div>
                <div class="form-group">
                    <label>Assignment</label>
                    <input name="assignment_file" type="file" class="form-control"  placeholder="Enter Sepeciality">
                </div>
                <input type="submit" class="btn btn-info" value="Save">
                <input type="reset" class="btn btn-warning" value="Reset">

            </form>
        </div>
    </div>
        </div>
    </div>

</section>


    
</body>
</html>