<?php
include "configue.php";

$sql="SELECT * FROM produits";
$result= $connexion->query($sql);

?> 
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin – Gestion des Produits</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #e0f7fa 0%, #b2ebf2 100%);
            min-height: 100vh;
            padding: 30px 20px;
        }

        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px;
        }

        h1 {
            color: #00695c;
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: 600;
        }

        .subtitle {
            color: #78909c;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .btn-add {
            display: inline-block;
            background: #26a69a;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            margin-bottom: 25px;
        }

        .btn-add:hover {
            background: #00897b;
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(38, 166, 154, 0.3);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fafafa;
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background: #b2dfdb;
            color: #00695c;
            padding: 16px;
            text-align: left;
            font-weight: 600;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 16px;
            border-bottom: 1px solid #e0e0e0;
            color: #455a64;
            font-size: 15px;
        }

        tr:last-child td {
            border-bottom: none;
        }

        tr:hover {
            background: #f1f8f7;
        }

        td img {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            object-fit: cover;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions a {
            color: #26a69a;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.2s ease;
        }

        .actions a:hover {
            color: #00897b;
        }

        .actions a:last-child {
            color: #ef5350;
        }

        .actions a:last-child:hover {
            color: #c62828;
        }

        .separator {
            color: #cfd8dc;
            margin: 0 5px;
        }

        @media (max-width: 768px) {
            .container {
                padding: 20px;
            }

            table {
                font-size: 13px;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>👑 Espace Admin – Gestion des Chats</h1>
        <p class="subtitle">Gérez vos produits en toute simplicité</p>

        <a href="ajouter.php" class="btn-add">➕ Ajouter un produit</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['prix']; ?> DH</td>
                    <td><img src="image/<?php echo $row['image']; ?>" width="80" height="80"></td>
                    <td class="actions">
                        <a href="modifier.php?id=<?php echo $row['id']; ?>">✏ Modifier</a>
                        <span class="separator">|</span>
                        <a href="supprimer.php?id=<?php echo $row['id']; ?>"
                           onclick="return confirm('Voulez-vous vraiment supprimer ce produit ?');">
                           🗑 Supprimer
                        </a>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
    <button type="submit"> <a href="home.php">log out</a></button>
</body>
</html>