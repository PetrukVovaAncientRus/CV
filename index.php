<?php
// Configuration & Social Links
$profile = [
    'name' => 'Volodymyr Petruk',
    'handle' => 'Rin',
    'title' => 'Full-stack Developer',
    'email' => 'h1y2g3o4@gmail.com',
    'github' => 'https://github.com/PetrukVovaAncientRus',
    'linkedin' => 'https://www.linkedin.com/in/volodymyr-petruk-3aa214340/?isSelfProfile=true',
];

$projects = [
    [
        'title' => 'SKOP BYGG AS Website',
        'slug' => 'skopp-bygg-website',
        'desc' => 'Production website for a Norwegian construction company featuring service catalog, SEO optimization, and dynamic content integration.',
        'tags' => ['Next.js', 'Sanity.io', 'TypeScript', 'Tailwind'],
        'link' => $profile['github'] . '/skopp-bygg-website',
    ],
    [
        'title' => 'Emma Larson Portfolio',
        'slug' => 'emma_larson_portfolio',
        'desc' => 'High-performance interactive photographer portfolio with custom lightbox, responsive galleries, and smooth UI animations.',
        'tags' => ['HTML5', 'CSS3', 'JavaScript'],
        'link' => $profile['github'] . '/emma_larson_portfolio',
    ],
    [
        'title' => 'Momiji Sushi Skien',
        'slug' => 'momiji-sushi-skien',
        'desc' => 'Modern restaurant website featuring an interactive menu, online ordering presentation, and location details.',
        'tags' => ['JavaScript', 'HTML5', 'CSS3'],
        'link' => $profile['github'] . '/momiji-sushi-skien',
    ],
    [
        'title' => 'NeuroBlocks',
        'slug' => 'NeuroBlocks',
        'desc' => 'AI block-building assistant designed for startup founders to rapidly prototype and test idea workflows.',
        'tags' => ['AI/LLM', 'JavaScript', 'Node.js'],
        'link' => $profile['github'] . '/NeuroBlocks',
    ],
];
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title><?= htmlspecialchars($profile['name']) ?> — <?= htmlspecialchars($profile['title']) ?></title>
  <meta name="description" content="<?= htmlspecialchars($profile['name']) ?> — <?= htmlspecialchars($profile['title']) ?> portfolio showcasing full-stack web applications and modern web solutions." />
  
  <!-- Fonts & Icons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
  
  <style>
    :root {
      --bg: #090b0e;
      --card-bg: rgba(18, 22, 28, 0.75);
      --card-border: rgba(255, 255, 255, 0.08);
      --muted: #94a3b8;
      --text-main: #f1f5f9;
      --accent: #6366f1;
      --accent-glow: rgba(99, 102, 241, 0.25);
      --accent-green: #10b981;
      --radius: 16px;
      --maxw: 1120px;
      font-family: 'Plus Jakarta Sans', system-ui, -apple-system, sans-serif;
      color-scheme: dark;
    }

    * { box-sizing: border-box; margin: 0; padding: 0; }
    
    body {
      background: radial-gradient(1200px 600px at 50% 0%, rgba(99, 102, 241, 0.08), transparent), var(--bg);
      color: var(--text-main);
      -webkit-font-smoothing: antialiased;
      line-height: 1.6;
      display: flex;
      justify-content: center;
      padding: 48px 20px;
      min-height: 100vh;
    }

    .container { width: 100%; max-width: var(--maxw); }

    /* Header */
    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 40px;
    }

    .brand { display: flex; gap: 16px; align-items: center; }
    
    .logo {
      width: 52px;
      height: 52px;
      border-radius: 12px;
      background: linear-gradient(135deg, var(--accent), #a855f7);
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 700;
      color: #fff;
      font-size: 18px;
      box-shadow: 0 8px 20px var(--accent-glow);
    }

    h1 { font-size: 22px; font-weight: 700; letter-spacing: -0.3px; }
    .subtitle { font-size: 14px; color: var(--muted); margin-top: 2px; }

    nav { display: flex; gap: 10px; }
    nav a {
      color: var(--muted);
      text-decoration: none;
      font-size: 14px;
      font-weight: 500;
      padding: 8px 16px;
      border-radius: 10px;
      transition: all 0.2s ease;
    }
    nav a:hover { color: var(--text-main); background: rgba(255, 255, 255, 0.05); }

    /* Main Grid */
    main { display: grid; grid-template-columns: 1fr 340px; gap: 32px; }

    .card {
      background: var(--card-bg);
      border: 1px solid var(--card-border);
      padding: 28px;
      border-radius: var(--radius);
      backdrop-filter: blur(12px);
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.4);
    }

    /* Hero Section */
    .hero { display: flex; flex-direction: column; gap: 14px; }
    .hero h2 { font-size: 32px; font-weight: 700; letter-spacing: -0.5px; }
    .hero p { color: var(--muted); font-size: 16px; max-width: 620px; }
    
    .cta { margin-top: 10px; display: flex; gap: 12px; flex-wrap: wrap; }
    .btn {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid var(--card-border);
      padding: 10px 18px;
      border-radius: 10px;
      color: var(--text-main);
      text-decoration: none;
      font-weight: 600;
      font-size: 14px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      transition: all 0.2s ease;
    }
    .btn:hover { background: rgba(255, 255, 255, 0.08); border-color: rgba(255, 255, 255, 0.2); }
    .btn.primary {
      background: linear-gradient(135deg, var(--accent), #4f46e5);
      color: #fff;
      border: none;
      box-shadow: 0 6px 20px var(--accent-glow);
    }
    .btn.primary:hover { transform: translateY(-2px); box-shadow: 0 10px 25px var(--accent-glow); }

    /* Projects List */
    .projects-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .projects-header h3 { font-size: 20px; font-weight: 700; }

    .projects-grid { display: grid; gap: 18px; }
    
    .proj-card {
      display: flex;
      flex-direction: column;
      justify-content: space-between;
      padding: 20px;
      border-radius: 12px;
      background: rgba(255, 255, 255, 0.02);
      border: 1px solid rgba(255, 255, 255, 0.04);
      transition: all 0.25s ease;
    }
    .proj-card:hover {
      border-color: rgba(99, 102, 241, 0.3);
      background: rgba(255, 255, 255, 0.03);
      transform: translateY(-2px);
    }

    .proj-card h4 { font-size: 17px; font-weight: 600; color: #fff; margin-bottom: 6px; }
    .proj-card p { font-size: 14px; color: var(--muted); margin-bottom: 14px; }
    
    .tags { display: flex; gap: 8px; flex-wrap: wrap; margin-bottom: 16px; }
    .tag {
      font-size: 12px;
      padding: 4px 10px;
      border-radius: 20px;
      background: rgba(99, 102, 241, 0.1);
      color: #818cf8;
      border: 1px solid rgba(99, 102, 241, 0.2);
    }

    /* Sidebar Skills & Contact */
    aside { display: flex; flex-direction: column; gap: 24px; position: sticky; top: 24px; height: fit-content; }
    
    .skills-wrapper { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 12px; }
    .skill-pill {
      padding: 6px 12px;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.03);
      border: 1px solid var(--card-border);
      font-size: 13px;
      color: var(--muted);
      font-weight: 500;
    }

    .social-links { display: flex; flex-direction: column; gap: 10px; margin-top: 14px; }
    .social-links .btn { justify-content: center; width: 100%; }

    /* Contact Form */
    .contact-form { display: flex; flex-direction: column; gap: 12px; margin-top: 16px; }
    input, textarea {
      background: rgba(0, 0, 0, 0.2);
      border: 1px solid var(--card-border);
      padding: 12px;
      border-radius: 10px;
      color: #fff;
      font-family: inherit;
      font-size: 14px;
      outline: none;
      transition: border-color 0.2s ease;
    }
    input:focus, textarea:focus { border-color: var(--accent); }
    textarea { min-height: 110px; resize: vertical; }

    footer { margin-top: 48px; color: var(--muted); font-size: 14px; text-align: center; }

    @media (max-width: 900px) {
      main { grid-template-columns: 1fr; }
      header { flex-direction: column; align-items: flex-start; gap: 16px; }
    }
  </style>
</head>
<body>
  <div class="container">
    
    <!-- Navigation Header -->
    <header>
      <div class="brand">
        <div class="logo">VP</div>
        <div>
          <h1><?= htmlspecialchars($profile['name']) ?></h1>
          <div class="subtitle"><?= htmlspecialchars($profile['title']) ?> — Modern Web Apps & Systems</div>
        </div>
      </div>
      <nav>
        <a href="#about">About</a>
        <a href="#projects">Projects</a>
        <a href="#skills">Skills</a>
        <a href="#contact">Contact</a>
      </nav>
    </header>

    <main>
      <!-- Main Content Area -->
      <section style="display: flex; flex-direction: column; gap: 24px;">
        
        <!-- Hero Section -->
        <div class="card hero" id="about">
          <h2>Hi, I'm Volodymyr 👋</h2>
          <p>
            Full-stack Developer passionate about designing clean architectures, modern web frontends, and performant backend services. Experienced with NestJS, Next.js, TypeScript, PostgreSQL, and crafting user-first web applications.
          </p>
          <div class="cta">
            <a class="btn primary" href="#contact">Get in Touch</a>
            <a class="btn" href="<?= htmlspecialchars($profile['github']) ?>" target="_blank" rel="noopener">
              <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M12 0C5.37 0 0 5.37 0 12c0 5.31 3.435 9.795 8.205 11.385.6.105.825-.255.825-.57 0-.285-.015-1.23-.015-2.235-3.015.555-3.795-.735-4.035-1.41-.135-.345-.72-1.41-1.23-1.695-.42-.225-1.02-.78-.015-.795.945-.015 1.62.87 1.845 1.23 1.08 1.815 2.805 1.305 3.495.99.105-.78.42-1.305.765-1.605-2.67-.3-5.46-1.335-5.46-5.925 0-1.305.465-2.385 1.23-3.225-.12-.3-.54-1.53.12-3.18 0 0 1.005-.315 3.3 1.23.96-.27 1.98-.405 3-.405s2.04.135 3 .405c2.295-1.56 3.3-1.23 3.3-1.23.66 1.65.24 2.88.12 3.18.765.84 1.23 1.905 1.23 3.225 0 4.605-2.805 5.625-5.475 5.925.435.375.81 1.095.81 2.22 0 1.605-.015 2.895-.015 3.3 0 .315.225.69.825.57A12.02 12.02 0 0024 12c0-6.63-5.37-12-12-12z"/></svg>
              GitHub
            </a>
            <a class="btn" href="<?= htmlspecialchars($profile['linkedin']) ?>" target="_blank" rel="noopener">
              <svg width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
              LinkedIn
            </a>
          </div>
        </div>

        <!-- Featured Projects -->
        <div class="card" id="projects">
          <div class="projects-header">
            <h3>Featured Projects</h3>
            <span style="color: var(--muted); font-size: 14px;"><?= count($projects) ?> Repositories</span>
          </div>

          <div class="projects-grid">
            <?php foreach ($projects as $proj): ?>
              <article class="proj-card">
                <div>
                  <h4><?= htmlspecialchars($proj['title']) ?></h4>
                  <p><?= htmlspecialchars($proj['desc']) ?></p>
                  <div class="tags">
                    <?php foreach ($proj['tags'] as $tag): ?>
                      <span class="tag"><?= htmlspecialchars($tag) ?></span>
                    <?php endforeach; ?>
                  </div>
                </div>
                <div>
                  <a class="btn" href="<?= htmlspecialchars($proj['link']) ?>" target="_blank" rel="noopener">
                    View Repository &rarr;
                  </a>
                </div>
              </article>
            <?php endforeach; ?>
          </div>
        </div>

      </section>

      <!-- Sidebar -->
      <aside>
        <!-- Tech Stack -->
        <div class="card" id="skills">
          <h4 style="font-size: 16px; font-weight: 700;">Tech Stack & Skills</h4>
          <div class="skills-wrapper">
            <span class="skill-pill">TypeScript</span>
            <span class="skill-pill">JavaScript</span>
            <span class="skill-pill">Node.js</span>
            <span class="skill-pill">NestJS</span>
            <span class="skill-pill">Next.js</span>
            <span class="skill-pill">React</span>
            <span class="skill-pill">PostgreSQL</span>
            <span class="skill-pill">TypeORM</span>
            <span class="skill-pill">HTML/CSS</span>
            <span class="skill-pill">Git / GitHub</span>
          </div>
        </div>

        <!-- Social & Direct Contact -->
        <div class="card">
          <h4 style="font-size: 16px; font-weight: 700;">Connect</h4>
          <div class="social-links">
            <a class="btn" href="mailto:<?= htmlspecialchars($profile['email']) ?>">
              📧 Email Me
            </a>
            <a class="btn" href="<?= htmlspecialchars($profile['linkedin']) ?>" target="_blank" rel="noopener">
              💼 LinkedIn Profile
            </a>
            <a class="btn" href="<?= htmlspecialchars($profile['github']) ?>" target="_blank" rel="noopener">
              💻 GitHub Profile
            </a>
          </div>
        </div>

        <!-- Contact Form -->
        <div class="card" id="contact">
          <h4 style="font-size: 16px; font-weight: 700;">Send a Message</h4>
          <form class="contact-form" id="contactForm" onsubmit="sendMessage(event)">
            <input type="text" id="name" placeholder="Your Name" required />
            <input type="email" id="email" placeholder="Your Email" required />
            <textarea id="message" placeholder="Project details or inquiry..." required></textarea>
            <button class="btn primary" type="submit" style="justify-content: center;">Send Message</button>
          </form>
        </div>
      </aside>

    </main>

    <footer>
      © <?= date('Y') ?> <?= htmlspecialchars($profile['name']) ?> • <?= htmlspecialchars($profile['title']) ?>
    </footer>
  </div>

  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
  <script>
    emailjs.init({ publicKey: "vZHaE9BupmtxLWEvF" });

    async function sendMessage(e) {
      e.preventDefault();
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const message = document.getElementById('message').value.trim();

      if (!name || !email || !message) {
        alert("Please fill in all fields.");
        return;
      }

      try {
        await emailjs.send("service_6iyzbvk", "template_kk3t59a", {
          from_name: name,
          from_email: email,
          message: message
        });
        alert("✅ Message sent successfully!");
        document.getElementById('contactForm').reset();
      } catch (error) {
        console.error(error);
        alert("❌ Failed to send message. Please try again.");
      }
    }
  </script>
</body>
</html>