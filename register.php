<?php
// Database connection
// require 'db_connection.php';


// try {

//     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
//         $student_name = $_POST['student_name'];
//         $dob = $_POST['dob'];
//         $address = $_POST['address'];
//         $phone = $_POST['phone'];
//         $email = $_POST['email'];
//         $qualification_id = $_POST['qualification'];

//         // file jhamela
//         if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
//             $fileTmpPath = $_FILES['image']['tmp_name'];
//             $fileName = $_FILES['image']['name'];
//             $fileSize = $_FILES['image']['size'];
//             $fileType = $_FILES['image']['type'];
//             $fileNameCmps = explode(".", $fileName);
//             $fileExtension = strtolower(end($fileNameCmps));

//             // Define allowed file extensions
//             $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

//             if (in_array($fileExtension, $allowedExts)) {
//                 // Define upload path
//                 $uploadFileDir = './uploaded_files/';
//                 $dest_path = $uploadFileDir . $fileName;

//                 // Create directory if it doesn't exist
//                 if (!is_dir($uploadFileDir)) {
//                     mkdir($uploadFileDir, 0755, true);
//                 }

//                 // Move the file to the upload directory
//                 if (move_uploaded_file($fileTmpPath, $dest_path)) {
//                     $imagePath = $dest_path;
//                 } else {
//                     echo "Error moving the uploaded file.";
//                     exit;
//                 }
//             } else {
//                 echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
//                 exit;
//             }
//         } else {
//             echo "No file uploaded or there was an upload error.";
//             exit;
//         }
//         // file jhamela


//         // Prepare and execute the SQL statement
//         // $stmt = $pdo->prepare("INSERT INTO students (student_name, dob, address, phone, email, qualification_id) 
//         //                     VALUES (:student_name, :dob, :address, :phone, :email, :qualification_id)");
//         // $stmt->bindParam(':student_name', $student_name);
//         // $stmt->bindParam(':dob', $dob);
//         // $stmt->bindParam(':address', $address);
//         // $stmt->bindParam(':phone', $phone);
//         // $stmt->bindParam(':email', $email);
//         // $stmt->bindParam(':qualification_id', $qualification_id);

// //self


//         $stmt1 = $pdo->prepare("INSERT INTO students (student_name, dob, address, phone, email, qualification_id, image) 
//                              VALUES (?,?,?,?,?,?,?)");

//         if ($stmt1->execute([$student_name,$dob,$address,$phone,$email,$qualification_id, $imagePath])) {
//             echo "Student registered successfully!";
//             echo '<a href="index.php">Go back</a>';
//         } else {
//             echo "Error: Could not register student.";
//         }
//     }
// } catch (PDOException $e) {
//     echo 'Database error: ' . $e->getMessage();
// // }





// ?>

// <?php
// // GPT

// $stmt = $pdo->prepare("INSERT INTO students (student_name, dob, address, phone, email, qualification_id, image) 
// VALUES (?,?,?,?,?,?,?)");
// if ($stmt->execute([$student_name, $dob, $address, $phone, $email, $qualification_id, $imagePath])) {
// // Retrieve the last inserted record

// $lastInsertId = $pdo->lastInsertId();
// $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
// $stmt->execute([$lastInsertId]);
// $student = $stmt->fetch(PDO::FETCH_ASSOC);// eitaar maane hoye toh hoche je sob data gulo aami 
// // student vara er modde rekhe dichhi taar por sei var as a table use hochhe 


// if ($student) {
// // Display the data twice
// echo "<h3>Student Information:</h3>";
// for ($i = 0; $i < 2; $i++) {
// echo "Student Name: " . $student['student_name'] . "<br>";
// echo "Date of Birth: " . $student['dob'] . "<br>";
// echo "Address: " . $student['address'] . "<br>";
// echo "Phone: " . $student['phone'] . "<br>";
// echo "Email: " . $student['email'] . "<br>";
// echo "Qualification ID: " . $student['qualification_id'] . "<br>";
// echo "Image: " . $student['image'] . "<br><br>";
// }
// echo '<a href="index.php">Go back</a>';
// }
//             } else {
//                 echo "Error: Could not register student.";
//         }
//     }

// }catch (PDOException $e) {
// echo 'Database error: ' . $e->getMessage();
// }
?>


<?php 
// Database connection
require 'db_connection.php';

// ekaane osubide hote paare
try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $student_name = $_POST['student_name'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $qualification_id = $_POST['qualification'];

        // file jhamela
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['image']['tmp_name'];
            $fileName = $_FILES['image']['name'];
            $fileSize = $_FILES['image']['size'];
            $fileType = $_FILES['image']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Define allowed file extensions
            $allowedExts = ['jpg', 'jpeg', 'png', 'gif'];

            if (in_array($fileExtension, $allowedExts)) {
                // Define upload path
                $uploadFileDir = './uploaded_files/';
                $dest_path = $uploadFileDir . $fileName;

                // Create directory if it doesn't exist
                if (!is_dir($uploadFileDir)) {
                    mkdir($uploadFileDir, 0755, true);
                }

                // Move the file to the upload directory
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    $imagePath = $dest_path;
                } else {
                    echo "Error moving the uploaded file.";
                    exit;
                }
            } else {
                echo "Invalid file type. Only JPG, JPEG, PNG, and GIF files are allowed.";
                exit;
            }
        } else {
            echo "No file uploaded or there was an upload error.";
            exit;
        }
        // file jhamela

        // Prepare and execute the SQL statement
        $stmt1 = $pdo->prepare("INSERT INTO students (student_name, dob, address, phone, email, qualification_id, image) 
                                 VALUES (?,?,?,?,?,?,?)");

        if ($stmt1->execute([$student_name, $dob, $address, $phone, $email, $qualification_id, $imagePath])) {
            echo "Student registered successfully!";
            echo '<a href="index.php">Go back</a>';
        } else {
            echo "Error: Could not register student.";
        }

        // GPT
        // $stmt = $pdo->prepare("INSERT INTO students (student_name, dob, address, phone, email, qualification_id, image) 
        //                        VALUES (?,?,?,?,?,?,?)");
        // if ($stmt->execute([$student_name, $dob, $address, $phone, $email, $qualification_id, $imagePath])) {
        //     // Retrieve the last inserted record
        //     $lastInsertId = $pdo->lastInsertId();
        //     $stmt = $pdo->prepare("SELECT * FROM students WHERE id = ?");
        //     $stmt->execute([$lastInsertId]);
        //     $student = $stmt->fetch(PDO::FETCH_ASSOC); // Store the data in the $student variable

        //     if ($student) {
        //         // Display the data twice
        //         echo "<h3>Student Information:</h3>";
        //         for ($i = 0; $i < 2; $i++) {
        //             echo "Student Name: " . $student['student_name'] . "<br>";
        //             echo "Date of Birth: " . $student['dob'] . "<br>";
        //             echo "Address: " . $student['address'] . "<br>";
        //             echo "Phone: " . $student['phone'] . "<br>";
        //             echo "Email: " . $student['email'] . "<br>";
        //             echo "Qualification ID: " . $student['qualification_id'] . "<br>";
        //             echo "Image: " . $student['image'] . "<br><br>";
        //         }
        //         echo '<a href="index.php">Go back</a>';
        //     }
        // } else {
        //     echo "Error: Could not register student.";
        // }
    }
}catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}
?>