<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        Lumina
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
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            max-width: 1100px;
        }

        .card h3 {
            font-size: 1rem;
            margin-bottom: 1rem;
        }

        .timer-circle {
            width: 180px;
            height: 180px;
            margin: 0 auto 1rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 6px solid var(--accent);
        }

        .timer-circle.break {
            border-color: #22c55e;
        }

        .timer-time {
            font-size: 2.5rem;
            font-weight: 700;
        }

        .stat-big {
            font-size: 2rem;
            font-weight: 800;
            color: var(--accent);
        }

        .action-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: .75rem;
        }

        .action-btn {
            background: var(--bg);
            padding: .75rem;
            border-radius: 10px;
            text-align: center;
            text-decoration: none;
            color: var(--text);
        }

        .task-row {
            display: flex;
            align-items: center;
            gap: .5rem;
            padding: .5rem 0;
            border-bottom: 1px solid var(--border);
        }

        .session-info {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 1rem;
        }

        .session-dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background: var(--border);
        }

        .session-dot.done {
            background: var(--accent);
        }

        .session-dot.current {
            background: #22c55e;
        }

        .chat-btn {
            position: fixed;
            bottom: 1.5rem;
            right: 1.5rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--accent);
            color: #fff;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .2);
        }

        .chat-box {
            position: fixed;
            bottom: 100px;
            right: 1.5rem;
            width: 320px;
            max-height: 400px;
            background: var(--card);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, .15);
            display: none;
            flex-direction: column;
            overflow: hidden;
        }

        .chat-box.open {
            display: flex;
        }

        .chat-header {
            padding: 1rem;
            background: var(--accent);
            color: #fff;
            font-weight: 700;
        }

        .chat-messages {
            flex: 1;
            padding: 1rem;
            overflow-y: auto;
            max-height: 250px;
        }

        .chat-msg {
            margin-bottom: .75rem;
            padding: .5rem .75rem;
            border-radius: 12px;
            max-width: 85%;
            font-size: .9rem;
        }

        .chat-msg.user {
            background: var(--accent);
            color: #fff;
            margin-left: auto;
        }

        .chat-msg.bot {
            background: var(--bg);
        }

        .chat-input {
            display: flex;
            border-top: 1px solid var(--border);
        }

        .chat-input input {
            flex: 1;
            padding: .75rem;
            border: none;
            background: transparent;
            color: var(--text);
        }

        .chat-input button {
            padding: .75rem 1rem;
            background: var(--accent);
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <div class="logo">🌟 Lumina</div>
        <nav class="nav">
            <a href="dashboard.php" class="active">📊 Dashboard</a>
            <a href="tasks.php" class="">📝 Tâches</a>
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

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:2rem;">
            <div>
                <h1 style="font-size:1.6rem;">Bonjour,
                    <?= htmlspecialchars($username) ?>
                    <?php if ($badgeUnlocked): ?> <span
                            style="background:linear-gradient(135deg,#fbbf24,#f59e0b);color:#fff;padding:.2rem .5rem;border-radius:6px;font-size:.7rem;vertical-align:middle;">🏆
                            PRO</span>
                    <?php endif; ?> !
                </h1>
                <p style="color:var(--muted);">
                    <?= $affirmation ?>
                </p>
            </div>
            <div style="background:var(--card);padding:.5rem 1rem;border-radius:50px;font-weight:600;">💰
                <?= $stats['coins'] ?? 0 ?>
            </div>
        </div>

        <div class="grid">
            <div class="card">
                <h3>🍅 Pomodoro</h3>
                <div style="text-align:center;">
                    <div style="display:flex;justify-content:center;gap:.5rem;margin-bottom:1rem;">
                        <button class="dur-btn" data-min="15"
                            style="padding:.4rem .8rem;border:1px solid var(--border);background:var(--bg);border-radius:6px;cursor:pointer;">15m</button>
                        <button class="dur-btn active" data-min="25"
                            style="padding:.4rem .8rem;border:1px solid var(--accent);background:var(--accent);color:#fff;border-radius:6px;cursor:pointer;">25m</button>
                        <button class="dur-btn" data-min="45"
                            style="padding:.4rem .8rem;border:1px solid var(--border);background:var(--bg);border-radius:6px;cursor:pointer;">45m</button>
                        <button class="dur-btn" data-min="60"
                            style="padding:.4rem .8rem;border:1px solid var(--border);background:var(--bg);border-radius:6px;cursor:pointer;">60m</button>
                    </div>
                    <div id="timerCircle" class="timer-circle"><span id="displayTime" class="timer-time">25:00</span>
                    </div>
                    <button id="btnStart" class="btn btn-green" onclick="toggleTimer()">▶ Démarrer</button>
                    <button class="btn btn-gray" onclick="resetTimer()" style="margin-left:.5rem;">↺ Reset</button>
                    <div class="session-info">
                        <div id="dot1" class="session-dot current"></div>
                        <div id="dot2" class="session-dot"></div>
                        <div id="dot3" class="session-dot"></div>
                        <div id="dot4" class="session-dot"></div>
                    </div>
                    <p style="margin-top:.75rem;color:var(--muted);font-size:.85rem;">Session 1/4</p>
                </div>
            </div>

            <div class="card">
                <h3>📊 Aujourd'hui</h3>
                <div class="stat-big">
                    <?= floor(($stats['today_minutes'] ?? 0) / 60) ?>h
                    <?= ($stats['today_minutes'] ?? 0) % 60 ?>m
                </div>
                <p style="color:var(--muted);">de focus</p>
                <div style="margin-top:1rem;padding-top:1rem;border-top:1px solid var(--border);">
                    <strong>
                        <?= $stats['completed_tasks'] ?? 0 ?>
                    </strong>
                    <span style="color:var(--muted);">tâches terminées</span>
                </div>
            </div>

            <div class="card">
                <h3>⚡ Actions</h3>
                <div class="action-grid">
                    <a href="tasks.php" class="action-btn">➕ Tâche</a>
                    <a href="rewards.php" class="action-btn">🎁 Boutique</a>
                </div>
                <h3 style="margin-top:1rem;">📝 À faire</h3>
                <?php if (mysqli_num_rows($tasks) === 0): ?>
                    <p style="color:var(--muted);">Rien à faire !</p>
                <?php else:
                    while ($t = mysqli_fetch_assoc($tasks)): ?>
                        <div class="task-row">
                            <input type="checkbox" onchange="location='tasks.php?complete_id=<?= $t['id'] ?>'">
                            <span>
                                <?= htmlspecialchars($t['title']) ?>
                            </span>
                        </div>
                    <?php endwhile; endif; ?>
            </div>
        </div>

        <button class="chat-btn" onclick="toggleChat()">🤖</button>
        <div id="chatBox" class="chat-box">
            <div class="chat-header">🤖 Assistant</div>
            <div id="chatMessages" class="chat-messages">
                <div class="chat-msg bot">Salut ! Tape "aide" pour voir mes commandes.</div>
            </div>
            <div class="chat-input">
                <input type="text" id="chatInput" placeholder="Message..."
                    onkeypress="if(event.key==='Enter')sendChat()">
                <button onclick="sendChat()">➤</button>
            </div>
        </div>

        <script>
            let workDuration = 25, timeLeft = 25 * 60, timerId = null, isRunning = false, isBreak = false, session = 1;
            document.querySelectorAll('.dur-btn').forEach(btn => {
                btn.onclick = () => {
                    if (isRunning) return;
                    document.querySelectorAll('.dur-btn').forEach(b => { b.style.background = 'var(--bg)'; b.style.color = 'var(--text)'; b.style.borderColor = 'var(--border)'; });
                    btn.style.background = 'var(--accent)'; btn.style.color = '#fff'; btn.style.borderColor = 'var(--accent)';
                    workDuration = parseInt(btn.dataset.min); timeLeft = workDuration * 60; updateDisplay();
                };
            });
            const display = document.getElementById('displayTime'), circle = document.getElementById('timerCircle'), startBtn = document.getElementById('btnStart');
            function formatTime(s) { return `${Math.floor(s / 60).toString().padStart(2, '0')}:${(s % 60).toString().padStart(2, '0')}`; }
            function updateDisplay() { display.textContent = formatTime(timeLeft); }
            function toggleTimer() {
                if (isRunning) { clearInterval(timerId); isRunning = false; startBtn.textContent = "▶ Reprendre"; }
                else { isRunning = true; startBtn.textContent = "⏸ Pause"; timerId = setInterval(() => { if (timeLeft > 0) { timeLeft--; updateDisplay(); } else { finishPhase(); } }, 1000); }
            }
            function finishPhase() {
                clearInterval(timerId); isRunning = false;
                if (!isBreak) { fetch('../api/session.php', { method: 'POST', body: JSON.stringify({ duration: workDuration }), headers: { 'Content-Type': 'application/json' } }); isBreak = true; timeLeft = 5 * 60; circle.classList.add('break'); alert('Pause de 5 min !'); }
                else { isBreak = false; session = session < 4 ? session + 1 : 1; timeLeft = workDuration * 60; circle.classList.remove('break'); alert('C\'est reparti !'); }
                updateDisplay(); startBtn.textContent = "▶ Démarrer";
            }
            function resetTimer() { clearInterval(timerId); isRunning = false; isBreak = false; session = 1; timeLeft = workDuration * 60; updateDisplay(); circle.classList.remove('break'); startBtn.textContent = "▶ Démarrer"; }
            function toggleChat() { document.getElementById('chatBox').classList.toggle('open'); }
            function sendChat() {
                const input = document.getElementById('chatInput'), msg = input.value.trim();
                if (!msg) return;
                const messages = document.getElementById('chatMessages');
                messages.innerHTML += `<div class="chat-msg user">${msg}</div>`;
                input.value = '';
                fetch('../api/chatbot.php', { method: 'POST', body: JSON.stringify({ message: msg }), headers: { 'Content-Type': 'application/json' } })
                    .then(r => r.json()).then(data => { messages.innerHTML += `<div class="chat-msg bot">${data.response}</div>`; messages.scrollTop = messages.scrollHeight; });
            }
        </script>

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