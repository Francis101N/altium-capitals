<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Portal Login | Mapleaf Capital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');

        body {
            margin: 0;
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
            background-size: 200% 200%;
            animation: gradientBG 12s ease infinite;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            width: 100%;
            max-width: 440px;
            padding: 40px;
            border-radius: 20px;
            background: #ffffff;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            opacity: 0;
            transform: translateY(-30px);
            animation: fadeInUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control {
            border-radius: 12px;
            padding: 16px 16px 16px 45px;
            border: 1px solid #cbd5e1;
            font-weight: 600;
            color: #0f172a;
            transition: all 0.25s ease;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.15);
        }

        .input-icon-group {
            position: relative;
        }

        .input-icon-group i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1.25rem;
            color: #64748b;
            z-index: 5;
            transition: color 0.25s ease;
        }

        .input-icon-group .form-control:focus~i {
            color: #3b82f6;
        }

        .btn-primary {
            background-color: #3b82f6;
            border: none;
            font-weight: 700;
            transition: all 0.3s ease;
            border-radius: 12px;
            letter-spacing: 0.5px;
        }

        .btn-primary:hover {
            background-color: #2563eb;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(59, 130, 246, 0.35);
        }

        .alert {
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.875rem;
        }
    </style>
</head>

<body>

    <div class="login-container">
        <!-- Brand Logo Header -->
        <div class="text-center mb-4">
            <img src="./images/mapleaf-logo.png" alt="Mapleaf Capital Capital Holdings" style="width: 100%; max-height: 100px; object-fit: contain;">
            <span class="badge bg-primary-subtle text-primary border border-primary-subtle rounded-pill font-mono fw-bold px-3 py-1.5 mt-3">
                <i class="bx bx-shield-quarter me-1"></i> Executive Control Center
            </span>
        </div>

        <h4 class="text-center fw-extrabold text-dark mb-1">Admin Portal</h4>
        <p class="text-center text-muted small mb-4">Provide authorized administrative credentials to access management console.</p>

        <!-- Dynamic Error Alert -->
        <?php if (isset($error) && $error): ?>
            <div class="alert alert-danger alert-dismissible fade show text-center mb-4 shadow-sm" role="alert">
                <i class="bx bx-error-circle me-1"></i> <?php echo htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST" action="proc_admin">
            <!-- Username Input -->
            <div class="mb-3 input-icon-group">
                <input type="text" name="username" class="form-control" id="username" placeholder="Admin Email" required autofocus>
                <i class="bx bx-user"></i>
            </div>

            <!-- Password Input -->
            <div class="mb-4 input-icon-group">
                <input type="password" name="password" class="form-control" id="password" placeholder="Admin Password" required>
                <i class="bx bx-lock-alt"></i>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary w-100 py-3 shadow-sm">
                <i class="bx bx-log-in-circle me-1 fs-5 align-middle"></i> Authenticate & Login
            </button>
        </form>

        <!-- Footer Copyright -->
        <div class="text-center mt-4 pt-3 border-top">
            <p class="text-muted small mb-0">&copy; <?php echo date('Y'); ?> <strong>Mapleaf Capital.</strong> All Rights Reserved.</p>
        </div>
    </div>

</body>

</html>