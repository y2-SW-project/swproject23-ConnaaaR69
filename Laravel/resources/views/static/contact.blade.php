<x-layout>
    <!-- form -->
    <div class="container-md">
        <div class="d-flex flex-column justify-content-center">
            <div class="container-md py-5">
                <div class="row justify-content-center">
                    <div class="col-md-6 my-auto">
                        <h1 class="contactTitle">Contact us.</h1>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter your name" aria-label="Name"
                                aria-describedby="basic-addon2" />
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Enter your phone number"
                                aria-label="Phone Number" aria-describedby="basic-addon2" />
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Email Address"
                                aria-label="Email Address" aria-describedby="basic-addon2" />
                        </div>

                        <div class="input-group">
                            <span class="input-group-text">Message</span>
                            <textarea class="form-control" aria-label="Message"></textarea>
                        </div>
                        <button class="btn btn-primary btn-lg mt-4">Submit</button>
                    </div>
                    <div class="col-md-6">
                        <img class="img-fluid rounded-5 d-none d-md-block"
                            src="{{ asset('/images/home/manybottles.jpg') }}" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end form -->
</x-layout>
