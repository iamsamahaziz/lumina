<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription - Lumina</title>
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

        .success-msg {
            background: #dcfce7;
            color: #166534;
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

        .btn-register {
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #c9a88a 0%, #b39377 100%);
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
        }

        .divider {
            text-align: center;
            margin: 2rem 0;
            color: #94a3b8;
        }

        .btn-login {
            display: block;
            width: 100%;
            padding: 1rem;
            background: linear-gradient(135deg, #1e293b 0%, #334155 100%);
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
            <h1 class="tagline">Rejoignez Lumina et boostez votre productivité</h1>
        </div>
        <div class="form-section">
            <div class="form-wrapper">
                <h2 class="form-title">Inscription</h2>
                <p class="form-subtitle">Créez votre compte gratuitement</p>
                <?php if ($error): ?>
                    <div class="error-msg">
                        <?= $error ?>
                    </div>
                <?php endif; ?>
                <?php if ($success): ?>
                    <div class="success-msg">
                        <?= $success ?>
                    </div>
                <?php endif; ?>
                <form method="POST">
                    <div class="form-group">
                        <label class="form-label">Nom d'utilisateur</label>
                        <input type="text" name="username" class="form-input" placeholder="Votre nom" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-input" placeholder="exemple@email.com" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Mot de passe</label>
                        <input type="password" name="password" class="form-input" placeholder="6 caractères minimum"
                            required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Confirmer le mot de passe</label>
                        <input type="password" name="confirm" class="form-input" placeholder="••••••••" required>
                    </div>
                    <button type="submit" class="btn-register">Créer mon compte</button>
                </form>
                <div class="divider">Déjà inscrit ?</div>
                <a href="login.php" class="btn-login">Se connecter</a>
            </div>
        </div>
    </div>
</body>

</html>