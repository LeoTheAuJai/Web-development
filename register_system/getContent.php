<?php
if (isset($_GET['option'])) {
    $option = $_GET['option'];
    switch ($option) {
        case 'Teacher':
     	    echo '<form action="signupTForm.php" method="post">

				Teacher ID<input type="text" name="teacher_id" placeholder="Teacher ID" required>
				First Name<input type="text" name="first_name" placeholder="First Name" required>
				Last Name<input type="text" name="last_name" placeholder="Last Name" required>
				Date of Birth<input type="date" name="date_of_birth" placeholder="Date of Birth" required>
				Gender<select name="gender" required>
					<option value="">Select Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Other</option>
				</select>
				Qualification<input type="text" name="qualification" placeholder="For multiple qualification, please use <,> to denote for each one">
				Years of Experience<input type="number" name="working_experience" placeholder="Years of Experience" min="0">
				Department<input type="text" name="department" placeholder="Department">
				Phone Number<input type="number" name="phone_number" placeholder="Phone Number" required>
				Email Address<input type="email" name="email_address" placeholder="Email Address" required>
			    <button type="submit">Sign Up</button>
				</form>';
            break;
        case 'Student':
     	    echo '<form action="signupSForm.php" method="post">
				Student ID<input type="text" name="student_id" placeholder="Student ID" required>
				First Name<input type="text" name="first_name" placeholder="First Name" required>
				Last Name<input type="text" name="last_name" placeholder="Last Name" required>
				Date of Birth<input type="date" name="date_of_birth" placeholder="Date of Birth" required>
				Gender
				<select name="gender" required>
					<option value="">Select Gender</option>
					<option value="Male">Male</option>
					<option value="Female">Female</option>
					<option value="Other">Other</option>
				</select>
				Grade level
				<select name="gradelevel" required>
					<option value="">Select Grade</option>
					<option value="HD">Higher Diploma</option>
					<option value="Ba">Bachelor</option>
					<option value="DYJ">Diploma of Yi Jin</option>
				</select>
				Email<input type="text" name="email" placeholder="email" required>
				Address<input type="text" name="address" placeholder="Address" required>
				Phone Number<input type="number" name="phoneNumber" placeholder="Phone Number" required>
				Guardian<input type="text" name="guardian_info" placeholder="Guardian Info" required>
			    <button type="submit">Sign Up</button>
				</form>';
            break;
        case 'Staff':
     	    echo '<form action="signupGForm.php" method="post">
				User code<input type="text" name="user_code" placeholder="User code" required>
				User Name<input type="text" name="user_name" placeholder="User Name" required>
				User Password<input type="text" name="user_password" placeholder="User Password" required>
				Email Address<input type="email" name="user_email_addr" placeholder="user_email_addr" required>
				User Role<select name="user_role" required>
					<option value="">Select position</option>
					<option value="Manager">Manager</option>
					<option value="Admin">Admin</option>
				</select>
			    <button type="submit">Sign Up</button>
				</form>';
            break;
        default:
            echo 'Invalid option selected.';
    }
} else {
    echo 'No option selected.';
}
?>