<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 - Page Not Found | Trust Vault Global</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      background: linear-gradient(135deg, #004aad, #0084ff);
      color: #fff;
      height: 100vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
      overflow: hidden;
    }

    .container {
      animation: fadeIn 1.2s ease forwards;
    }

    h1 {
      font-size: 10rem;
      font-weight: 800;
      letter-spacing: 5px;
      color: #fff;
      text-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
      animation: float 3s ease-in-out infinite;
    }

    h2 {
      font-size: 2rem;
      margin-top: 20px;
      color: #e0e0e0;
    }

    p {
      font-size: 1rem;
      margin: 20px 0 30px;
      color: #cce0ff;
    }

    .btn {
      display: inline-block;
      padding: 12px 28px;
      background: #fff;
      color: #004aad;
      font-weight: 600;
      border-radius: 50px;
      text-decoration: none;
      transition: 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
    }

    .btn:hover {
      background: #004aad;
      color: #fff;
      transform: translateY(-3px);
    }

    @keyframes float {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-20px);
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 6rem;
      }
      h2 {
        font-size: 1.5rem;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>404</h1>
    <h2>Oops! Page Not Found</h2>
    <p>The page you’re looking for doesn’t exist or has been moved.</p>
    <a href="http://localhost/Mapleaf Capital/" class="btn">Go Back Home</a>
  </div>
</body>
</html>
