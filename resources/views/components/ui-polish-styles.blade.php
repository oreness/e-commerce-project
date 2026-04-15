<style>
    :root {
        --eh-bg: #f7f8fb;
        --eh-text: #1f2937;
        --eh-muted: #6b7280;
        --eh-primary: #111827;
        --eh-accent: #f59e0b;
    }

    body {
        background-color: var(--eh-bg) !important;
        color: var(--eh-text);
    }

    .card {
        border-radius: 14px;
    }

    .card,
    .btn,
    .form-control,
    .form-select,
    .badge,
    .alert {
        transition: all 0.2s ease;
    }

    .card:hover {
        transform: translateY(-2px);
        box-shadow: 0 0.65rem 1.6rem rgba(17, 24, 39, 0.12) !important;
    }

    .btn-dark {
        background-color: var(--eh-primary);
        border-color: var(--eh-primary);
    }

    .btn-dark:hover {
        filter: brightness(1.07);
    }

    .btn-warning {
        background-color: var(--eh-accent);
        border-color: var(--eh-accent);
        color: #111827;
    }

    .btn-warning:hover {
        filter: brightness(1.03);
        color: #111827;
    }

    .form-control:focus,
    .form-select:focus {
        border-color: #a3a3a3;
        box-shadow: 0 0 0 0.2rem rgba(17, 24, 39, 0.12);
    }

    .navbar {
        backdrop-filter: saturate(130%) blur(3px);
    }

    .page-title {
        letter-spacing: -0.02em;
    }

    .soft-enter {
        animation: softEnter 260ms ease;
    }

    @keyframes softEnter {
        from {
            opacity: 0;
            transform: translateY(6px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .card,
        .btn,
        .form-control,
        .form-select,
        .badge,
        .alert {
            transition: none;
        }

        .soft-enter {
            animation: none;
        }
    }
</style>
