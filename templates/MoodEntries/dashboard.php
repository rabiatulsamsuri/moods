<div class="container-fluid h-100 p-0 dashboard-wrapper">
    <div class="row g-0 h-100">
        
    <button class="sidebar-toggle" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>

        <nav id= "sidebar" class="col-md-2 sidebar d-flex flex-column justify-content-between p-4 position-fixed">
            <div>
                <div class="brand text-center mb-5">
                    <div class="logo-icon mb-2 m-auto"></div>
                    <h4 class="fw-bold tracking-wide">SUCCESS</h4>
                </div>

<!-- NAVIGATION SIDE BAR -->
                <ul class="nav flex-column custom-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#top-section">
                            <i class="bi bi-house-door me-3"></i>
                            <span>Overview</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#mood-section">
                            <i class="bi bi-emoji-laughing-fill me-3"></i>
                            <span> Mood</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#dashboard-section">
                            <i class="bi bi-grid me-3"></i> <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="http://localhost/mood/tasks">
                            <i class="bi bi-check2-circle me-3"></i>
                            <span>Tasks List</span>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="http://localhost/mood/focus-sessions">
                            <i class="bi bi-alarm me-3"></i>
                            <span>Pomodoro List</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

<!-- GREETING USER -->
        <main class="col-md-10 offset-md-2 main-content p-4">
            <div id="top-section" class="d-flex justify-content-between align-items-center mb-4">
                <div class="row">
                    <div class="col-lg-9 content-area pe-lg-4">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <?php $loginUser = $this->request->getSession()->read('Auth.User'); ?>

                        <h2 class="fw-bold m-0">
                            Good morning, <?= h($loginUser->username ?? 'User') ?>!
                        </h2>
                            <p class="text-muted m-0">Let's make today amazing</p>
                        </div>

    <!-- DARK MOOD -->
                        <div class="d-flex align-items-center gap-3">
                            <button class="dark-mode-toggle" id="darkModeToggle" title="Dark Mode Toggle">
                                <i class="bi bi-moon-fill" id="darkModeIcon"></i>
                            </button>
                        
<!-- LOGOUT BUTTON -->
                            <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'logout']) ?>" 
                            class="logout-btn text-decoration-none">
                                <i class="bi bi-box-arrow-right fs-4"></i>
                            </a>

                        </div>
                    </div>

<!-- PILIH MOOD HARINI | 4 TABLE FIRST -->
                    <div class="row">
                        <div class="col-md-3">
                            <a href="http://localhost/mood/mood-entries">
                                <div class="summary-card">
                                    <div class="summary-icon green">
                                        <i class="bi bi-emoji-smile"></i>
                                    </div>
                                    <div>
                                        <p>Total Mood</p>
                                        <h3 id="totalMoodCount"><?= $totalMoodEntries ?></h3>
                                        <small>This Month</small>
                                    </div>
                                </div>
                            </a>            
                        </div>

                        <div class="col-md-3">
                            <div class="summary-card">
                                <div class="summary-icon blue">
                                    <i class="bi bi-list-check"></i>
                                </div>
                                <div>
                                    <p>Total Tasks</p>
                                    <h3><?= $totalTasks ?></h3>
                                    <small>All Tasks</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="summary-card">
                                <div class="summary-icon yellow">
                                    <i class="bi bi-stopwatch"></i>
                                </div>
                                <div>
                                    <p>Focus Time</p>
                                    <h3><?= $totalFocusMinutes ?> min</h3>
                                    <small>Pomodoro</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="summary-card">
                                <div class="summary-icon purple">
                                    <i class="bi bi-check2-circle"></i>
                                </div>
                                <div>
                                    <p>Completed</p>
                                    <h3><?= $completedTasks ?></h3>
                                    <small>Tasks Done</small>
                                </div>
                            </div>
                        </div>
                    </div>

<!-- BANNER PINK  -->
                    <div class="banner-card mb-4 mt-5 text-white" id="quoteCard">
                        <div class="quote-content">
                            <div class="quote-icon" id="quoteIcon">
                                <i class="bi bi-stars"></i>
                            </div>

                            <div>
                                <h4 class="fw-bold mb-2" id="quoteText">
                                    The secret of getting ahead is getting started.
                                </h4>
                                <p class="m-0 text-white-50" id="quoteAuthor">— Mark Twain</p>
                            </div>
                        </div>

                        <div class="quote-blob"></div>
                    </div>
                </section>

<!-- MOOD LEVEL -->                                      
<section id="mood-section" class="mb-5 section-block mt-5 reveal-up">
    <h4 class="fw-bold mb-4">Track Your Mood</h4>

    <div class="row text-center g-3">

        <div class="col-3">
            <button type="button" class="mood-btn" onclick="saveMood(5)">
                <i class="bi bi-emoji-laughing mood-icon great"></i>
                <small>Great</small>
            </button>
        </div>

        <div class="col-3">
            <button type="button" class="mood-btn" onclick="saveMood(4)">
                <i class="bi bi-emoji-smile mood-icon good"></i>
                <small>Good</small>
            </button>
        </div>

        <div class="col-3">
            <button type="button" class="mood-btn" onclick="saveMood(3)">
                <i class="bi bi-emoji-neutral mood-icon okay"></i>
                <small>Okay</small>
            </button>
        </div>

        <div class="col-3">
            <button type="button" class="mood-btn" onclick="saveMood(1)">
                <i class="bi bi-emoji-frown mood-icon bad"></i>
                <small>Bad</small>
            </button>
        </div>

    </div>
</section>
                    
<!-- DASHBOARD SIDE BAR -->
                    <section id="dashboard-section" class="mb-5 section-block reveal-up">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h4 class="fw-bold m-0">Productivity Overview</h4>
                            <?= $this->Html->link(
                                'Dashboard',
                                '#dashboard-section',
                                ['class' => 'nav-link']
                            ) ?>
                        </div>

<!-- ADD SESSION -->
                        <div class="row g-3 mt-4">
                            <div class="col-md-3">
                                <?= $this->Html->link(
                                    '<i class="bi bi-plus-circle-fill me-2"></i> New Task',
                                    ['controller' => 'Tasks', 'action' => 'add'],
                                    [
                                        'class' => 'btn action-btn task-btn w-100',
                                        'escape' => false
                                    ]
                                ) ?>
                            </div>

                            <div class="col-md-3">
                                <?= $this->Html->link(
                                    '<i class="bi bi-stopwatch-fill me-2"></i> Pomodoro',
                                    ['controller' => 'FocusSessions', 'action' => 'add'],
                                    [
                                        'class' => 'btn action-btn pomo-btn w-100',
                                        'escape' => false
                                    ]
                                ) ?>
                            </div>
                        </div>                        

<!-- CHART BAR FOCUS TIME BY DAY -->

                        <div class="row g-4 mt-3">
                        <div class="col-md-6">
                            <div class="card p-4 custom-card chart-card">

                                <h6 class="text-muted">Focus Time By Day</h6>

                                <div class="chart-container">
                                    <canvas id="focusByDayChart"></canvas>
                                </div>

                            </div>
                        </div>

<!-- DONUT CHART TIME DISTRUBUTION-->
                        <div class="col-md-6">
                            <div class="card p-4 custom-card chart-card">

                                <h6 class="text-muted">Time Distribution</h6>

                                <div class="chart-container">
                                    <canvas id="focusTimeDistributionChart"></canvas>
                                </div>
                            </div>
                        </div>

                       <div class="row g-4 mt-2">

    <!-- TASK STATUS CHART -->
                        <div class="col-md-6">
                            <div class="card p-4 custom-card chart-card">

                                <h6 class="text-muted mb-3">
                                    Task Status Analytics
                                </h6>

                                <div class="chart-container">
                                    <canvas id="taskStatusChart"></canvas>
                                </div>

                            </div>
                        </div>

                        <!-- MOOD DISTRIBUTION -->
                        <div class="col-md-6">
                            <div class="card p-4 custom-card chart-card">

                                <h6 class="text-muted mb-3">
                                    Mood Trend Today
                                </h6>

                                <div class="chart-container">
                                    <canvas id="moodDistributionChart"></canvas>
                                </div>

                            </div>
                        </div>
                    </div> 
                    </div>
                </section>
                </div>
                
<!-- RIGH SIDE WEATHER -->
                <div class="col-lg-3">
                    
                    <div class="card p-4 widget-card text-white mb-4 text-center header-right-card">
                        <div class="weather-card text-center text-white p-5">

            <!-- DATE -->
                        <h5 id="current-date" class="mb-3 fw-light"></h5>

                    <!-- TIME -->
                        <h1 id="current-time" class="weather-time fw-bold"></h1>

                        <hr class="border-light opacity-50">

                    <!-- WEATHER -->
                        <div class="d-flex justify-content-center align-items-center gap-3 mt-4">
                            <img src="https://cdn-icons-png.flaticon.com/512/1163/1163661.png"
                                width="60">

                            <div class="text-start">
                                <h3 class="fw-bold mb-0">28°C</h3>
                                <p class="mb-0 fs-5">Kuala Lumpur</p>
                            </div>
                        </div>
                    </div>

                    <div class="card p-4 custom-card text-center text-dark bg-white shadow-sm">
                        <span class="fs-1">❤️</span>
                        <p class="fst-italic mt-2">"Believe you can and you're halfway there."</p>
                        <small class="text-muted">— Theodore Roosevelt</small>
                    </div>

                </div>

            </div>
        </main>
        
    </div>
</div>

<!-- DARK MOOD SCRIPT -->
<script>
        //reference element
        const darkModeToggle = document.getElementById('darkModeToggle');
        const darkModeIcon = document.getElementById('darkModeIcon');
        const htmlElement = document.documentElement;

        //check current theme
        const currentTheme = localStorage.getItem('theme') || 'light';
        htmlElement.setAttribute('data-bs-theme', currentTheme);
        updateIcon(currentTheme);

        //toggle
        darkModeToggle.addEventListener('click', () => {
            const currentTheme = htmlElement.getAttribute('data-bs-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';

            htmlElement.setAttribute('data-bs-theme', newTheme);
            localStorage.setItem('theme', newTheme);
            updateIcon(newTheme);
        });

        //change icon
        function updateIcon(theme) {
            if (theme === 'dark'){
                darkModeIcon.className = 'bi bi-sun-fill';
            } else {
                darkModeIcon.className = 'bi bi-moon-stars-fill';
            }
        }

     </script>

<!-- NAVIGATION BAR KIRI -->
<script>
document.addEventListener("DOMContentLoaded", function () {

    const sidebar = document.getElementById("sidebar");
    const toggle = document.getElementById("sidebarToggle");
    const mainContent = document.querySelector(".main-content");

    toggle.addEventListener("click", function () {

        // MOBILE
        if (window.innerWidth <= 768) {

            sidebar.classList.toggle("open");

        } 
        
        // DESKTOP
        else {

            sidebar.classList.toggle("close");
            mainContent.classList.toggle("full");

        }

    });

});
</script>

<!-- ANIMATION SCROLL SCRIPT -->
 <script src="https://unpkg.com/scrollreveal"></script>

<script>
ScrollReveal({
    distance: '70px',
    duration: 1200,
    delay: 150,
    easing: 'ease',
    reset: true
});

ScrollReveal().reveal('.reveal-up', {
    origin: 'bottom',
    interval: 150
});

ScrollReveal().reveal('.reveal-left', {
    origin: 'left',
    interval: 150
});

ScrollReveal().reveal('.reveal-right', {
    origin: 'right',
    interval: 150
});
</script>


<!-- SCRIPT UNTUK BANNER PINK MOTIVATION -->
 <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const quotes = [
    {
        text: "The secret of getting ahead is getting started.",
        author: "— Mark Twain",
        bg: "linear-gradient(135deg, #d94f5c, #9d4edd)"
    },
    {
        text: "Small progress is still progress.",
        author: "— Anonymous",
        bg: "linear-gradient(135deg, #5f60ce, #4a6cf7)"
    },
    {
        text: "Your mental health is a priority.",
        author: "— Healthy Mind",
        bg: "linear-gradient(135deg, #11998e, #1d4e89)"
    }
];

const quoteCard = document.getElementById('quoteCard');
const quoteText = document.getElementById('quoteText');
const quoteAuthor = document.getElementById('quoteAuthor');

let currentQuote = 0;

function changeQuote() {
    currentQuote++;

    if (currentQuote >= quotes.length) {
        currentQuote = 0;
    }

    quoteText.innerText = quotes[currentQuote].text;
    quoteAuthor.innerText = quotes[currentQuote].author;
    quoteCard.style.background = quotes[currentQuote].bg;
}

quoteCard.style.background = quotes[0].bg;

setInterval(changeQuote, 3000);
</script>

<!-- SCRIPT UNTUK KEY IN MOOD LEVEL -->
<script>
function saveMood(moodLevel) {

    fetch("<?= $this->Url->build(['controller' => 'MoodEntries', 'action' => 'quickAdd']) ?>", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-Token": "<?= $this->request->getAttribute('csrfToken') ?>"
        },
        body: JSON.stringify({
            mood_level: moodLevel
        })
    })
    .then(response => response.json())
    .then(data => {
    console.log(data);

    if (data.success) {
        document.getElementById("totalMoodCount").innerText = data.totalMood;
        alert("Mood saved!");
    } else {
        alert(" ! Mood Cannot be saved. Check console.! ");
    }
});
}
</script>

<!-- SCRIPT BAR CHART -->
<script>
const dayCtx = document.getElementById('focusByDayChart');

new Chart(dayCtx, {
    type: 'bar',
    data: {
        labels: <?= json_encode($dayLabels) ?>,
        datasets: [{
            label: 'Minutes',
            data: <?= json_encode($dayMinutes) ?>,
            backgroundColor: ['#dbeafe', '#bfdbfe', '#2563eb', '#bfdbfe', '#dbeafe'],
            borderRadius: 12
        }]
    },
    options: {
    responsive: true,
    maintainAspectRatio: false,

    scales: {
        y: {
            min: 0,
            max: 60,
            afterBuildTicks: function(scale) {
                scale.ticks = [0, 5, 15, 25, 35, 45, 60].map(value => ({ value }));
            },
            ticks: {
                callback: function(value) {
                    return value === 0 ? '0' : value + ' min';
                }
            }
        }
    }
}
});

// SCRIPT DONUT CHART
const focusLabels = <?= json_encode($focusLabels) ?>;
const focusMinutes = <?= json_encode($focusMinutes) ?>;
const total = focusMinutes.reduce((a, b) => a + b, 0);

const percentageLabels = focusLabels.map((label, index) => {
    const percent = total > 0 ? ((focusMinutes[index] / total) * 100).toFixed(1) : 0;
    return `${label} (${percent}%)`; 
});

const distributionCtx = document.getElementById('focusTimeDistributionChart');

new Chart(distributionCtx, {
    type: 'doughnut',
    data: {
        labels: percentageLabels,
        datasets: [{
            data: focusMinutes,
            backgroundColor: ['#4da3ff', '#55d98b', '#ff8a70', '#ffd166'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>

<!-- SCRIPT 2 CHART LAGI -->
<script>
const taskStatusCtx = document.getElementById('taskStatusChart');

new Chart(taskStatusCtx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'In Progress', 'Completed'],
        datasets: [{
            data: [
                <?= $pendingTasks ?>,
                <?= $inProgressTasks ?>,
                <?= $completedTasksChart ?>
            ],
            backgroundColor: ['#c60707', '#dec908', '#22c55e'],
            borderWidth: 0
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});

const moodDistributionCtx = document.getElementById('moodDistributionChart');

new Chart(moodDistributionCtx, {
    type: 'line',
    data: {
        labels: <?= json_encode($moodTrendLabels) ?>,
        datasets: [{
            label: 'Mood Level',
            data: <?= json_encode($moodTrendValues) ?>,
            borderWidth: 3,
            tension: 0.4,
            fill: false,
            pointRadius: 5
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                min: 1,
                max: 5,
                ticks: {
                    stepSize: 1,
                    callback: function(value) {
                        const moods = {
                            1: 'Bad',
                            2: 'Okay',
                            3: 'Good',
                            4: 'Great'
                        };
                        return moods[value];
                    }
                }
            }
        },
        plugins: {
            legend: {
                position: 'bottom'
            }
        }
    }
});
</script> 

<!-- SCRIPT NAV BAR- KANAN / WEATHER -->
<script>
function updateClock() {

    const now = new Date();

    // DATE
    const dateOptions = {
        weekday: 'long',
        day: 'numeric',
        month: 'long'
    };

    const currentDate = now.toLocaleDateString('en-GB', dateOptions);

    // TIME
    let hours = now.getHours();
    let minutes = now.getMinutes();
    let ampm = hours >= 12 ? 'PM' : 'AM';

    hours = hours % 12;
    hours = hours ? hours : 12;

    minutes = minutes < 10 ? '0' + minutes : minutes;

    const currentTime = `${hours}:${minutes} ${ampm}`;

    // DISPLAY
    document.getElementById('current-date').innerHTML = currentDate;
    document.getElementById('current-time').innerHTML = currentTime;
}

// RUN
updateClock();

setInterval(updateClock, 1000);
</script>