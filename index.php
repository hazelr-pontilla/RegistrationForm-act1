<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Registration Form</title>

    <style type="text/css">
        div {margin-bottom:5px;}
        div span {display: inline-block; width:90px; float; }
    </style>    

</head>
<body>
    
    <h1>Registration Form</h1>

    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $has_error = FALSE;
            
            // fullname here
            if(empty($_POST['fullname']))
            {
                $has_error = TRUE;
                $name_error_msg = 'This name field is required.';
            }
            else
            {
                $name = trim(htmlspecialchars($_POST['fullname']));
            }

            // email here
            if(empty($_POST['email']))
            {
                $has_error = TRUE;
                $email_error_msg = 'The email field is required.';
            }
            else
            {
                $email = trim(htmlspecialchars($_POST['email']));

                if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $has_error = TRUE;
                    $email_error_msg = 'Please provide a valid email address.';
                }
            }

            // password here
            if(empty($_POST['password']))
            {
                $has_error = TRUE;
                $password_error_msg = 'The password field is required.';
            }
            else{
                $password = trim(htmlspecialchars($_POST['password']));

                if(strlen($password) < 8)
                {
                    $has_error = TRUE;
                    $password_error_msg = 'The password should consist of at least 8 characters.';
                }
            }

            // website here
            if(empty($_POST['website']))
            {
                $has_error = TRUE;
                $website_error_msg = 'The website field is required.';
            }
            else
            {
                $website = trim(htmlspecialchars($_POST['website']));

                if(!filter_var($website, FILTER_VALIDATE_URL))
                {
                    $has_error = TRUE;
                    $website_error_msg = 'Please provide a valid website URL.';
                }
            }

            //address here
            if(empty($_POST['address']))
            {
                $has_error = TRUE;
                $address_error_msg = 'The address field is required.';
            }
            else
            {
                $address = trim(htmlspecialchars($_POST['address']));
            }

            //civil status
            if(empty($_POST['civil_status']))
            {
                $has_error = TRUE;
                $civil_status_error_msg = 'The civil status field is required.';
            }
            else
            {
                $civil_status = trim(htmlspecialchars($_POST['civil_status']));
            }

            //gender here
            if(empty($_POST['gender']))
            {
                $has_error = TRUE;
                $gender_error_msg = 'The gender field is required.';
            }
            else
            {
                $gender = trim(htmlspecialchars($_POST['gender']));
            }

            if( $has_error == FALSE)
            {
                echo '<strong>Name: </strong> '.$name. '<br>';
                echo '<strong>Email: </strong> '.$email. '<br>';
                echo '<strong>Password: </strong> '.$password. '<br>';
                echo '<strong>Website: </strong> '.$website. '<br>';
                echo '<strong>Address: </strong> '.$address. '<br>';
                echo '<strong>Civil Status: </strong> '.$civil_status. '<br>';
                echo '<strong>Gender: </strong> '.$gender. '<br>';

                echo '<hr>';

                $name = '';
                $email = '';
                $password = '';
                $website = '';
                $address = '';
                $civil_status = '';
                $gender = '';
                
            }
            


        }
    ?>

    <br>
    <form action="" method="post">
        <div><span>Name:</span><input type="text" name="fullname" value="<?php if(isset($name)) echo $name; ?>">
        <?php if(isset($name_error_msg)) echo $name_error_msg; ?>
        </div>

        <div><span>Email:</span><input type="text" name="email" value="<?php if(isset($email)) echo $email; ?>"> 
        <?php if(isset($email_error_msg)) echo $email_error_msg; ?>
        </div>

        <div><span>Password:</span><input type="password" name="password" value="<?php if(isset($password)) echo $password; ?>">
        <?php if(isset($password_error_msg)) echo $password_error_msg; ?>
        </div>

        <div><span>Website:</span><input type="text" name="website" value="<?php if(isset($website)) echo $website; ?>">
        <?php if(isset($website_error_msg)) echo $website_error_msg; ?>
        </div>

        <div><span>Address:</span><textarea name="address"> <?php if(isset($address)) echo $address; ?> </textarea>
        <?php if(isset($address_error_msg)) echo $address_error_msg; ?>
        </div>

        <div><span>Civil Status:</span>
            <select name="civil_status">
                <option <?php if(isset($civil_status_error_msg) && $civil_status == 'single') echo 'selected'; ?> 
                value="single">Single</option>
                <option <?php if(isset($civil_status_error_msg) && $civil_status == 'married') echo 'selected'; ?> 
                value="married">Married</option>
                <option <?php if(isset($civil_status_error_msg) && $civil_status == 'widowed') echo 'selected'; ?> 
                value="widowed">Widowed</option>
                <option <?php if(isset($civil_status_error_msg) && $civil_status == 'separated') echo 'selected'; ?> 
                value="separated">Separated</option>
                <option <?php if(isset($civil_status_error_msg) && $civil_status == 'divorced') echo 'selected'; ?> 
                value="divorced">Divorced</option>
            </select>
            <?php if(isset($civil_status_error_msg)) echo $civil_status_error_msg; ?>
        </div>

        <div><span>Gender:</span>
            <label><input <?php if(isset($gender) && $gender == 'male') echo 'checked'; ?>
                type="radio" name="gender" value="male">Male</label>
            <label><input <?php if(isset($gender) && $gender == 'female') echo 'checked'; ?>
                type="radio" name="gender" value="female">Female</label>
            <?php if(isset($gender_error_msg)) echo $gender_error_msg; ?>
        </div>
        <input type="submit" name="btnSubmit" value="Submit">


    </form>

</body>
</html>