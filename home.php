<?php
session_start();
include "configue.php";

$sql= "SELECT * from produits";
$result= $connexion->query($sql);

?>
<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home - Nos Produits</title>
  <style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
  background: linear-gradient(135deg, #FFF9F3 0%, #FFE8D6 100%);
  min-height: 100vh;
}

/* Section Title */
.section-header {
  text-align: center;
  padding: 40px 20px 20px;
}

.section-header h1 {
  font-size: 2.5rem;
  color: #3D3D3D;
  margin-bottom: 10px;
  font-weight: 600;
}

.section-header p {
  color: #666;
  font-size: 1.1rem;
}

/* Container dyal cards */
.cards-container {
  display: grid;
  grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
  gap: 30px;
  padding: 20px 40px 60px;
  max-width: 1400px;
  margin: 0 auto;
}

/* Card style */
.card {
  display: flex;
  flex-direction: column;
  background: #FFFFFF;
  border-radius: 20px;
  box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
  overflow: hidden;
  transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
  position: relative;
}

.card::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 4px;
  background: linear-gradient(90deg, #C8A27C, #E8C4A0);
  transform: scaleX(0);
  transition: transform 0.3s ease;
}

.card:hover::before {
  transform: scaleX(1);
}

/* Image container */
.card-image {
  width: 100%;
  height: 280px;
  overflow: hidden;
  background: #F7F7F7;
  position: relative;
}

.card-image::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  height: 60px;
  background: linear-gradient(to top, rgba(255,255,255,0.9), transparent);
  opacity: 0;
  transition: opacity 0.3s ease;
}

.card:hover .card-image::after {
  opacity: 1;
}

.card img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

/* Body dyal card */
.card-body {
  padding: 24px;
  display: flex;
  flex-direction: column;
  gap: 12px;
  flex-grow: 1;
}

/* Title */
.card-body h3 {
  font-size: 1.4rem;
  color: #2C2C2C;
  font-weight: 600;
  line-height: 1.3;
  margin-bottom: 4px;
}

/* Prix */
.card-price {
  font-size: 1.5rem;
  color: #C8A27C;
  font-weight: 700;
  margin: 8px 0;
}

.card-price::after {
  content: ' DH';
  font-size: 1rem;
  color: #888;
  font-weight: 500;
}

/* Type/Category */
.card-type {
  display: inline-block;
  padding: 6px 14px;
  background: #F7E9D7;
  color: #8B6F47;
  border-radius: 20px;
  font-size: 0.85rem;
  font-weight: 500;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  width: fit-content;
}

/* Button */
.card-button {
  margin-top: auto;
  padding-top: 16px;
}

.card-button button {
  width: 100%;
  padding: 14px 20px;
  border-radius: 12px;
  border: none;
  cursor: pointer;
  background: linear-gradient(135deg, #C8A27C 0%, #B78B5C 100%);
  color: #FFFFFF;
  font-size: 1rem;
  font-weight: 600;
  transition: all 0.3s ease;
  box-shadow: 0 4px 12px rgba(200, 162, 124, 0.3);
  position: relative;
  overflow: hidden;
}

.card-button button::before {
  content: '→';
  position: absolute;
  right: 20px;
  opacity: 0;
  transition: all 0.3s ease;
}

.card-button button:hover::before {
  opacity: 1;
  right: 15px;
}

.card-button button:hover {
  transform: translateY(-2px);
  box-shadow: 0 6px 20px rgba(200, 162, 124, 0.4);
}

.card-button button:active {
  transform: translateY(0);
}

/* Hover effect dyal card */
.card:hover {
  transform: translateY(-8px);
  box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
}

.card:hover img {
  transform: scale(1.08);
}

/* Responsive mobile */
@media screen and (max-width: 1200px) {
  .cards-container {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 25px;
    padding: 20px 30px 50px;
  }
}

@media screen and (max-width: 768px) {
  .section-header h1 {
    font-size: 2rem;
  }
  
  .cards-container {
    grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
    gap: 20px;
    padding: 20px 20px 40px;
  }
  
  .card-image {
    height: 240px;
  }
  
  .card-body h3 {
    font-size: 1.2rem;
  }
}

@media screen and (max-width: 480px) {
  .cards-container {
    grid-template-columns: 1fr;
    gap: 20px;
  }
  
  .section-header h1 {
    font-size: 1.7rem;
  }
}

/* Loading animation */
@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(20px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

.card {
  animation: fadeIn 0.5s ease forwards;
}

.card:nth-child(1) { animation-delay: 0.1s; }
.card:nth-child(2) { animation-delay: 0.2s; }
.card:nth-child(3) { animation-delay: 0.3s; }
.card:nth-child(4) { animation-delay: 0.4s; }
.card:nth-child(5) { animation-delay: 0.5s; }
.card:nth-child(6) { animation-delay: 0.6s; }
</style>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="section-header">
  <h1>Nos Produits</h1>
  <p>Découvrez notre collection exclusive</p>
</div>

<div class="cards-container">
  <?php while($row = $result->fetch_assoc()) { ?>
    <div class="card">
      <div class="card-image">
        <img src="image/<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['name']); ?>">
      </div>
      <div class="card-body">
        <h3><?php echo htmlspecialchars($row['name']); ?></h3>
        <div class="card-price"><?php echo htmlspecialchars($row['prix']); ?></div>
        <span class="card-type"><?php echo htmlspecialchars($row['Type']); ?></span>
        <div class="card-button">
          <a href="details.php?id=<?php echo htmlspecialchars($row['id']); ?>">
            <button>Voir les détails</button>
          </a>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<button type="submit"> <a href="log.php">log out</a></button>

</body>
</html>