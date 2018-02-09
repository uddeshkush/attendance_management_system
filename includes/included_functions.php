<?php
function redirect_to($new_location)
{
	header("Location: " . $new_location);
	exit;
}
function confirm_query($result_set)
{
	if(!$result_set)
	{
		die("Database query failed. ");
	}
}
function find_admin_by_username($username)
{
	global $connection;
	$safe_username = mysqli_real_escape_string($connection,$username);
	$query = "SELECT * FROM ADMIN WHERE USERNAME ='{$safe_username}' LIMIT 1";
	$admin_set = mysqli_query($connection,$query);
	confirm_query($admin_set);
	if($admin = mysqli_fetch_assoc($admin_set))
	{
		return $admin;
	}
	else
	{
		return null;
	}
}
function password_encrypt($password)
{
	$hash_format = "$2y$10$";  //tells to use blowfish
	$salt_length = 22;
	$salt = generate_salt($salt_length);
	$format_and_salt = $hash_format . $salt;
	$hash = crypt($password, $format_and_salt);
	return $hash;
}
function generate_salt($length)
{
	$unique_random_string = md5(uniqid(mt_rand(),true));
	$base64_string = base64_encode($unique_random_string);
	$modified_base64_string = str_replace('+', '.', $base64_string);
	$salt = substr($modified_base64_string, 0, $length);
	return $salt;
}
function password_check($password,$existing_hash)
{
	$hash = crypt($password,$existing_hash);
	if($hash === $existing_hash)
	{
		return true;
	}
	else
	{
		return false;
	}
}
function attempt_login($username,$password)
{
	$admin = find_admin_by_username($username);
	if($admin)
	{   //found admin,now check password
		if(password_check($password,$admin["HASHED_PASSWORD"]))
		{
			//password matches
			return $admin;
		}
		else
		{
			//password does not match
			return false;
		}
		
	}
	else
	{
		//admin not found
		return false;
	}
}
function find_faculty_by_username($username)
{
	global $connection;
	$safe_username = mysqli_real_escape_string($connection,$username);
	$query = "SELECT * FROM FACULTY WHERE USERNAME ='{$safe_username}' LIMIT 1";
	$faculty_set = mysqli_query($connection,$query);
	confirm_query($faculty_set);
	if($faculty = mysqli_fetch_assoc($faculty_set))
	{
		return $faculty;
	}
	else
	{
		return null;
	}
}

function attempt_login_faculty($username,$password)
{
	$faculty = find_faculty_by_username($username);
	if($faculty)
	{
		//found faculty,now check password
		if(password_check($password,$faculty["HASHED_PASSWORD"]))
		{
			//password matches
			return $faculty;
		}
		else
		{
			//password does not match
			return false;
		}
		
	}
	else
	{
		//faculty not found
		return false;
	}
}

function find_student_by_name($name)
{
	global $connection;
	$safe_name = mysqli_real_escape_string($connection,$name);
	$query = "SELECT * FROM STUDENT WHERE NAME ='{$safe_name}' LIMIT 1";
	$student_set = mysqli_query($connection,$query);
	confirm_query($student_set);
	if($student = mysqli_fetch_assoc($student_set))
	{
		return $student;
	}
	else
	{
		return null;
	}
}

function attempt_login_student($name,$course)
{
	$student = find_student_by_name($name);
	if($student)
	{
		//found student,now check course
		if($course==$student["COURSE"])
		{
			//COURSE matches
			return $student;
		}
		else
		{
			//COURSE does not match
			return false;
		}
		
	}
	else
	{
		//student not found
		return false;
	}
}

function confirm_logged_in()
{
	if(!isset($_SESSION["username"]))
    {
	redirect_to("index.php");
    }
}
function confirm_logged_in_student()
{
	if(!isset($_SESSION["name"]))
    {
	redirect_to("index.php");
    }
}
?>