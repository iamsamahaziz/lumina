<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Tâches - Lumina
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

        .add-form {
            display: flex;
            gap: .5rem;
            margin-bottom: 1.5rem;
            flex-wrap: wrap;
        }

        .add-form input {
            flex: 1;
            min-width: 200px;
            padding: .75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--bg);
            color: var(--text);
        }

        .add-form select {
            padding: .75rem;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: var(--bg);
            color: var(--text);
        }

        .btn-accent {
            padding: .75rem 1rem;
            background: var(--accent);
            color: #fff;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
        }

        .task {
            display: flex;
            align-items: center;
            gap: .75rem;
            padding: .75rem;
            background: var(--bg);
            border-radius: 10px;
            margin-bottom: .5rem;
        }

        .task input {
            width: 20px;
            height: 20px;
        }

        .task-title {
            flex: 1;
        }

        .priority-high {
            color: #991b1b;
            background: #fee2e2;
            padding: .25rem .5rem;
            border-radius: 4px;
            font-size: .75rem;
        }

        .priority-medium {
            color: #92400e;
            background: #fef3c7;
            padding: .25rem .5rem;
            border-radius: 4px;
            font-size: .75rem;
        }

        .priority-low {
            color: #166534;
            background: #dcfce7;
            padding: .25rem .5rem;
            border-radius: 4px;
            font-size: .75rem;
        }

        .done .task-title {
            text-decoration: line-through;
            opacity: .6;
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
            <a href="tasks.php" class="active">📝 Tâches</a>
            <a href="rewards.php" class="">🎁 Récompenses</a>
            <a href="profile.php" class="">👤 Profil</a>
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

        <h1 style="margin-bottom:2rem;">📝 Mes Tâches</h1>

        <form method="POST" class="add-form">
            <input type="text" name="title" placeholder="Nouvelle tâche..." required>
            <select name="priority">
                <option value="medium">🟡 Moyenne</option>
                <option value="high">🔴 Haute</option>
                <option value="low">🟢 Basse</option>
            </select>
            <button type="submit" class="btn-accent">+ Ajouter</button>
        </form>

        <div class="grid">
            <div class="card">
                <h2 style="margin-bottom:1rem;">⏳ En attente (
                    <?= mysqli_num_rows($pending) ?>)
                </h2>
                <?php if (mysqli_num_rows($pending) === 0): ?>
                    <p style="color:var(--muted);text-align:center;padding:2rem;">🎉 Aucune tâche !</p>
                <?php else:
                    while ($t = mysqli_fetch_assoc($pending)): ?>
                        <div class="task">
                            <input type="checkbox" onchange="location='?complete_id=<?= $t['id'] ?>'">
                            <span class="task-title">
                                <?= htmlspecialchars($t['title']) ?>
                            </span>
                            <span class="priority-<?= $t['priority'] ?>">
                                <?= ucfirst($t['priority']) ?>
                            </span>
                            <a href="?delete_id=<?= $t['id'] ?>" onclick="return confirm('Supprimer ?')"
                                style="color:#ef4444;">🗑️</a>
                        </div>
                    <?php endwhile; endif; ?>
            </div>

            <div class="card">
                <h2 style="margin-bottom:1rem;">✅ Terminées</h2>
                <?php if (mysqli_num_rows($completed) === 0): ?>
                    <p style="color:var(--muted);text-align:center;padding:2rem;">Aucune tâche terminée</p>
                <?php else:
                    while ($t = mysqli_fetch_assoc($completed)): ?>
                        <div class="task done">
                            <span>✓</span>
                            <span class="task-title">
                                <?= htmlspecialchars($t['title']) ?>
                            </span>
                            <a href="?delete_id=<?= $t['id'] ?>" style="color:#ef4444;">🗑️</a>
                        </div>
                    <?php endwhile; endif; ?>
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