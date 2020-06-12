@if($layout == 'index')
<form action="{{ url('/store') }}" method="post" enctype="multipart/form-data">
@elseif($layout == 'edit')
<form action="{{ url('/update/'.$student->id) }}" method="post" action="patchlink" enctype="multipart/form-data">
    @method('PATCH')
@endif        
@csrf

    <div class="form-group">
        <label>Roll Id</label>
        <input name="roll_id" value="{{ $layout=='index' ? old('roll_id') : $student->roll_id }}" type="text" class="form-control"  placeholder="Enter your Roll Id">
        <small class="text-danger">{{ $errors->first('roll_id') }}</small>
    </div>
    <div class="form-group">
        <label>First Name</label>
        <input name="firstName" value="{{ $layout=='index' ? old('firstName') : $student->firstName }}" type="text" class="form-control"  placeholder="Enter the first name">
        <small class="text-danger">{{ $errors->first('firstName') }}</small>
    </div>

    
    <div class="form-group">
        <label>Second Name</label>
        <input name="secondName" value="{{ $layout=='index' ? old('secondName') : $student->secondName }}" type="text" class="form-control"  placeholder="Enter second name">
        <small class="text-danger">{{ $errors->first('secondName') }}</small>
    </div>
    
    <div class="form-group">
        <label>Faculty</label>
        <input name="faculty" value="{{ $layout=='index' ? old('faculty') : $student->faculty }}" type="text" class="form-control"  placeholder="Enter the faculty">
        <small class="text-danger">{{ $errors->first('faculty') }}</small>
    </div>
    <div class="form-group">
        <label>Assignment Title</label>
        <input name="assignment_title" value="{{ $layout=='index' ? old('assignment_title') : $student->assignment_title }}" type="text" class="form-control"  placeholder="Enter the assignment title">
        <small class="text-danger">{{ $errors->first('assignment_title') }}</small>
    </div>
    <div class="form-group">
        <label>Assignment</label>
        <input name="assignment_file" value="{{ $layout=='index' ? old('assignment_file') : $student->assignment_file }}" type="file" class="form-control"  placeholder="">
        <small class="text-danger">{{ $errors->first('assignment_file') }}</small>
    </div>
    <input type="submit" class="btn btn-info" value="Save">
    <input type="reset" class="btn btn-warning" value="Reset">

</form>