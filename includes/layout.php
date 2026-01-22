<?php

function render_header($page_title = 'Lumina', $active_page = '', $darkUnlocked = false, $oceanUnlocked = false)
{
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>
            <?= $page_title ?>
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
        </style>
    </head>

    <body>
        <div class="sidebar">
            <div class="logo">🌟 Lumina</div>
            <nav class="nav">
                <a href="dashboard.php" class="<?= $active_page === 'dashboard' ? 'active' : '' ?>">📊 Dashboard</a>
                <a href="tasks.php" class="<?= $active_page === 'tasks' ? 'active' : '' ?>">📝 Tâches</a>
                <a href="rewards.php" class="<?= $active_page === 'rewards' ? 'active' : '' ?>">🎁 Récompenses</a>
                <a href="profile.php" class="<?= $active_page === 'profile' ? 'active' : '' ?>">👤 Profil</a>
                <a href="logout.php" style="color:#ef4444;">🚪 Déconnexion</a>
            </nav>
            <?php if ($darkUnlocked): ?><button class="theme-toggle" onclick="toggleTheme('dark')">🌙 Mode sombre</button>
            <?php endif; ?>
            <?php if ($oceanUnlocked): ?><button class="theme-toggle" onclick="toggleTheme('ocean')"
                    style="margin-top:.5rem;">🌊 Thème Océan</button>
            <?php endif; ?>
        </div>
        <div class="main">
            <?php
}

function render_footer()
{
    ?>
        </div>
        <script>
            function toggleTheme(theme) {
                document.body.classList.remove('dark', 'ocean');
                if (theme) { document.body.classList.add(theme); localStorage.setItem('lumina_theme', theme); }
                else { localStorage.removeItem('lumina_theme'); }
            }
            const savedTheme = localStorage.getItem('lumina_theme');
            if (savedTheme) document.body.classList.add(savedTheme);
        </script>
    </body>

    </html>
    <?php
}
