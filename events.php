<style type="text/css">
    header.masthead,header.masthead:before {
        min-height: 30vh !important;
        height: 30vh !important
    }
</style> <!-- Masthead-->
        <header class="masthead">
            <h2 class="titlebarh text-center text-white">Events</h2>
        </header>
        <!-- events section -->
        <section class="h-events">
            <div class="container">
                <h1 class="header-text text-center my-3 mb-5">Upcoming <span class="text-theme">Events</span></h1>
               
           
                    <div class="row row-cols-1 row-cols-md-3">
                       
                        <div class="col mb-5">
                            <div class="card h-100" data-id="">
                                  
                                    <img src="admin/assets/uploads/>" class="card-img-top" alt="">
                               
                              
                                    <div class="card-body">
                                        <h4 class="event-title">event</h4>
                                        <p class="event-date">date here<i class="icons bi bi-calendar2-event-fill text-theme px-2"></i></p>
                                        <p class="card-tlocation">location here<i class=" icons bi bi-geo-alt-fill text-theme px-2"></i></p>
                                        <small class="text-muted event-desc"></small>
                                    </div>
                                        
                                            <a href="#" class="btn btn-themec">Get Tickets</a>
                                            
                                        
                            </div>
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

</script>