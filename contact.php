<?php include 'navbar.php'; ?>


<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Get in Touch</title>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;600;700&family=Lato:wght@300;400;600&display=swap');
    
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    
    body {
      font-family: 'Lato', 'Segoe UI', system-ui, sans-serif;
      background: linear-gradient(135deg, #fef5f5 0%, #f9e9f0 50%, #fef2f5 100%);
      min-height: 100vh;
      padding: 50px 20px;
      line-height: 1.7;
    }
    
    .container {
      max-width: 680px;
      margin: 0 auto;
      background: #ffffff;
      padding: 55px 45px;
      border-radius: 24px;
      box-shadow: 0 20px 60px rgba(200, 125, 142, 0.12);
      border: 1px solid rgba(212, 165, 165, 0.15);
      position: relative;
      overflow: hidden;
    }

    .container::before {
      content: '';
      position: absolute;
      top: -100px;
      right: -100px;
      width: 300px;
      height: 300px;
      background: radial-gradient(circle, rgba(212, 165, 165, 0.06) 0%, transparent 70%);
      border-radius: 50%;
      pointer-events: none;
    }

    .success-message {
      display: flex;
      align-items: center;
      gap: 14px;
      padding: 18px 24px;
      background: linear-gradient(135deg, rgba(212, 165, 165, 0.08) 0%, rgba(247, 231, 231, 0.5) 100%);
      color: #c77d8e;
      border-left: 3px solid #d4a5a5;
      border-radius: 14px;
      margin-bottom: 32px;
      font-size: 15px;
      font-weight: 500;
      animation: slideIn 0.4s ease-out;
      position: relative;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(-10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    h1 {
      font-family: 'Playfair Display', serif;
      font-size: 40px;
      font-weight: 700;
      color: #c77d8e;
      margin-bottom: 16px;
      letter-spacing: -0.8px;
      position: relative;
    }

    .subtitle {
      color: #8b7a8b;
      font-size: 16px;
      margin-bottom: 38px;
      line-height: 1.7;
      font-weight: 300;
    }

    .info-card {
      background: linear-gradient(135deg, rgba(247, 231, 231, 0.4) 0%, rgba(249, 233, 240, 0.4) 100%);
      padding: 30px;
      border-radius: 18px;
      margin-bottom: 38px;
      border: 1.5px solid rgba(212, 165, 165, 0.2);
    }

    .info-item {
      display: flex;
      align-items: center;
      gap: 14px;
      margin-bottom: 18px;
      color: #5a4a5a;
      font-size: 15px;
    }

    .info-item:last-child {
      margin-bottom: 0;
    }

    .info-label {
      font-weight: 600;
      color: #c77d8e;
      min-width: 85px;
      font-size: 14px;
      letter-spacing: 0.3px;
    }

    .form-group {
      margin-bottom: 26px;
      position: relative;
    }

    label {
      display: block;
      margin-bottom: 10px;
      color: #5a4a5a;
      font-weight: 600;
      font-size: 14px;
      letter-spacing: 0.3px;
    }

    input, textarea {
      width: 100%;
      padding: 15px 18px;
      border: 1.5px solid rgba(212, 165, 165, 0.25);
      border-radius: 12px;
      font-size: 15px;
      font-family: 'Lato', sans-serif;
      transition: all 0.3s ease;
      background: #fafafa;
      color: #333;
    }

    input:focus, textarea:focus {
      outline: none;
      border-color: #d4a5a5;
      background: #ffffff;
      box-shadow: 0 0 0 4px rgba(212, 165, 165, 0.08);
    }

    textarea {
      min-height: 150px;
      resize: vertical;
      line-height: 1.6;
    }

    button {
      width: 100%;
      padding: 17px;
      background: linear-gradient(135deg, #c77d8e 0%, #d4a5a5 100%);
      border: none;
      color: #ffffff;
      font-size: 16px;
      font-weight: 600;
      border-radius: 12px;
      cursor: pointer;
      transition: all 0.3s ease;
      letter-spacing: 0.5px;
      margin-top: 12px;
      box-shadow: 0 8px 25px rgba(199, 125, 142, 0.25);
      font-family: 'Lato', sans-serif;
    }

    button:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 35px rgba(199, 125, 142, 0.35);
      background: linear-gradient(135deg, #b86d7e 0%, #c77d8e 100%);
    }

    button:active {
      transform: translateY(0);
    }

    @media (max-width: 600px) {
      .container {
        padding: 40px 28px;
      }
      
      h1 {
        font-size: 32px;
      }
      
      .subtitle {
        font-size: 15px;
      }
      
      .info-card {
        padding: 24px;
      }
    }
  </style>
</head>
<body>

<div class="container">
  <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
    <div class="success-message">
      <svg width="20" height="20" viewBox="0 0 20 20" fill="none">
        <circle cx="10" cy="10" r="9" stroke="currentColor" stroke-width="1.5"/>
        <path d="M6 10l3 3 5-6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"/>
      </svg>
      Your message has been sent successfully!
    </div>
  <?php endif; ?>

  <h1>Get in Touch</h1>
  <p class="subtitle">We'd love to hear from you. Whether you have questions about our cats or want to make a reservation, we're here to help.</p>

  <div class="info-card">
    <div class="info-item">
      <span class="info-label">Phone</span>
      <span>+212 62 36 82 744</span>
    </div>
    <div class="info-item">
      <span class="info-label">Email</span>
      <span>malakmalak2005123@gmail.com</span>
    </div>
    <div class="info-item">
      <span class="info-label">Location</span>
      <span>Oujda, Morocco</span>
    </div>
  </div>

  <form method="POST" action="send-message.php">
    <div class="form-group">
      <label>Name</label>
      <input type="text" name="name" required>
    </div>

    <div class="form-group">
      <label>Email Address</label>
      <input type="email" name="email" required>
    </div>

    <div class="form-group">
      <label>Phone Number <span style="color: #8b7a8b; font-weight: 400;">(optional)</span></label>
      <input type="text" name="phone">
    </div>

    <div class="form-group">
      <label>Your Message</label>
      <textarea name="message" required></textarea>
    </div>

    <button type="submit">Send Message</button>
  </form>
</div>

</body>
</html>