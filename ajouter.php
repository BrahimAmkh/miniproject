<?php 
include "configue.php";

if ($_POST){

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $targetDir = "image/";
    $targetFile = basename($_FILES['image']['name']);

    // Check if the file is an image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
        echo "File uploaded successfully!";
    } else {
        echo "File is not an image!";
    }
} else {
    echo "Error uploading file!";
}

    $name = $_POST['name'];
    $image = $targetFile;
    $age = $_POST['age'];
    $sex = $_POST['sex'];
    $description_courte = $_POST['description_courte'];
    $caracteristiques = $_POST['caracteristiques'];
    $prix = $_POST['prix'];
    $type = $_POST['type'];

    $sql="INSERT INTO produits (name , image , age , sexe , description_courte ,  caracteristiques , prix ,type) VALUES
    ('$name', '$image', '$age', '$sex', '$description_courte', '$caracteristiques', '$prix', '$type')";

    $result= $connexion->query($sql);
    header ("location: admin.php");
    exit();


}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #5f6f9cff 0%, #b2ebf2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            background: white;
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            padding: 40px;
            width: 100%;
            max-width: 600px;
        }

        h2 {
            color: #667eea;
            text-align: center;
            margin-bottom: 30px;
            font-size: 28px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        label {
            color: #333;
            font-weight: 600;
            font-size: 14px;
        }

        input[type="text"],
        input[type="file"],
        select,
        textarea {
            padding: 12px 15px;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s ease;
            width: 100%;
        }

        input[type="text"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 80px;
        }

        select {
            cursor: pointer;
            background-color: white;
        }

        button[type="submit"] {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(102, 126, 234, 0.4);
        }

        button[type="submit"]:active {
            transform: translateY(0);
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 600px) {
            .container {
                padding: 25px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            h2 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>➕ Ajouter un produit</h2>

        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="type">Type :</label>
                    <input type="text" id="type" name="type" required>
                </div>

                <div class="form-group">
                    <label for="prix">Prix :</label>
                    <input type="text" id="prix" name="prix" required>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="age">Âge :</label>
                    <input type="text" id="age" name="age" required>
                </div>

                <div class="form-group">
                    <label for="sex">Sexe :</label>
                    <select id="sex" name="sex" required>
                        <option value="">Sélectionner...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="image">Image :</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="form-group">
                <label for="description_courte">Description courte :</label>
                <textarea id="description_courte" name="description_courte" rows="3" required></textarea>
            </div>

            <div class="form-group">
                <label for="caracteristiques">Caractéristiques :</label>
                <textarea id="caracteristiques" name="caracteristiques" rows="4" required></textarea>
            </div>

            <button type="submit">Ajouter</button>
        </form>
    </div>
</body>
</html>