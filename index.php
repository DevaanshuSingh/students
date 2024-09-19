<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        ::selection{
            background-color: lime;
            color: red;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Student Registration Form</h2>
        <form action="register.php" method="POST" enctype="multipart/form-data" class="p-4 border rounded">
            <div class="form-row d-flex flex-wrap">
                <div class="form-group col-md-6">
                    <label for="student_name">Student Name</label>
                    <input type="text" class="form-control" id="student_name" name="student_name" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="dob">Date of Birth</label>
                    <input type="date" class="form-control" id="dob" name="dob" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="image">Profile Picture</label>
                    <input type="file" class="form-control" id="picture" name="image" accept="image/*" capture="environment" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="2" required></textarea>
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group col-md-12">
                    <label for="qualification">Educational Qualification</label>
                    <select class="form-control" id="qualification" name="qualification" required>
                        <option value="">Select Qualification</option>
                        <!-- PHP code will populate this list -->
                        <?php
                        // Database connection
                        require 'db_connection.php';

                        try {
                            $stmt = $pdo->query('SELECT qualification_id, qualification_name FROM qualifications order by qualification_id');
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                               echo "<option value=\"{$row['qualification_id']}\">{$row['qualification_name']}</option>";
                            }
                        } catch (PDOException $e) {
                            echo 'Database error: ' . $e->getMessage();
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
    </div>
    <div class="container mt-5">
        <h2 class="text-center">Student List</h2>
        <table class="table table-striped">
            <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date of Birth</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Qualification</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP code will populate this table -->
                    <?php
                        // Database connection
                        require 'db_connection.php';
                        try {
                            $stmt = $pdo->query('select * from students
                                    inner join qualifications 
                                    ON qualifications.qualification_id = students.qualification_id');
                            $records=$stmt->fetchAll(PDO::FETCH_ASSOC);
                            foreach($records as $record){
                                $x="<tr>";
                                $x.="<td>".$record['id']."</td>";
                                $x.="<td>".$record['student_name']."</td>";
                                $x.="<td>".$record['dob']."</td>";
                                $x.="<td>".$record['address']."</td>";
                                $x.="<td>".$record['phone']."</td>";
                                $x.="<td>".$record['email']."</td>";
                                $x.="<td>".$record['qualification_name']."</td>";
                                $x.= "<td><img src='{$record['image']}' alt='Profile Picture' style='width: 100px; height: auto;'></td>";
                                $x.="</tr>";
                                echo $x;
                            }
                            // while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            //    echo "<option value=\"{$row['id']}\">{$row['qualification_name']}</option>";
                            // }
                        } catch (PDOException $e) {
                            echo 'Database error: ' . $e->getMessage();
                        }
                    ?>
                </tbody>
            </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
