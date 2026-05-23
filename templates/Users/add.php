<div class="register-page">
    <div class="register-card">

        <div class="register-header">
            <h2>Create Account</h2>
            <p>Sign up first, then login to access your dashboard</p>
        </div>

        <?= $this->Form->create($user, [
            'autocomplete' => 'off'
        ]) ?>

        <div>
        <?= $this->Form->control('username', [
            'label' => ['text' => 'Username', 'class' => 'custom-label'],
            'class' => 'form-control custom-input',
            'placeholder' => 'Enter username',
            'value' => '',
            'autocomplete' => 'new-username'
        ]) ?>

        <?= $this->Form->control('email', [
            'label' => ['text' => 'Email', 'class' => 'custom-label'],
            'class' => 'form-control custom-input',
            'placeholder' => 'Enter email',
            'value' => '',
            'autocomplete' => 'new-email'
        ]) ?>

        <?= $this->Form->control('password', [
            'type' => 'password',
            'label' => ['text' => 'Password', 'class' => 'custom-label'],
            'class' => 'form-control custom-input',
            'placeholder' => 'Enter password',
            'value' => '',
            'autocomplete' => 'new-password'
        ]) ?>
        </div>

        <div class="mb-4">

            <?= $this->Form->button('Create Account', [
                'class' => 'btn-register-submit'
            ]) ?>
        </div>

        <?= $this->Form->end() ?>

    </div>
</div>