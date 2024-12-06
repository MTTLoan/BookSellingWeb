document.addEventListener('DOMContentLoaded', function() {
    const branchButton = document.getElementById('branchButton');
    const emailButton = document.getElementById('emailButton');
    const settingsButton = document.getElementById('settingsButton');
    const accountButton = document.getElementById('accountButton');

    if (branchButton) {
        branchButton.addEventListener('click', function() {
            window.location.href = 'ChiNhanh.blade.php';
        });
    }

    if (emailButton) {
        emailButton.addEventListener('click', function() {
            window.location.href = 'Email.blade.php';
        });
    }

    if (settingsButton) {
        settingsButton.addEventListener('click', function() {
            window.location.href = 'Settings.blade.php';
        });
    }

    if (accountButton) {
        accountButton.addEventListener('click', function() {
            window.location.href = 'Account.blade.php';
        });
    }
});
