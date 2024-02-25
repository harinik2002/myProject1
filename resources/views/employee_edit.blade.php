<!DOCTYPE html>
<html>

<body>
    <h1>Edit Employee</h1>
    <form action="/edit/{{$employee->id}}" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" id="name" name="name" placeholder="Enter name" value="{{ $employee->name }}" required /></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email_id" placeholder="Enter email" value="{{ $employee->email_id }}" required /></td>
            </tr>
            <tr>
                <td><label for="phone_number">Phone number:</label></td>
                <td><input type="tel" id="phone_number" name="phone_number" placeholder="Enter phone number" value="{{ $employee->phone_number }}" required /></td>
            </tr>
            <tr>
                <td><label for="department">Department:</label></td>
                <td>
                    <select id="department" name="department" required>
                        <option value="">Select Department</option>
                        <option value="Development" {{ $employee->department == 'Development' ? 'selected' : '' }}>Development</option>
                        <option value="HR" {{ $employee->department == 'HR' ? 'selected' : '' }}>HR</option>
                        <option value="Testing" {{ $employee->department == 'Testing' ? 'selected' : '' }}>Testing</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="photo">Photo:</label></td>
                <td>
                    @if($employee->photo)
                        <img src="{{ asset('storage/photos/' . $employee->photo) }}" alt="Current Photo" style="max-width: 100px; max-height: 100px;"><br>
                        <input type="text" value="{{ $employee->photo }}" readonly><br>
                    @else
                        No photo available<br>
                    @endif
                    <input type="file" id="photo" name="photo" placeholder="upload photo" />
                </td>
            </tr>
            @if($errors->any())
                <tr>
                    <td colspan="2">
                        <div class="alert alert-danger" style="color: red;">
                            {{ $errors->first() }}
                        </div>
                    </td>
                </tr>
            @endif
            <tr>
                <td colspan="2">
                    <input type="submit" value="Update employee" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
