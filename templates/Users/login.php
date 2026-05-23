<body class="login-page">
<div id="vanta-login" class="login-vanta-page">

    <div class="login-box shadow-sm p-5">
        <h2 class="fw-bold mb-2">Login to your account</h2>
        <p class="text-muted mb-4">Enter your details to continue</p>

        <?= $this->Form->create(null, ['id' => 'loginForm']) ?>

        <div class="mb-3">
            <label class="form-label">Username</label>
            <?= $this->Form->control('username', [
                'label' => false,
                'class' => 'form-control',
                'placeholder' => 'Enter Name',
                'required' => true
            ]) ?>
        </div>

        <div class="mb-3">
            <label class="form-label">Password</label>

            <div class="password-wrapper">
                <?= $this->Form->control('password', [
                    'type' => 'password',
                    'label' => false,
                    'class' => 'form-control',
                    'placeholder' => 'Enter Password',
                    'id' => 'password',
                    'required' => true
                ]) ?>

                <span id="togglePassword" class="password-toggle">
                    <i class="bi bi-eye" id="eyeIcon"></i>
                </span>
            </div>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="rememberMe">
            <label class="form-check-label" for="rememberMe">Remember me</label>
        </div>

        <div class="d-flex gap-2">
            <?= $this->Html->link(
                'Sign Up',
                ['controller' => 'Users', 'action' => 'add'],
                ['class' => 'btn btn-outline-success flex-fill py-2']
            ) ?>

            <button type="submit" class="btn btn-primary flex-fill py-2 shadow-sm">
                Login
            </button>
        </div>

        <?= $this->Form->end() ?>
    </div>

</div>
</div>
</body>

 <script>
document.addEventListener('DOMContentLoaded', function () {
    const togglePassword = document.querySelector('#togglePassword');
    const passwordInput = document.querySelector('#password');
    const eyeIcon = document.querySelector('#eyeIcon');

    togglePassword.addEventListener('click', function () {
        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordInput.setAttribute('type', type);
        
        if (type === 'text') {
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
        } else {
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
        }
    });
});
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r134/three.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vanta@latest/dist/vanta.net.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    VANTA.NET({
        el: "#vanta-login",
        mouseControls: true,
        touchControls: true,
        gyroControls: false,
        minHeight: 200.00,
        minWidth: 200.00,
        scale: 1.00,
        scaleMobile: 1.00,
        color: 0x7c3aed,
        backgroundColor: 0x160b2e,
        points: 12.00,
        maxDistance: 22.00,
        spacing: 18.00
    });
});
</script>