window.initToastr = function(message, type = 'success') {
    // Custom styling for dark theme
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "preventDuplicates": false,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    // Custom CSS for dark theme
    let style = document.createElement('style');
    style.textContent = `
        .toast-success {
            background-color: rgb(15 23 42 / 0.9) !important;
            border: 1px solid #10B981 !important;
            color: #10B981 !important;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2) !important;
        }
        #toast-container > div {
            padding: 15px 15px 15px 50px !important;
            border-radius: 0.5rem !important;
            background-position: 15px center !important;
        }
        .toast-progress {
            background-color: #10B981 !important;
            opacity: 0.3;
        }
        .toast-close-button {
            color: #10B981 !important;
            opacity: 0.7;
        }
        .toast-close-button:hover {
            opacity: 1;
        }
        .toast-success::before {
            color: #10B981 !important;
        }
    `;
    document.head.appendChild(style);
    
    toastr[type](message);
}