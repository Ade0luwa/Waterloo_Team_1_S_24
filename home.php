
<style>
    #portfolio .img-fluid{
        width: calc(100%);
        height: 30vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }
    .event-list{
    cursor: pointer;
    }
    span.hightlight{
        background: yellow;
    }
    .banner{
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 26vh;
        width: calc(30%);
    }
    .banner img{
        width: calc(100%);
        height: calc(100%);
        cursor :pointer;
    }
    .event-list{
    cursor: pointer;
    border: unset;
    flex-direction: inherit;
    }

    .event-list .banner {
        width: calc(40%)
    }
    .event-list .card-body {
        width: calc(60%)
    }
    .event-list .banner img {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        min-height: 50vh;
    }
    span.hightlight{
        background: yellow;
    }
    .banner{
       min-height: calc(100%)
}
</style>
        <header class="masthead">
            <div class="container-fluid h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-8 align-self-center mb-4 page-title">


                        <div class="hbanner-text">
                        <div class="text-center text-light my-5">
                            <h1 class="cover-title">Welcome to <span class="text-theme">Effortless Events</span></h1>
                            <br>
                            <p class="cover-text">
                                Whether you're looking to book a cocktail party, post-work
                                gathering, celebratory function, conference, business meeting,
                                wedding or private dining event, our dedicated Urban Events team
                                can create a package that will meet your every need.
                            </p>
                        </div>
                    </div>
                        
                    </div>
                    
                </div>
            </div>
        </header>

        <section>
            <div class="container">
                <div class="row mb-5 g-0">
                    <div class="col-md-3 text-center py-5 px-2">
                        <a href="#" class="service">
                            <i class="bi bi-journal-bookmark-fill h3"></i>
                            <h5 class="mt-3">Convenient Booking</h5>
                            <p class="mt-4 mx-2">Attendees can register to events online.
                                Depending on how the event has been setup this can include pre-booked 
                                 reservation selections.</p>
                        </a>
                    </div>
                    <div class="col-md-3 text-center py-5 px-2">
                        <a href="#" class="service">
                            <i class="bi bi-phone-vibrate-fill h2"></i>
                            <h5 class="mt-3">Instant Accessing</h5>
                            <p class="mt-4 mx-2">Planning a business event is a mammoth task.You can find a venue, 
                                                 create the agenda,sort out seating plans instantly</p>
                        </a>
                    </div>
                    <div class="col-md-3 text-center py-5 px-2">
                        <a href="#" class="service">
                            <i class="bi bi-search h3"></i>
                            <h5 class="mt-3">Easy Searching</h5>
                            <p class="mt-4 mx-2">A clear vision, backed by definite plans, gives you a tremendous
                                                 feeling of confidence and personal power so can be easliy searhed</p>
                        </a>
                    </div>
                    <div class="col-md-3 text-center py-5 px-2">
                        <a href="#" class="service">
                            <i class="bi bi-diagram-3-fill h2"></i>
                            <h5 class="mt-3">Fast Connecting</h5>
                            <p class="mt-4 mx-2">Connect With People You Know
                            it will let you select from dozens or maybe even hundreds
                             of people you know but haven't yet connected to</p>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- events section -->
        <section class="h-events">
            <div class="container">
                <h1 class="header-text text-center my-3 mb-5">Our <span class="text-theme">Events</span></h1>
               
           
                    <div class="row row-cols-1 row-cols-md-3">
                        
                        <div class="col mb-5">
                            <div class="card h-100" data-id="">
                                  
                                    <img src="admin/assets/uploads/" class="card-img-top" alt="">
                               
                              
                                    <div class="card-body">
                                        <h4 class="event-title"></h4>
                                        <p class="event-date"><i class="icons bi bi-calendar2-event-fill text-theme px-2"></i></p>
                                        <p class="card-tlocation"><i class=" icons bi bi-geo-alt-fill text-theme px-2"></i></p>
                                        <small class="text-muted event-desc"></small>
                                    </div>
                                        
                                            <a href="#" class="btn btn-themec">Get Tickets</a>
                                          
                            </div>
                        </div>
                          
                </div>
            </div>
        </section>

        <!-- venue section -->
        <section class="h-events">
            <div class="container-fluid mt-3 pt-2">
                <h1 class="header-text text-center my-3 mb-5">List of Our <span class="text-theme">Event Venues</span></h1>
                <div class="row-items">
                <div class="col-lg-12">
                    <div class="row">
                
                <div class="col-md-6">
                <div class="card venue-list ">

                        <div id="imagesCarousel_ card-img-top " class="carousel slide" data-ride="carousel">
                            
                              <div class="carousel-inner">
                              
                                    
                                         <div class="carousel-item ">
                                          <img class="d-block w-100" src="" alt="">
                                        </div>
                                    
          
                                        </div>
                                    </div>
                    <div class="card-body">
                        <div class="row align-items-center justify-content-center text-center h-100">
                            <div class="">
                                <div>
                                    <h3><b class="filter-txt"></b></h3>
                                    <small><i></i></small>
                                </div>
                                <div>
                                <span class="truncate" style="font-size: inherit;"><small></small></span>
                                    <br>
                                <span class="badge badge-secondary"><i class="fa fa-tag"></i> Rate Per Hour: 23</span>
                                <br>
                                <br>
                                <button class="btn btn-themec book-venue align-self-end" type="button" data-id=''>Book Now</button>
                                </div>
                            </div>
                        </div>
                        

                    </div>
                </div>
                <br>
                </div>
               
                </div>
                </div>
                </div>
            </div>
        </section>

        <!-- about us section -->
        <section class="p-5 mt-1 mb-5" id="about">
            <div class="container">
                <div class="text-center">
                    <h1 class="header-text">About<span class="text-theme"> Us</span></h1>
                </div>
                <div class="row align-items-center justify-content-between">
                    <div class="col-12 mt-3">
                        <p class="text-center">
                        Effortless Events
                        Effortless Events is an honor-winning event arranging and setting firm.
                        Our full services, all the way subtleties, and administrations make our
                        studio the ideal beginning for everything party style. Through imaginative 
                        structure and immaculate execution, we create paramountly and one-of-a-kind 
                        events everything being equal, sizes and styles.
                        For a long time our capable, experienced group has aced incalculable festivals. 
                        weddings, corporate, occasions, birthday celebrations, meals and thats only
                        the tip of the iceberg.
                        Our events are totally altered, mirroring the brand identity of every
                        customer. Regardless of whether we represent a family, an item, an organization,
                        or a reason, our work grasps encounters that incorporate inventive plan with the
                        best in wine and mixed drinks, eating, music, diversion, and—most vital of 
                        all—that immaterial component of shock.
                        Regardless of whether you are a major national or universal company with an extensive 
                        spending plan or a private venture with constrained money-related assets,
                        we have the energy, ability, and experience to make your event a novel and
                        noteworthy event that you will think back to on proudly.
                        </p>
                    </div>
                </div>
            </div>
        </section>

         
       


<script>
     $('.read_more').click(function(){
         location.href = "index.php?page=view_event&id="+$(this).attr('data-id')
     })
     $('.banner img').click(function(){
        viewer_modal($(this).attr('src'))
    })
    $('#filter').keyup(function(e){
        var filter = $(this).val()

        $('.card.event-list .filter-txt').each(function(){
            var txto = $(this).html();
            txt = txto
            if((txt.toLowerCase()).includes((filter.toLowerCase())) == true){
                $(this).closest('.card').toggle(true)
            }else{
                $(this).closest('.card').toggle(false)
               
            }
        })
    })
</script>

<script>
    // $('.card.venue-list').click(function(){
    //     location.href = "index.php?page=view_venue&id="+$(this).attr('data-id')
    // })
    $('.book-venue').click(function(){
        uni_modal("Submit Booking Request","booking.php?venue_id="+$(this).attr('data-id'))
    })
    $('.venue-list .carousel img').click(function(){
        viewer_modal($(this).attr('src'))
    })

</script>