document.addEventListener('DOMContentLoaded', function() {
    const cashCheckbox = document.getElementById('cash_payment');
    const bankCheckbox = document.getElementById('bank_transfer');

    cashCheckbox.addEventListener('change', function() {
        if (this.checked) {
            bankCheckbox.checked = false;
        }
    });

    bankCheckbox.addEventListener('change', function() {
        if (this.checked) {
            cashCheckbox.checked = false;
        }
    });
});
