<footer class="text-center text-lg-start bg-body-tertiary custom-bg-dark bg-dark text-white">
    <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">

        <div class="me-5 d-none d-lg-block">
            <span>Get connected with us on social networks:</span>
        </div>

        <div>
            <a href="" class="me-4 text-reset text-decoration-none">
                <i class="fab fa-facebook-f"></i>
            </a>

            <a href="" class="me-4 text-reset text-decoration-none">
                <i class="fab fa-twitter"></i>
            </a>

            <a href="" class="me-4 text-reset">
                <i class="fab fa-instagram"></i>
            </a>
        </div>

    </section>

    <section class="">
        <div class="container text-center text-md-start mt-5">

            <div class="row mt-3">

                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        <i class="fas fa-gem me-3"></i>{{ config('app.name') }}
                    </h6>
                    <p>
                        Here you can use rows and columns to organize your footer content. Lorem ipsum
                        dolor sit amet, consectetur adipisicing elit.
                    </p>
                </div>
                <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold mb-4">
                        Food Products
                    </h6>
                    <p>
                        <a href="#!" class="text-reset text-decoration-none">Nepali</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset text-decoration-none">Chinesee</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset text-decoration-none">Indian</a>
                    </p>

                </div>


                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                    <h6 class="text-uppercase fw-bold mb-4">
                        Quick links
                    </h6>
                    <p>
                        <a href="{{ route('home') }}" class="text-reset text-decoration-none">Home</a>
                    </p>
                    <p>
                        <a href="{{ route('menu') }}" class="text-reset text-decoration-none">Menu</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset text-decoration-none">Orders</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset text-decoration-none">Privacy and Policy</a>
                    </p>
                </div>


                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>

                        <p><i class="fas fa-home me-3"></i>{{ $contact->address }} </p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            {{ $contact->email }}
                        </p>
                        <p><i class="fas fa-phone me-3"></i>{{ $contact->phone }}</p>
                        <p><i class="fas fa-print me-3"></i> {{ $contact->fax }}</p>


                </div>

            </div>

        </div>
    </section>

    <div class="text-center p-2 bg-primary text-white">
        © 2024 Copyright: XDezo Technologies

    </div>

</footer>
@stack('footer-script')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
@stack('script')
@notifyJs
</body>

</html>
