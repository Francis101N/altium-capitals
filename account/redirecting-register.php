<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Redirecting...</title>
  <style>
    body {
      background-color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      overflow: hidden;
    }

    .redirect-box {
      text-align: center;
      background: #ffffff;
      border: 2px solid #2e95c4;
      padding: 50px 40px;
      border-radius: 25px;
      box-shadow: 0 8px 25px rgba(46, 149, 196, 0.2);
      animation: fadeIn 1s ease-in-out;
    }

    .circle-loader {
      position: relative;
      width: 80px;
      height: 80px;
      margin: 0 auto 25px;
    }

    .circle-loader::before,
    .circle-loader::after {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      border-radius: 50%;
      border: 6px solid transparent;
      border-top-color: #2e95c4;
      animation: spin 1.2s linear infinite;
    }

    .circle-loader::after {
      border: 6px solid #2e95c4;
      border-bottom-color: transparent;
      opacity: 0.3;
      animation-direction: reverse;
    }

    h2 {
      color: #2e95c4;
      font-weight: 700;
      font-size: 1.8rem;
      margin-bottom: 10px;
    }

    p {
      color: #333;
      font-size: 1rem;
      margin-bottom: 0;
    }

    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .dot {
      display: inline-block;
      animation: blink 1.5s infinite;
    }

    .dot:nth-child(2) {
      animation-delay: 0.2s;
    }

    .dot:nth-child(3) {
      animation-delay: 0.4s;
    }

    @keyframes blink {
      0%, 80%, 100% { opacity: 0; }
      40% { opacity: 1; }
    }
  </style>
  <script>
    // Auto redirect after 6 seconds
    setTimeout(function(){
        window.location.href = "index.php";
    }, 6000);
  </script>
</head>
<body>
  <div class="redirect-box">
    <div class="circle-loader"></div>
    <h2>Welcome to Sovereign Nexar Capital!</h2>
    <p>Registered successful.</p>
    <p>Redirecting to Login <span class="dot">.</span><span class="dot">.</span><span class="dot">.</span></p>
  </div>
</body>
</html>
