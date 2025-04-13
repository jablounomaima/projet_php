


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une image</title>
</head>
<body>
    <h1>Ajouter une image</h1>
    <form action="upload_image.php" method="post" enctype="multipart/form-data">
      
    <table>
        <form action="" method="post" enctype="multipart/form-data">

        <tr>  
        <td><label for="image">Choisir une image :</label></td>
        <td><input type="file" name="image" id="image"></td>
        </tr>


            <tr>
                <td>immat</td>
                <td><input name="immat" type="text"/></td>
            </tr> 
            <tr>
                <td>id_modele</td>
                <td><input name="id_modele" type="text"/></td>
            </tr>
            <tr>
                <td>couleur</td>
                <td><input name="couleur" type="text"/></td>
            </tr>
           
            <tr>
                <td>   <input type="submit" value="Ajouter"></td>
            </tr>
        </form>


     






</table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une image</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        h1 {
            text-align: center;
            margin-top: 20px;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="file"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
