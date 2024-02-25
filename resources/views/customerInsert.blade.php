<!DOCTYPE html>
<html>
<head>
    <title>Customer | Add</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script>
        $(document).ready(function(){
            // Create a jQuery UI dialog
            $("#dialog-message").dialog({
                modal: true,
                buttons: {
                    Ok: function() {
                        $(this).dialog( "close" );
                    }
                }
            });
        });
    </script>
</head>
<body>
    <div id="dialog-message" title="Information">
        <p>Please fill the form to insert a new customer to the list.</p>
    </div>

    <form action="/create" method="post">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <table>
            <tr>
                <td><label for="customer_name">Name:</label></td>
                <td><input type="text" id="name" name="customer_name" value="{{ old('customer_name') }}" /></td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td><input type="email" id="email" name="customer_email" value="{{ old('customer_email') }}" /></td>
            </tr>

            @if ($errors->has('error'))
            <tr>
                <td colspan="2">
                    <span style="color: red(255, 0, 13);">{{ $errors->first('error') }}</span>
                </td>
            </tr>
            @endif

            <tr>
                <td colspan="2">
                    <input type="submit" value="add customer" />
                </td>
            </tr>
        </table>
    </form>
</body>
</html>

