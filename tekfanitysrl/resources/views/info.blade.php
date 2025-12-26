<!DOCTYPE html>
<html lang="ro">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Despre Noi - TekFanity SRL</title>
    <link rel="stylesheet" href="/css/style.css">
    <script src="{{asset('js/app.js')}}" defer></script>

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />

    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #333;
            line-height: 1.6;
            margin: 0;
            background: linear-gradient(120deg, #f8fafc 0%, #e3e9f7 100%);
            min-height: 100vh;
        }

        /* Header styles are now only in style.css for consistency */

        /* Hero */
        .hero-info {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),
                url('/images/info-image.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            color: white;
            padding: 180px 2rem 100px;
            text-align: center;
            margin-top: 60px;
        }

        .hero-info h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-info p {
            font-size: 1.3rem;
            max-width: 800px;
            margin: 0 auto 2rem auto;
        }

        .hero-info .cta-button {
            background: #ffa500;
            color: #1e3c72;
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 4px 15px rgba(255, 165, 0, 0.4);
            transition: all 0.3s ease;
        }

        .hero-info .cta-button:hover {
            background: #ff8c00;
            color: #fff;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(255, 165, 0, 0.6);
        }

        /* Despre Noi */
        .despre-noi, .sediu-card, .cta-card {
            padding: 5rem 2rem;
            max-width: 1200px;
            margin: 0 auto 2.5rem auto;
            background: #f6f8fb;
            border-radius: 2rem;
            box-shadow: 0 4px 18px rgba(30,60,114,0.06);
        }

        .despre-noi h2 {
            text-align: center;
            font-size: 2.5rem;
            color: #1e3c72;
            margin-bottom: 2rem;
        }

        .despre-noi p {
            font-size: 1.2rem;
            color: #555;
            line-height: 1.8;
            
            margin-bottom: 1rem;
            text-align: center;
        }

        /* Mission Cards */
        .mission-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .mission-card {
            background: #1e3c72;
            border-radius: 16px;
            text-align: center;
            box-shadow: 0 8px 24px rgba(30,60,114,0.13);
            transition: transform 0.3s cubic-bezier(.4,2,.6,1), box-shadow 0.3s;
            position: relative;
            overflow: hidden;
            padding: 0;
        }
        .mission-card::before {
            content: '';
            position: absolute;
            top: -40px;
            right: -40px;
            width: 80px;
            height: 80px;
            background: rgba(255,165,0,0.08);
            border-radius: 50%;
            z-index: 0;
        }
        .mission-card-content {
            padding: 2.2rem 1.5rem 1.7rem 1.5rem;
            border-radius: 16px;
            box-shadow: 0 2px 8px rgba(30,60,114,0.07);
            position: relative;
            z-index: 1;
        }
        .mission-card h3 {
            color: #ffd580;
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 0 2px 8px rgba(30,60,114,0.13);
        }
        .mission-card p {
            color: #fff;
            font-size: 1.13rem;
            font-weight: 500;
            text-shadow: 0 1px 4px rgba(30,60,114,0.18);
        }
        .mission-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 16px 32px rgba(30,60,114,0.18);
        }

        .mission-card h3 {
            margin-bottom: 1rem;
            font-size: 1.3rem;
            color: #ffa500;
        }

        /* Map Section */
        #map {
            height: 300px;
            max-width: 800px;
            margin: 0 auto;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .team h2 {
            color: #1e3c72;
            text-align: center;
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        /* Stats */
        .stats-section {
            padding: 3.2rem 2rem 1.2rem 2rem;
            background: linear-gradient(120deg, #1e3c72 60%, #2a5298 100%);
            color: white;
            text-align: center;
            position: relative;
        }
        .stats-section h2 {
            margin-bottom: 2.5rem;
            font-size: 2.2rem;
            letter-spacing: 1px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 2.5rem;
            max-width: 1000px;
            margin: 0 auto;
        }
        .stat-item {
            background: rgba(255,255,255,0.07);
            border-radius: 14px;
            padding: 2rem 1rem 1.5rem 1rem;
            box-shadow: 0 4px 18px rgba(30,60,114,0.10);
            transition: transform 0.2s;
        }
        .stat-item:hover {
            transform: scale(1.05);
        }
        .stat-item h3 {
            font-size: 2.3rem;
            margin-bottom: 0.5rem;
            color: #ffa500;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .stat-item p {
            font-size: 1.1rem;
            color: #fff;
            margin: 0;
        }
        /* Footer */
        footer {
            background: #1e3c72;
            color: #fff;
            text-align: center;
            padding: 1.5rem 0 1rem 0;
            font-size: 1rem;
            margin-top: 0;
            letter-spacing: 1px;
            box-shadow: 0 -2px 10px rgba(30,60,114,0.07);
        }

        /* CTA */
        .cta-section {
            width: 100%;
            background: #fff;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 2.2rem 1.5rem 1.5rem 1.5rem;
            margin: 1.2rem 0 0.5rem 0;
            border-radius: 2.5rem;
            box-shadow: 0 8px 32px 0 rgba(255,165,0,0.10);
            position: relative;
            overflow: hidden;
        }
        .cta-section .cta-icon {
            font-size: 4.2rem;
            color: #fff;
            margin-bottom: 1.2rem;
            display: inline-block;
            filter: drop-shadow(0 2px 12px rgba(30,60,114,0.13));
        }
        .cta-section h2 {
            color: #1e3c72;
            font-size: 2.3rem;
            margin-bottom: 0.7rem;
            font-weight: 800;
            letter-spacing: 1px;
            text-shadow: 0 2px 8px rgba(255,255,255,0.13);
        }
        .cta-section .cta-subtitle {
            color: #1e3c72;
            font-size: 1.18rem;
            margin-bottom: 2.2rem;
            font-weight: 500;
            opacity: 0.92;
        }
        .cta-section .cta-btn {
            background: #1e3c72;
            color: #fff;
            padding: 1.1rem 2.7rem;
            border-radius: 40px;
            font-weight: bold;
            text-decoration: none;
            font-size: 1.15rem;
            box-shadow: 0 4px 18px rgba(30,60,114,0.18);
            border: none;
            outline: none;
            transition: all 0.25s cubic-bezier(.4,2,.6,1);
            position: relative;
            overflow: hidden;
        }
        .cta-section .cta-btn:hover {
            background: #16325c;
            color: #ffa500;
            transform: translateY(-2px) scale(1.04);
            box-shadow: 0 8px 32px rgba(30,60,114,0.22);
        }

        @media (max-width: 768px) {
            .hero-info h1 {
                font-size: 2rem;
            }

            .hero-info p {
                font-size: 1rem;
            }

            .despre-noi h2 {
                font-size: 1.8rem;
            }

            .despre-noi p {
                font-size: 1rem;
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="header-container">
            <a href="/index" class="logo">Tek<span>Fanity</span> SRL</a>
            <button class="menu-toggle" aria-label="Toggle menu">☰</button>
            <nav class="nav">
                <a href="/index">Acasă</a>
                <a href="/info">Despre Noi</a>
                <a href="/servicii">Servicii</a>
                <a href="/contact">Contact</a>
            </nav>
        </div>
    </header>

    <!-- Hero -->
    <section class="hero-info">
        <div class="hero-content">
            <h1>Despre TekFanity</h1>
            <p>Informații utile despre serviciile noastre și modul de lucru.</p>
            <a href="/contact" class="cta-button">Solicită o ofertă</a>
        </div>
    </section>

    <!-- Despre Noi -->
    <section class="despre-noi">
        <h2>Cine suntem noi?</h2>
        <p>TekFanity SRL este o companie românească specializată în construcții rezidențiale și comerciale.</p>
        <p>Folosim tehnologii moderne, respectăm termenele și oferim soluții adaptate fiecărui client.</p>

        <div class="mission-grid">
            <div class="mission-card">
                <div class="mission-card-content">
                    <h3>Profesionalism</h3>
                    <p>Executăm lucrări la standarde înalte, respectând calitatea și termenele.</p>
                </div>
            </div>
            <div class="mission-card">
                <div class="mission-card-content">
                    <h3>Inovație</h3>
                    <p>Folosim materiale și tehnologii moderne pentru proiecte durabile.</p>
                </div>
            </div>
            <div class="mission-card">
                <div class="mission-card-content">
                    <h3>Integritate</h3>
                    <p>Colaborăm cu transparență și responsabilitate cu toți clienții.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Sediul nostru Card -->
    <section class="team">
        <div class="sediu-card">
            <h2>Sediul nostru</h2>
            <div id="map" style="height: 300px; max-width: 800px; margin: 0 auto; border-radius: 12px; box-shadow: 0 6px 15px rgba(0,0,0,0.1);"></div>
        </div>
    </section>

    <!-- Map Section -->


    <!-- Stats -->
    <section class="stats-section">
        <h2>Proiecte și realizări</h2>
        <div class="stats-grid">
            <div class="stat-item">
                <h3>100+</h3>
                <p>Proiecte finalizate</p>
            </div>
            <div class="stat-item">
                <h3>7+</h3>
                <p>Ani experiență</p>
            </div>
            <div class="stat-item">
                <h3>95%</h3>
                <p>Clienți mulțumiți</p>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="cta-card" style="padding: 3rem 2rem;">
            <div class="cta-icon">&#128222;</div>
            <h2>Hai să discutăm!</h2>
            <div class="cta-subtitle">Ai o idee sau un proiect? Echipa noastră te ajută să-l transformi în realitate. Contactează-ne și hai să începem!</div>
            <a href="/contact" class="cta-btn">Contactează-ne acum</a>
        </div>
    </section>

    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        const map = L.map('map').setView([45.638, 25.576], 15);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors'
        }).addTo(map);
        const marker = L.marker([45.638, 25.576]).addTo(map)
            .bindPopup('<b>TekFanity SRL</b><br>Brașov, România')
            .openPopup();
    </script>

    <footer>
        &copy; {{ date('Y') }} TekFanity SRL. Toate drepturile rezervate.
    </footer>
</body>

</html>