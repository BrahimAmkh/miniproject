<!-- navbar.php -->
<nav class="navbar">
  <div class="logo">🐾 CatShop</div>
  <ul class="menu">
    <li><a href="home.php">Accueil</a></li>
    <li><a href="about.php">About</a></li>
    <li><a href="contact.php">Contact</a></li>
    
  </ul>
</nav>

<style>
/* Navbar sticky & style Soft & Cute */
.navbar {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  background: #FFF9F3; /* Soft & Cute background */
  padding: 14px 28px;
  display: flex;
  justify-content: space-between;
  align-items: center;
  box-shadow: 0 4px 10px rgba(0,0,0,0.05);
  border-bottom-left-radius: 18px;
  border-bottom-right-radius: 18px;
  z-index: 9999;
}

.logo {
  font-size: 1.4rem;
  font-weight: bold;
  color: #3D3D3D;
}

.menu {
  display: flex;
  gap: 20px;
  list-style: none;
}

.menu a {
  color: #3D3D3D;
  text-decoration: none;
  padding: 6px 12px;
  border-radius: 10px;
  transition: 0.2s;
}

.menu a:hover {
  background: #b6e6f9ff;
}

/* pour eviter que contenu ytb9a fo9 navbar */
body {
  margin: 0;
  padding-top: 70px; /* hauteur approximative dyal navbar */
}

/* Responsive mobile */
@media screen and (max-width: 768px) {
  .navbar {
    flex-direction: column;
    gap: 10px;
    padding: 10px 20px;
  }
  .menu {
    flex-direction: column;
    gap: 10px;
    width: 100%;
  }
  .menu a {
    text-align: center;
  }
}
</style>
