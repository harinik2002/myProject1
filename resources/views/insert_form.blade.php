<!DOCTYPE html>
<html>
<head>
    <title>Employee | Add</title>
</head>
<body>
    <form action="/create" method="post" enctype="multipart/form-data">
        @csrf
        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input type="text" id="name" name="name" placeholder="Enter name" required /></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="email_id" placeholder="Enter email" required /></td>
            </tr>
            <tr>
                <td><label for="phone_number">Phone number:</label></td>
                <td><input type="tel" id="phone_number" name="phone_number" placeholder="Enter phone number" required /></td>
            </tr>
            <tr>
                <td><label for="department">Department:</label></td>
                <td>
                    <select id="department" name="department" required>
                        <option value="">Select Department</option>
                        <option value="Development">Development</option>
                        <option value="HR">HR</option>
                        <option value="Testing">Testing</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="photo">Photo:</label></td>
                <td>
                    <input type="file" id="photo" name="photo" placeholder="Upload photo" onchange="previewImage(event)" />
                    <img id="imagePreview" src="#" alt="Photo Preview" style="display: none; max-width: 100px; max-height: 100px;">
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
                    <input type="submit" value="Add employee" />
                </td>
            </tr>
        </table>
    </form>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
