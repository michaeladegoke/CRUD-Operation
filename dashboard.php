<?php 
    include('./config/db.php');
    include('./include_folder/header.php');
    include('./include_folder/nav.php');

    $details = ['first_name'=> '',  'last_name'=> '',  'email'=>'', 'gender'=>''];
    $Fname = $Lname = $email = $gender = '';

    if(isset($_POST['submit'])) {
    
        if(isset($_POST['first_name'])) {
            if(empty($_POST['first_name'])) {
                $details['first_name'] = 'First name is empty';
            }
            else{
                $Fname = $_POST['first_name'];
                // print_r($Fname);die;
                if (!preg_match('/^[a-zA-Z\s]+$/', $Fname)){
                    $details['first_name']= 'First name must not have number or symbol';
                }
            }
        
        }

        if(isset($_POST['last_name'])) {
            if(empty($_POST['last_name'])) {
                $details['last_name'] = 'Last name is empty';
            }
            else{
                $Lname = $_POST['last_name'];
                // print_r($Fname);die;
                if (!preg_match('/^[a-zA-Z\s]+$/', $Lname)){
                    $details['last_name']= 'last name must not have number or symbol';
                }
            }
        
        }

        if(isset($_POST['email'])) {
            if(empty($_POST['email'])) {
                $details['email'] = 'email must not be empty';
            }
            else{
                $email = $_POST['email'];
                // print_r($email);die;
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $details['email']= 'Email is not valid';
                }
            }
        
        }

        if(isset($_POST['gender']['name'])) {


            if(empty($_POST['gender'])) {
                $details['gender'] = 'Choose a gender';
                echo 1;die;


            }
            else{
                // $gender = $_POST['gender'];
                 $gender = filter_var($_POST['name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                // $gender = filter_input(INPUT_POST,'gender',FILTER_SANITIZE_FULL_SPECIAL_CHARS);
                if (filter_input(INPUT_POST,'gender',$gender)){
                    $details['email']= 'Email is not valid';
                }
            }
        
        }

        if(isset($_POST['submit'])) {
            $Fname= $_POST['first_name'];
            $Lname= $_POST['last_name'];
            $email= $_POST['email'];
            $gender= $_POST['gender'];

            $sql = "INSERT INTO validate (first_name, last_name, email, gender)
            VALUE(' $Fname', ' $Lname', ' $email', ' $gender')";
        }else{
            echo 'Error: ' . mysqli_error($conn);
        }

        

    }

?>
<body>
    
    <div class="container">
        <div class="text-center mb-4">
            <h3>Add new user</h3>
            <p class="text-muted">Complete the form below to add new user</p>
        </div>
    
       <div class="container d-flex justify-content-center">
         <form action="<?php echo $name = htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" style="width: 
          50vw; min-width: 300px;">
            <div class="row mb-3">
                <div class="col">
                    <label for="first_name" class="form-label">First-Name</label>
                    <input type="text" name="first_name" class="form-control" placeholder="enter field">
                    <p class="text-danger"><?=  $details['first_name']?></p>
                </div>

                <div class="col">
                    <label for="last-name" class="form-label">Last_Name</label>
                    <input type="text" name="last_name" class="form-control>" placeholder="enter field">
                    <p class="text-danger"><?=  $details['last_name']?></p>
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" placeholder="Input gmail">
                   <p class="text-danger"><?=  $details['email']?></p>
            </div>

            <div class="form-group mb-3">
                <label>Gender:</label>
                <input type="radio" name="gender" id="male" value="male" class="form-check-input">
                <label for="male" class="form-input-label">Male</label>&nbsp;
                <input type="radio" class="form-check-input" name="gender" id="female" value="female" >
                <label for="female" class="form-input-label">female</label>&nbsp;
            </div>
            <p class="text-danger"><?=$details['gender']?></p>

           


            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-success" href="index.php">Save</button>
                <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
     </form>
    </div>
<?php require('./include_folder/footer.php')?>
   
    