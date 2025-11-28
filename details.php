<?php 
include"configue.php";

$id=$_GET['id'];
$sql="SELECT * FROM produits WHERE id='$id'";
$result = $connexion->query($sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $row['name']; ?> - Détails du produit</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #FFF7F0 0%, #FFE8D6 100%);
      min-height: 100vh;
      padding: 20px;
    }

    /* Breadcrumb navigation */
    .breadcrumb {
      max-width: 1200px;
      margin: 0 auto 20px;
      color: #666;
      font-size: 14px;
    }

    .breadcrumb a {
      color: #FF9C71;
      text-decoration: none;
    }

    .breadcrumb a:hover {
      text-decoration: underline;
    }

    /* Container principale */
    .product-container {
      max-width: 1200px;
      margin: 0 auto;
      background: #fff;
      border-radius: 20px;
      box-shadow: 0 10px 40px rgba(0,0,0,0.1);
      overflow: hidden;
    }

    .product-wrapper {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 50px;
      padding: 50px;
    }

    /* Section image */
    .image-section {
      position: relative;
    }

    .main-image {
      width: 100%;
      height: 500px;
      object-fit: cover;
      border-radius: 15px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.15);
      transition: transform 0.3s ease;
    }

    .main-image:hover {
      transform: scale(1.02);
    }

    .image-badge {
      position: absolute;
      top: 20px;
      right: 20px;
      background: #FF9C71;
      color: white;
      padding: 8px 16px;
      border-radius: 25px;
      font-weight: 600;
      font-size: 14px;
    }

    /* Section informations */
    .info-section {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }

    .product-title {
      font-size: 36px;
      color: #2C2C2C;
      margin-bottom: 15px;
      font-weight: 700;
    }

    .product-type {
      display: inline-block;
      background: #FFE8D6;
      color: #FF7F50;
      padding: 6px 16px;
      border-radius: 20px;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 25px;
    }

    .price-section {
      background: linear-gradient(135deg, #FF9C71 0%, #FF7F50 100%);
      padding: 25px;
      border-radius: 15px;
      margin-bottom: 30px;
      box-shadow: 0 4px 15px rgba(255, 156, 113, 0.3);
    }

    .price-label {
      color: rgba(255,255,255,0.9);
      font-size: 14px;
      text-transform: uppercase;
      letter-spacing: 1px;
    }

    .price-value {
      color: white;
      font-size: 42px;
      font-weight: 700;
      margin-top: 5px;
    }

    /* Caractéristiques */
    .specs-grid {
      display: grid;
      grid-template-columns: repeat(2, 1fr);
      gap: 20px;
      margin-bottom: 30px;
    }

    .spec-item {
      background: #F9F9F9;
      padding: 20px;
      border-radius: 12px;
      border-left: 4px solid #FF9C71;
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .spec-item:hover {
      transform: translateY(-3px);
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .spec-label {
      font-size: 13px;
      color: #888;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      margin-bottom: 5px;
    }

    .spec-value {
      font-size: 18px;
      color: #2C2C2C;
      font-weight: 600;
    }

    /* Description */
    .description-section {
      margin-bottom: 30px;
    }

    .section-title {
      font-size: 20px;
      color: #2C2C2C;
      margin-bottom: 12px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .section-title::before {
      content: '';
      width: 4px;
      height: 20px;
      background: #FF9C71;
      border-radius: 2px;
    }

    .description-text {
      color: #555;
      line-height: 1.8;
      font-size: 15px;
    }

    /* Bouton d'adoption */
    .action-buttons {
      display: flex;
      gap: 15px;
      margin-top: auto;
    }

    .btn-adopter {
      flex: 1;
      padding: 18px 35px;
      background: linear-gradient(135deg, #FF9C71 0%, #FF7F50 100%);
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 18px;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      text-align: center;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(255, 156, 113, 0.3);
      display: inline-block;
    }

    .btn-adopter:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 25px rgba(255, 156, 113, 0.4);
    }

    .btn-secondary {
      padding: 18px 35px;
      background: white;
      color: #FF7F50;
      border: 2px solid #FF7F50;
      border-radius: 12px;
      font-size: 18px;
      font-weight: 600;
      cursor: pointer;
      text-decoration: none;
      transition: all 0.3s ease;
      display: inline-block;
      text-align: center;
    }

    .btn-secondary:hover {
      background: #FF7F50;
      color: white;
    }

    /* Responsive */
    @media screen and (max-width: 900px) {
      .product-wrapper {
        grid-template-columns: 1fr;
        gap: 30px;
        padding: 30px 20px;
      }

      .main-image {
        height: 350px;
      }

      .product-title {
        font-size: 28px;
      }

      .price-value {
        font-size: 36px;
      }

      .specs-grid {
        grid-template-columns: 1fr;
      }

      .action-buttons {
        flex-direction: column;
      }
    }
  </style>
</head>
<body>
  <div class="breadcrumb">
    <a href="home.php">Accueil</a>  / <?php echo $row['name']; ?>
  </div>

  <div class="product-container">
    <div class="product-wrapper">
      <!-- Section Image -->
      <div class="image-section">
        <img src="image/<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>" class="main-image">
        <span class="image-badge">Disponible</span>
      </div>

      <!-- Section Informations -->
      <div class="info-section">
        <div>
          <h1 class="product-title"><?php echo $row['name']; ?></h1>
          <span class="product-type"><?php echo $row['Type']; ?></span>

          <div class="price-section">
            <div class="price-label">Prix d'adoption</div>
            <div class="price-value"><?php echo $row['prix']; ?> DH</div>
          </div>

          <div class="specs-grid">
            <div class="spec-item">
              <div class="spec-label">Âge</div>
              <div class="spec-value"><?php echo $row['age']; ?></div>
            </div>
            <div class="spec-item">
              <div class="spec-label">Sexe</div>
              <div class="spec-value"><?php echo $row['sexe']; ?></div>
            </div>
          </div>

          <div class="description-section">
            <h2 class="section-title">Description</h2>
            <p class="description-text"><?php echo $row['description_courte']; ?></p>
          </div>

          <div class="description-section">
            <h2 class="section-title">Caractéristiques</h2>
            <p class="description-text"><?php echo $row['caracteristiques']; ?></p>
          </div>
        </div>

        <div class="action-buttons">
          <a href="adopter.php?id=<?php echo $row['id']; ?>" class="btn-adopter">🐾 Adopter maintenant</a>
          <a href="contact.php" class="btn-secondary">Nous contacter</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>