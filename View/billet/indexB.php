
<?php
include_once __DIR__ . '/../../Controller/billet_con.php';

// Création d'une instance du contrôleur des événements
$billetC = new billetCon("billet");
               
// Récupération de la liste des événements
$billets = $billetC->listBillets();

$id_abs_options = $billetC->generateAbsOptions();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <title>billet</title>
</head>
<body>


    
        <form action="add_billet.php" align="center" method="post">
        
            <div>
            
                <h1>Adding</h1>
                   <p>Please fill in this form to add an billet.</p>
                   <hr>

                   <label for="name"><b>Name</b></label>
                   <input type="text" placeholder="Enter name" name="name" id="name" >
                   <div id="nameError" style="color: red;"></div>

                   <label for="id_student"><b>id student</b></label>
                   <input type="text" placeholder="Enter id student" name="id_student" id="id_student" >
                   <div id="id_studentError" style="color: red;"></div>

                   <label for="date_hour"><b>Date Hour</b></label>
                   <input type="datetime-local" placeholder="Enter date hour" name="date_hour" id="date_hour" >
                   <div id="date_hourError" style="color: red;"></div>

                   <label for="class"><b>class</b></label>
                   <input type="text" placeholder="Enter class" name="class" id="class" >
                   <div id="calssError" style="color: red;"></div>

                   <label for="id_abs"><b>ID Absence</b></label>
                    <select class="form-control" id="id_abs" name="id_abs" required>
                        <option value="" selected disabled>choisir le ID Absence</option>
                        <?php echo $id_abs_options; ?>
                    </select>
                    <div id="id_blogError" style="color: red;"></div>

                   <hr>

                <div>
                    <input type="submit" name="addbtn" id="addbtn" value="Add" onclick="return verif_add_form()">
                </div>

            </div>

        </form>
        
    
    <div>
        <table border="1" align="center" width="70%">
          
        <tr>
                <th>id</th>
                <th>name</th>
                <th>id student</th>
                <th>date hour</th>
                <th>class</th>
                <th>id abs</th>
                <th>actions</th>
            </tr>
        
            <?php
            foreach ($billets as $billet) {
            ?>
                <tr>
                    <td><?= $billet['id']; ?></td>
                    <td><?= $billet['name']; ?></td>
                    <td><?= $billet['id_student']; ?></td>
                    <td><?= $billet['date_hour']; ?></td>
                    <td><?= $billet['class']; ?></td>
                    <td><?= $billet['id_abs']; ?></td>
                    <td>
                        <a href="update_billet.php?id=<?= $billet['id']; ?>">Update</a>
                        <a href="delete_billet.php?id=<?= $billet['id']; ?>">Delete</a>
                    </td>
                </tr>
            <?php
            }
            ?>
        </table>
    
        </div>

    <script src="..\scripst\verif_inp_billet.js"></script>

</body>
</html>