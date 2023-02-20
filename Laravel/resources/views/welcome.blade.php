<!DOCTYPE html>
<html lang="en">

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    @vite(['resources/js/app.js'])

</head>

<body>
    <!-- Nav -->
    <nav class="navbar navbar-expand-lg bg-dark bg-opacity-75">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand fs-4 text-primary" href="index.html">
                <img src="/images/BBLogo.png" alt="Bootstrap" width="30" />
                Brew Brothers</a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto m-2 m-lg-0">
                    <li class="nav-item">
                        <a class="nav-link fs-5" aria-current="page" href="contact.html">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-secondary-alt fs-5 disabled">Shop - Coming Soon</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Nav End -->
    <!-- hero start -->
    <div class="bg d-flex flex-column justify-content-center min-vh-100 navpos">
        <div class="text-center text-light col-md-8 offset-md-2">
            <h1 class="display-1 text-primary fw-medium">
                Brew Brothers Craft Brewery
            </h1>

            <p class="lead pb-3">Small batch brewing in the heart of Wexford</p>
        </div>
    </div>
    <!-- hero end -->
    <div class="container-md">
        <div class="row pt-5">
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h3>The Experience!</h3>
                <p>
                    We created Brew Brothers to bring high quality small batch brewing
                    to everybody in Gorey. Giving people the choice between average,
                    mass produced supermarket products or fresh, flavoursome, quality
                    ale brewed on their doorstep!
                </p>
                <p>
                    Brew Brothers is a local, family run business that doesn't accept
                    anything mediocre. We only drink the high quality beers we produce
                    because we cant find anything else to match it locally.
                </p>

                <p>
                    Visit us at the brewery, meet the brewers, see the brewing process
                    happening & visit our shop to take home our full range of beers.
                </p>
            </div>
            <!-- spacer col -->
            <div class="col-md-2"></div>
            <!-- end spacer col -->
            <div class="col-md-4">
                <div id="carouselExampleIndicators" class="carousel carousel-dark slide">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                            aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                            class="active" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                            aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item">
                            <img src="/images/stone.jpg" class="d-block w-100" alt="beers on gravel" />
                        </div>
                        <div class="carousel-item active">
                            <img src="/images/table.jpg" class="d-block w-100" alt="ale on a table" />
                        </div>
                        <div class="carousel-item">
                            <img src="/images/grass.jpg" class="d-block w-100" alt="beers on grass" />
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid my-5 p-5 bg-dark">
        <div class="container-md">
            <div class="row">
                <div class="col-md-6">
                    <img src="/images/bottles.jpg" class="img-fluid rounded mb-4" />
                </div>
                <div class="col-md-6 text-light">
                    <h3>What Is Craft Beer?</h3>
                    <p>
                        Craft beers are generally different from other drinks on the
                        market due to levels of innovation. Its all about distinctive
                        flavors, exciting twists on historic recipes, & even getting
                        involved in local communities through sponsorship or product
                        donation.
                    </p>
                    <p>
                        Craft beer tends to have a richer flavor & a more distinctive
                        taste compared to more ubiquitous beers. Take in that sweet, sweet
                        aroma too & you know your on to a good thing!
                    </p>
                    <p>
                        The taste & smell is nurtured through raw ingredients, brewing
                        process, correct serving style & type of craft beer. Customers
                        will usually expect their beer to come with a foam head, so
                        correct pouring is a must to ensure a quality finish.
                    </p>
                    <p>
                        Simply put, craft brewing is the process of making a delicious
                        craft beer. This involves meeting certain standards of quality,
                        including the use of traditional ingredients.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container-md my-5">
        <div class="row">
            <div class="col-md-6 d-flex flex-column justify-content-center">
                <h3 class="sub">About Us.</h3>
                <div class="lead fw-semibold">Where it started.</div>
                <p>
                    Brew Brothers was established in 2020 by two friends in a purpose
                    built brew shed. During the uncertain times of the Covid lockdown &
                    finding a lot of free times on their hands they invested in
                    commercial brewing equipment to produce something special.
                </p>
                <p>
                    Taking their combined knowledge of beer making they refined &
                    perfected four classic ale recipes. Achieving a core range that
                    would suit a wide range of customers & their particular tastes.
                </p>
                <p>
                    Choose from a light refreshing pale ale, a hoppy dark pale ale, a
                    classic red ale or our satisfying chocolate & coffee Irish stout.
                </p>
            </div>
            <div class="col-md-6">
                <img src="/images/brewery.jpg" alt=" field with trees" class="img-fluid rounded" />
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark">
        <div class="container-md py-5">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="text-light">Wholesale Partners.</h3>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="/images/associate/table41.jpg" alt="table fourty one" class="img-fluid" />
                </div>
                <div class="col-md-6 d-flex justify-content-center">
                    <img src="/images/associate/thekitchen.png" alt="the kitchen" class="img-fluid" />
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid bg-primary">
        <div class="container-md">
            <div class="py-5">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h5>Get In Touch</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2 d-flex gap-2">
                                <i class="bi bi-pin-map-fill"></i>
                                <p class="p-0 text-muted">
                                    Craig Carraig, Ballytegan Rd, Gorey, Wexford Y25T8N8
                                </p>
                            </li>
                            <li class="nav-item mb-2 d-flex gap-2">
                                <i class="bi bi-telephone-fill"></i>
                                <p class="p-0 text-muted">+353 (0)86 173 4703</p>
                            </li>
                            <li class="nav-item mb-2 d-flex gap-2">
                                <i class="bi bi-envelope-fill"></i>
                                <p class="p-0 text-muted">info@brewbrothers.ie</p>
                            </li>
                        </ul>
                    </div>

                    <div class="col-md-6 mb-3">
                        <h5>Follow Us On Social Media</h5>
                        <ul class="nav gap-5">
                            <li class="nav-item mb-2 d-flex gap-2">
                                <a class="link-dark" href="https://www.instagram.com/brewbrothersgorey/">
                                    <p class="display-5">
                                        <i class="bi bi-instagram"></i>
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item mb-2 d-flex gap-2">
                                <a class="link-dark" href="https://www.facebook.com/brewbrothersgorey/">
                                    <p class="display-5">
                                        <i class="bi bi-facebook"></i>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
                    <p>© 2023 Connor Mattless</p>
                    <ul class="list-unstyled d-flex gap-3">
                        <li>
                            <a class="link-dark" href="https://www.instagram.com/brewbrothersgorey/"><i
                                    class="bi bi-instagram"></i></a>
                        </li>
                        <li>
                            <a class="link-dark" href="https://www.facebook.com/brewbrothersgorey/"><i
                                    class="bi bi-facebook"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
</body>

</html>
