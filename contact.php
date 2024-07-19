<style type="text/css">
    header.masthead,header.masthead:before {
        min-height: 30vh !important;
        height: 30vh !important
    }
</style> <!-- Masthead-->
        <header class="masthead">
            <h2 class="titlebarh text-center text-white">Contact Us</h2>
        </header>
        <section class="py-5">
            <div class="container px-5">
                <!-- Contact form-->
                <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
                    <div class="text-center mb-5">
                        <i class="bi bi-envelope-fill h2 text-theme"></i>
                        <h1 class="fw-bolder">Get in touch</h1>
                        <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xl-6">
                            <form id="contactForm">
                                <!-- Name input-->
                                <div class="form-floating mb-3">
                                    <label for="name">Full name</label>
                                    <input class="form-control" id="name" type="text" />
                                    
                                </div>
                                <!-- Email address input-->
                                <div class="form-floating mb-3">
                                    <label for="email">Email address</label>
                                    <input class="form-control" id="email" type="email"
                                        data-sb-validations="required,email" />
                                    
                                </div>
                                <!-- Phone number input-->
                                <div class="form-floating mb-3">
                                    <label for="phone">Phone number</label>
                                    <input class="form-control" id="phone" type="tel" data-sb-validations="required" />
                                    
                                </div>
                                <!-- Message input-->
                                <div class="form-floating mb-3">
                                    <label for="message">Message</label>
                                    <textarea class="form-control" id="message" type="text" rows="10"
                                        data-sb-validations="required">
                                    </textarea>
                                    
                                </div>

                                <!-- Submit Button-->
                                <div class="d-grid">
                                    <button class="btn btn-themec btn-lg" id="submitButton" type="submit">Submit
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


                <!-- Contact cards-->
                <div class="row py-5">
                    <div class="col-lg-3 col-md-6 pb-3">

                        <div class="h5"><i class="bi bi-chat-dots-fill text-theme h3"></i> Chat with us</div>
                        <p class="text-muted mb-0">Chat live with one of our support specialists.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 pb-3">
                        <div class="h5"><i class="bi bi-people-fill text-theme h3"></i> Ask the community</div>
                        <p class="text-muted mb-0">Explore our community forums and communicate with other users.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 pb-3">
                        <div class="h5"><i class="bi bi-question-circle-fill text-theme h3"></i> Support center</div>
                        <p class="text-muted mb-0">Browse FAQ's and support articles to find solutions.</p>
                    </div>
                    <div class="col-lg-3 col-md-6 pb-3">
                        <div class="h5"><i class="bi bi-telephone-forward-fill text-theme h3"></i> Call us</div>
                        <p class="text-muted mb-0">Call us during normal business hours at (555) 892-9403.</p>
                    </div>
                </div>
            </div>
        </section>