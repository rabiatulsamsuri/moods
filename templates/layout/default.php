<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css(['normalize.min', 'milligram.min', 'fonts', 'cake']) ?>
    <?= $this->Html->css('style.css?v=' . time()) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->Html->css(['style']) ?>

 <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">


    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<?php
$currentController = $this->request->getParam('controller');
$currentAction = $this->request->getParam('action');
 
// NAK HIDE NAVIGATION BAR DEKAT PAGE LOGIN DENGAN SIGN UP
$hideNavbar = 
    $currentController === 'Users' &&
    in_array($currentAction, ['login', 'add']);
?>

<?php if (!$hideNavbar): ?>
    
    <!-- Navigation Bar -->
    <nav class="custom-topbar">
    <div class="container-fluid d-flex justify-content-between align-items-center">

        <div class="d-flex align-items-center gap-3">
            <div class="logo-circle"></div>

            <div>
                <h2 class="m-0 fw-bold text-white">SUCCESS</h2>
                <small class="text-light opacity-75">
                    Productivity System
                </small>
            </div>
        </div>

        <div class="d-flex align-items-center gap-3">

            <a href="http://localhost/mood/dashboard"
               class="topbar-link">
               Dashboard
            </a>

            <a href="http://localhost/mood/tasks"
               class="topbar-link">
               Tasks
            </a>

            <a href="http://localhost/mood/focus-sessions"
               class="topbar-link">
               Pomodoro
            </a>

            <a href="http://localhost/mood/dashboard"
               class="topbar-profile">
            <i class="bi bi-person-circle"></i>
            </a>

        </div>

    </div>
</nav>
<?php endif; ?>

    <main class="main">
        <div class="container">
            <?= $this->Flash->render() ?>
            <?= $this->fetch('content') ?>
        </div>
    </main>

    <footer class="app-footer">
    <p>&copy; 2026 Mental Health Tracker | UiTM IMS566 Project</p>
</footer>

<!-- SCRIPT CAROUSEL UNTUK BANNER PINK MOTIVATION -->
    <?= $this->fetch('script') ?>
</body>
</html>
