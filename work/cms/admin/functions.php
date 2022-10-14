<?php
function redirect($location) {
    
    return header("Location: " . $location);
    
}

function escape($string) {
    global $connection;
    $clean = mysqli_real_escape_string($connection, trim($string));
    return $clean;
}

// function users_online(){
    
//     if(isset($_GET['onlineusers'])){
        
//     global $connection;
        
//     if(!$connection){
        
//         session_start();
        
//         include("../includes/db.php");

//         $session = session_id();
//         $time = time();
//         $time_out_in_seconds = 30;
//         $time_out = $time - $time_out_in_seconds;

//         $query = "SELECT * FROM users_online WHERE session = '$session'";
//         $send_query = mysqli_query($connection, $query);
//         confirmQuery($send_query);
//         $count = mysqli_num_rows($send_query);

//         if($count == NULL) {

//         mysqli_query($connection, "INSERT INTO users_online(session, time) VALUES('$session', '$time')");

//         }else{

//         mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");

//         } 

//         $users_online_query = mysqli_query($connection, "SELECT * FROM users_online WHERE time < '$time_out'");
//         echo $count_user = mysqli_num_rows($users_online_query);
        
//     }
//   }// get request isset 
// }

// users_online();

function confirmQuery($result){
    global $connection;
        if(!$result){
        die("QUERY FAILED ". mysqli_error($connection));
    }else{
            return true;
        }
}

function insert_categories() {
    global $connection;
        //Add Category
    if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title'];
        
        if($cat_title == "" || empty($cat_title)){
            echo "This field should not be empty";
        }else {
            
            
            $stmt = mysqli_prepare($connection, "INSERT INTO categories(cat_title) VALUE(?)");
            
            mysqli_stmt_bind_param($stmt, 's', $cat_title);
            
            mysqli_stmt_execute($stmt);
            
            confirmQuery($stmt);
            
            mysqli_stmt_close($stmt);
        }
        
    }

    // Delete function
        if(isset($_GET['delete'])) {
        $the_cat_id = $_GET['delete'];   
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id}";
        $delete_query = mysqli_query($connection, $query);

        }
}

function findAllCategories() {
    global $connection;
    
    $query = "SELECT * FROM categories";
    $select_all_categories = mysqli_query($connection,$query);

    while($row = mysqli_fetch_assoc($select_all_categories)) {
    $cat_id = $row['cat_id']; 
    $cat_title = $row['cat_title']; 

    echo "<tr>";
    echo "<td>{$cat_id}</td>";
    echo "<td>{$cat_title}</td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete'); \" class='btn btn-primary' href='categories.php?delete={$cat_id}'>Delete</a>
    <a class='btn btn-primary' href='categories.php?update=true&id={$cat_id}&title={$cat_title}'>update</a></td>";
    echo "</tr>";

    }
    
}

function recordCount($table){
    global $connection;
    
    $query = "SELECT * FROM " . $table;
    $select_all_posts = mysqli_query($connection, $query);
    $result = mysqli_num_rows($select_all_posts);
    confirmQuery($result);
    
    return $result;
    
}

function checkStatus($table,$column,$status) {
    global $connection;

    
    $query = "SELECT * FROM $table WHERE $column = '$status'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    return mysqli_num_rows($result);  
    
}

function is_admin($username) {
    global $connection;
    
    $query = "SELECT user_role FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    
    $row = mysqli_fetch_array($result);
    
    if($row['user_role'] == 'admin') {
        
        return true;
    
    } else {
        
        return false;
        
    }
}

function username_exists($username) {
    global $connection;
    
    $query = "SELECT username FROM users WHERE username = '$username'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    
    if(mysqli_num_rows($result) > 0) {
        
        return true;
        
    } else {
        
        return false;
        
    }

}

function email_exists($eamil) {
    global $connection;
    
    $query = "SELECT user_email FROM users WHERE user_email = '$eamil'";
    $result = mysqli_query($connection, $query);
    confirmQuery($result);
    
    if(mysqli_num_rows($result) > 0) {
        
        return true;
        
    } else {
        
        return false;
        
    }

}

function register_user($username, $firstname, $lastname, $email, $password) {
    
    global $connection;
    

        if(!empty($username) && !empty($firstname) && !empty($lastname) && !empty($email) && !empty($password)) {

            $username = escape($username);
            $firstname = escape($firstname);
            $lastname = escape($lastname);
            $email = escape($email);
            $password = escape($password);

            $password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12) );

            $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role)";
            $query .= " VALUES('{$username}', '{$password}', '{$firstname}', '{$lastname}', '{$email}', 'subscriber')";

            $register_user_query = mysqli_query($connection, $query);
            confirmQuery($connection);

        }else{
            echo "<script>alert('All Feilds Must Be Filled!');</script>";
        }
    }


function login_user ($username, $password) {
    global $connection;

    $username = escape($username);
    $password = escape($password);

    $query = "SELECT * FROM users WHERE username = '{$username}' ";
    $select_user_querty = mysqli_query($connection, $query);

    if(!$select_user_querty){
        die("USER QUERY FAILED! ". mysqli_error($connection));
     }

    while($row = mysqli_fetch_array($select_user_querty)){

        $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['user_password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

     }

    //$password = crypt($password, $db_user_password);



    if(password_verify($password, $db_user_password)){

        $_SESSION['username'] = $db_username;
        $_SESSION['firstname'] = $db_user_firstname;
        $_SESSION['lastname'] = $db_user_lastname;
        $_SESSION['user_role'] = $db_user_role;

        //must start at root
        redirect("/course_cms2/admin");


    }else {

        redirect("/course_cms2/index.php");


    }

}



?>