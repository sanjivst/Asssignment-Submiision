
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">Roll Id</th>
                <th scope="col">First name</th>
                <th scope="col">Second Name</th>
                <th scope="col">Faculty</th>

                @if($layout == 'teacher')
                <th scope="col">Assignment Title</th>
                <th scope="col">Assignment File</th>
                <th scope="col">Operations</th>
                @endif

            </tr>
            </thead>
            <tbody>
            @foreach($students as $student)
                <tr>
                
                    <td>{{ $student->roll_id }}</td>
                    <td>{{ $student->firstName }}</td>
                    <td>{{ $student->secondName }}</td>
                    <td>{{ $student->faculty }}</td>
                    
                    @if($layout == 'teacher')
                    <td>{{ $student->assignment_title }}</td>
                    <td>
                        <a href="/storage/{{ $student->assignment_file }}" target="_blank">
                            <span class="btn btn-outline-dark">Assignment</span>    
                        </a>
                    </td>
                    
                    <td>
                        <a href="{{ url('/edit/'.$student->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <a href="{{ url('/delete/'.$student->id) }}" class="btn btn-sm btn-danger">Delete</a>

                    </td>
                    @endif

                </tr>
            @endforeach
            </tbody>
        </table>
    
