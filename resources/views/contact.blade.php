<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ElectroHub</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex flex-column min-vh-100">

@include('partials.navbar')

<main class="container my-5">
    <div class="text-center mb-5">
        <h1 class="fw-bold">Contact Us</h1>
        <p class="text-muted lead">We're here to help. Reach out and we'll get back to you within 24 hours.</p>
    </div>

    <div class="row g-4">
        <div class="col-lg-4">
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body p-4 text-center">
                    <div class="fs-2 mb-2">📧</div>
                    <h6 class="fw-bold">Email</h6>
                    <a href="mailto:support@electrohub.com" class="text-decoration-none text-muted small">support@electrohub.com</a>
                </div>
            </div>
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body p-4 text-center">
                    <div class="fs-2 mb-2">📞</div>
                    <h6 class="fw-bold">Phone</h6>
                    <p class="text-muted small mb-0">+421 2 123 456 78</p>
                    <p class="text-muted small">Mon–Fri, 9:00–17:00</p>
                </div>
            </div>
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body p-4 text-center">
                    <div class="fs-2 mb-2">📍</div>
                    <h6 class="fw-bold">Address</h6>
                    <p class="text-muted small mb-0">Hlavná 1, 811 01</p>
                    <p class="text-muted small">Bratislava, Slovakia</p>
                </div>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 text-center">
                    <h6 class="fw-bold mb-3">Follow Us</h6>
                    <div class="d-flex justify-content-center gap-3">
                        <a href="#" class="btn btn-outline-dark btn-sm">Twitter</a>
                        <a href="#" class="btn btn-outline-dark btn-sm">Instagram</a>
                        <a href="#" class="btn btn-outline-dark btn-sm">Facebook</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-8">
            <div class="card shadow-sm border-0">
                <div class="card-body p-4 p-md-5">
                    <h4 class="fw-bold mb-4">Send a Message</h4>

                    <div id="successMsg" class="alert alert-success d-none">
                        ✅ Message sent! We'll get back to you within 24 hours.
                    </div>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Full Name</label>
                            <input type="text" class="form-control" placeholder="Your name">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold small">Email Address</label>
                            <input type="email" class="form-control" placeholder="you@example.com">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold small">Order Number (optional)</label>
                            <input type="text" class="form-control" placeholder="e.g. EH-20260323-8472">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold small">Subject</label>
                            <select class="form-select">
                                <option>Select a topic...</option>
                                <option>Order issue</option>
                                <option>Returns & refunds</option>
                                <option>Technical support</option>
                                <option>Product question</option>
                                <option>Other</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label fw-bold small">Message</label>
                            <textarea class="form-control" rows="5" placeholder="Describe your issue or question..."></textarea>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-dark px-5 fw-bold" onclick="submitForm()">Send Message</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<footer class="bg-dark text-white text-center py-4 mt-auto">
    <div class="container">
        <p class="mb-2">About Us | <a href="{{ url('/contact') }}" class="text-white text-decoration-none">Contact</a></p>
        <p class="mb-0 text-muted small">&copy; 2026 ElectroHub</p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function submitForm() {
        document.getElementById('successMsg').classList.remove('d-none');
        window.scrollTo({ top: 0, behavior: 'smooth' });
    }
</script>
</body>
</html>
