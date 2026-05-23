<!DOCTYPE html>
<html lang="ms">
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->fetch('title') ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <?= $this->fetch('script') ?>
    <?= $this->Html->css('style') ?>
</head>
<body>

    <?= $this->fetch('content') ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.custom-nav .nav-link').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const targetId = this.getAttribute('href');
                const targetSection = document.querySelector(targetId);
                if(targetSection) {
                    targetSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    document.querySelectorAll('.custom-nav .nav-link').forEach(el => el.classList.remove('active'));
                    this.classList.add('active');
                }
            });
        });
    </script>

    <?= $this->fetch('script') ?>

<!-- SCRIPT NAVIGATION BAR - KANAN / WEAHTHER -->
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

// UPDATE EVERY SECOND
setInterval(updateClock, 1000);

</script>
</body>
</html>