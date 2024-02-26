<!DOCTYPE html>
<html>
<head>
    <title>All Employees</title>
</head>
<body>
    <h1>All Employees</h1>
    <table border="1">
        <thead>
            <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone Number</th>
                <th>Department</th>
                <th>photo</th>
                <th>edit</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($employees as $employee): ?>
            <tr>
                <td><?php echo $employee->id; ?></td>
                <td><?php echo $employee->name; ?></td>
                <td><?php echo $employee->email_id; ?></td>
                <td><?php echo $employee->phone_number; ?></td>
                <td><?php echo $employee->department; ?></td>
                <td>
                    <?php if($employee->photo): ?>
                        <img src="<?php echo asset('storage/photos/' . $employee->photo); ?>" alt="Employee Photo" style="max-width: 100px; max-height: 100px;">
                    <?php else: ?>
                        No photo available
                    <?php endif; ?>
                </td>

                <td><a href="/edit/<?php echo $employee->id; ?>">Edit</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

<a href="logout">Logout</a>
</html>

