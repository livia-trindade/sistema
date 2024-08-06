<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container">
        <aside class="sidebar">
            <div class="menu">
                <a href="#" class="menu-item">🏠</a> <br> <br> <br> <br>
                <a href="#" class="menu-item">📧</a> <br> <br> <br> <br>
                <a href="#" class="menu-item">📅</a> <br> <br> <br> <br>
                <a href="#" class="menu-item">⚙️</a>
            </div>
        </aside>

        <main class="main-content">
            <header class="header">
                <h1>Bem-vindo peuhh</h1>
                <button class="add-patient-btn">+ Agendar consulta</button>
            </header>

            <section class="report">
                <div class="report-item">📞 1032</div>
                <div class="report-item">📅 207</div>
                <div class="report-item">💊 128</div>
                <div class="report-item">🚑 48</div>
            </section>

            <section class="calendar">
    <div id="calendar-header">
        <button id="prevMonth">❮</button>
        <h2 id="monthYear">Agosto 2024</h2>
        <button id="nextMonth">❯</button>
    </div>
    <div id="calendar-days">
        <div>Dom</div>
        <div>Seg</div>
        <div>Ter</div>
        <div>Qua</div>
        <div>Qui</div>
        <div>Sex</div>
        <div>Sáb</div>
    </div>
    <div id="calendar-dates"></div>
</section>

        </main>

        <aside class="profile">
            <div class="profile-info">
                <img src="../imagens/img1.png" alt="Doctor" class="profile-img" >
                <h3>Dr. Peuh</h3>
            </div>
            <section class="last-patients">
                <h4>Last Patients</h4>
                <ul>
                    <li>Arya Wiguna</li>
                    <li>Shelly Indriani</li>
                    <li>Natlia Mudulsky</li>
                </ul>
            </section>
            <section class="patient-stats">
                <h4>Number of Patients</h4>
                <canvas id="patientChart"></canvas>
            </section>
        </aside>
    </div>

    <script src="../javascript/script.js"></script>
</body>
</html>
