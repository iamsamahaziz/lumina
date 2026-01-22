<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Profil - Lumina
    </title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg: #f8fafc;
            --card: #fff;
            --text: #1e293b;
            --muted: #64748b;
            --border: #e2e8f0;
            --accent: #d97706;
            --sidebar: #fff;
            --danger: #ef4444;
        }

        body.dark {
            --bg: #0f172a;
            --card: #1e293b;
            --text: #f1f5f9;
            --muted: #94a3b8;
            --border: #334155;
            --sidebar: #1e293b;
        }

        body.ocean {
            --bg: #0c1929;
            --card: #0f2744;
            --text: #e0f2fe;
            --muted: #7dd3fc;
            --border: #1e4976;
            --sidebar: #0f2744;
            --accent: #0ea5e9;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg);
            color: var(--text);
            display: flex;
            min-height: 100vh;
        }

        .sidebar {
            width: 220px;
            background: var(--sidebar);
            border-right: 1px solid var(--border);
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
        }

        .main {
            flex: 1;
            overflow-y: auto;
            padding: 2rem;
        }

        .logo {
            font-size: 1.3rem;
            font-weight: 800;
            margin-bottom: 2rem;
        }

        .nav a {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .75rem 1rem;
            color: var(--muted);
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: .25rem;
        }

        .nav a:hover,
        .nav a.active {
            background: rgba(217, 119, 6, .1);
            color: var(--accent);
        }

        .theme-toggle {
            margin-top: auto;
            padding: .75rem;
            background: var(--bg);
            border-radius: 8px;
            cursor: pointer;
            border: none;
            color: var(--muted);
            width: 100%;
        }

        .card {
            background: var(--card);
            padding: 1.5rem;
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, .08);
        }

        .btn {
            padding: .6rem 1.2rem;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-green {
            background: #22c55e;
            color: #fff;
        }

        .btn-gray {
            background: var(--border);
            color: var(--muted);
        }

        .btn-danger {
            background: var(--danger);
            color: #fff;
        }

        @media(max-width:768px) {
            body {
                flex-direction: column;
            }

            .sidebar {
                width: 100%;
            }
        }

        .grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: .5rem;
            font-weight: 600;
            color: var(--muted);
            font-size: .9rem;
        }

        input {
            width: 100%;
            padding: .75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--bg);
            color: var(--text);
            margin-bottom: 1rem;
        }

        .btn-save {
            padding: .75rem 1.5rem;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .btn-delete {
            padding: .75rem 1.5rem;
            background: var(--danger);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            width: 100%;
        }

        .msg {
            padding: .75rem;
            border-radius: 8px;
            margin-bottom: 1rem;
            text-align: center;
            background: #dcfce7;
            color: #166534;
        }

        hr {
            border: none;
            border-top: 1px solid var(--border);
            margin: 1.25rem 0;
        }

        .avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #c9a88a, #b39377);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            margin: 0 auto 1rem;
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .stat-card {
            background: var(--bg);
            padding: 1.25rem;
            border-radius: 12px;
            text-align: center;
        }

        .stat-value {
            font-size: 1.75rem;
            font-weight: 800;
            color: var(--accent);
        }

        .stat-label {
            color: var(--muted);
            font-size: .85rem;
        }

        @media(max-width:900px) {
            .grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">🌟 Lumina</div>
        <nav class="nav">
            <a href="dashboard.php" class="">📊 Dashboard</a>
            <a href="tasks.php" class="">📝 Tâches</a>
            <a href="rewards.php" class="">🎁 Récompenses</a>
            <a href="profile.php" class="active">👤 Profil</a>
            <a href="logout.php" style="color:#ef4444;">🚪 Déconnexion</a>
        </nav>
        <?php if ($darkUnlocked ?? false): ?>
            <button class="theme-toggle" onclick="toggleTheme('dark')">🌙 Mode sombre</button>
        <?php endif; ?>
        <?php if ($oceanUnlocked ?? false): ?>
            <button class="theme-toggle" onclick="toggleTheme('ocean')" style="margin-top:.5rem;">🌊 Thème Océan</button>
        <?php endif; ?>
    </div>
    <div class="main">

        <h1 style="margin-bottom:2rem;">👤 Mon Profil</h1>

        <div class="grid">
            <div>
                <div class="card" style="text-align:center;margin-bottom:1.5rem;">
                    <div class="avatar">
                        <?= strtoupper(substr($user['username'], 0, 1)) ?>
                    </div>
                    <div style="font-size:1.25rem;font-weight:700;">
                        <?= htmlspecialchars($user['username']) ?>
                        <?php if ($badgeUnlocked): ?> <span
                                style="background:linear-gradient(135deg,#fbbf24,#f59e0b);color:#fff;padding:.2rem .5rem;border-radius:6px;font-size:.7rem;vertical-align:middle;">🏆
                                PRO</span>
                        <?php endif; ?>
                    </div>
                    <div style="color:var(--muted);">
                        <?= htmlspecialchars($user['email']) ?>
                    </div>
                </div>

                <div class="card">
                    <h2 style="margin-bottom:1rem;">📊 Statistiques</h2>
                    <div class="stats-grid">
                        <div class="stat-card">
                            <div class="stat-value">
                                <?= $stats['total_minutes'] ?? 0 ?>
                            </div>
                            <div class="stat-label">Minutes</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">
                                <?= $stats['completed_tasks'] ?? 0 ?>
                            </div>
                            <div class="stat-label">Tâches</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">
                                <?= $stats['total_sessions'] ?? 0 ?>
                            </div>
                            <div class="stat-label">Sessions</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value">
                                <?= $user['coins'] ?? 0 ?>
                            </div>
                            <div class="stat-label">Pièces</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <h2 style="margin-bottom:1rem;">✏️ Modifier</h2>
                <?php if ($msg): ?>
                    <div class="msg">
                        <?= $msg ?>
                    </div>
                <?php endif; ?>
                <form method="POST">
                    <input type="hidden" name="update_profile" value="1">
                    <label>Nom d'utilisateur</label>
                    <input type="text" name="username" value="<?= htmlspecialchars($user['username']) ?>" required>
                    <label>Email</label>
                    <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                    <hr>
                    <p style="color:var(--muted);margin-bottom:1rem;font-size:.9rem;">Mot de passe (optionnel)</p>
                    <label>Actuel</label><input type="password" name="current_pass">
                    <label>Nouveau</label><input type="password" name="new_pass">
                    <label>Confirmer</label><input type="password" name="confirm_pass">
                    <button type="submit" class="btn-save">Sauvegarder</button>
                </form>
                <hr>
                <form method="POST" onsubmit="return confirm('Supprimer votre compte ?');">
                    <input type="hidden" name="delete_account" value="1">
                    <button type="submit" class="btn-delete">🗑️ Supprimer mon compte</button>
                </form>
            </div>
        </div>

    </div>
    <script>
        function toggleTheme(theme) {
            document.body.classList.remove('dark', 'ocean');
            if (theme) {
                document.body.classList.add(theme);
                localStorage.setItem('lumina_theme', theme);
            } else {
                localStorage.removeItem('lumina_theme');
            }
        }
        const savedTheme = localStorage.getItem('lumina_theme');
        if (savedTheme) document.body.classList.add(savedTheme);
    </script>
</body>

</html>