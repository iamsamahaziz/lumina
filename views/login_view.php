<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Lumina</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&family=Outfit:wght@700;800&display=swap"
        rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #fef7ed 0%, #fdf4e8 100%);
            min-height: 100vh;
        }

        .container {
            display: flex;
            min-height: 100vh;
        }

        .branding {
            flex: 1;
            background: linear-gradient(135deg, #c9a88a 0%, #b39377 100%);
            padding: 4rem;
            display: flex;
            flex-direction: column;
            color: white;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: .75rem;
            margin-bottom: 2rem;
        }

        .logo-icon {
            font-size: 2.5rem;
        }

        .logo-text {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 800;
        }

        .tagline {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
        }

        .description {
            font-size: 1.1rem;
            opacity: .9;
            margin-bottom: 3rem;
            max-width: 400px;
        }

        .features {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .feature {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-weight: 500;
        }

        .feature-icon {
            font-size: 1.5rem;
        }

        .form-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            background: white;
        }

        .form-wrapper {
            width: 100%;
            max-width: 400px;
        }

        .form-title {
            font-family: 'Outfit', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: .5rem;
            text-align: center;
        }

        .form-subtitle {
            color: #64748b;
            text-align: center;
            margin-bottom: 2rem;
        }

        .error-msg {
            background: #fee2e2;
            color: #991b1b;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        .form-label {
            display: block;
            margin-bottom: .5rem;
            font-weight: 600;
            color: #475569;
            font-size: .9rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem;
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            font-size: 1rem;
        }

        .form-input:focus {
            outline: none;
            border-color: #c9a88a;
        }

        .btn-login {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .15);
        }

        .divider {
            text-align: center;
            margin: 2rem 0;
            color: #94a3b8;
        }

        .btn-register {
            display: block;
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #c9a88a 0%, #b39377 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            text-align: center;
            text-decoration: none;
        }

        @media(max-width:900px) {
            .container {
                flex-direction: column;
            }

            .branding {
                padding: 2rem;
            }

            .tagline {
                font-size: 1.75rem;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="branding">
            <div class="logo"><span class="logo-icon">🌟</span><span class="logo-text">Lumina</span></div>
            <h1 class="tagline">Gérez votre temps et boostez votre productivité</h1>
            <p class="description">Timer Pomodoro, gestion des tâches et système de récompenses.</p>
            <div class="features">
                <div class="feature"><span class="feature-icon">⏱️</span><span>Timer Pomodoro</span></div>
                <div class="feature"><span class="feature-icon">📋</span><span>Gestion de Tâches</span></div>
                <div class="feature"><span class="feature-icon">🎁</span><span>Système de Récompenses</span></div>
            </div>
        </div>
        <div class="form-section">
            <div class="form-wrapper">
                <h2 class="form-title">Connexion</h2>
                <p class="form-subtitle">Accédez à votre espace de productivité</p>
                <?php if ($error): ?>
                    <div class="error-msg">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-input" placeholder="exemple@email.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-input" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn-login">Se connecter</button>
                </form>
                <div class="divider">Pas de compte ?</div>
                <a href="register.php" class="btn-register">Créer un compte</a>
            </div>
        </div>
    </div>
</body>

</html>