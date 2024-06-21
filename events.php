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
                        <?php
                            $event = $conn->query("SELECT e.*,v.venue FROM events e inner join venue v on v.id=e.venue_id where date_format(e.schedule,'%Y-%m%-d') >= '".date('Y-m-d')."' and e.type = 1 order by unix_timestamp(e.schedule) asc");
                            while($row = $event->fetch_assoc()):
                                $trans = get_html_translation_table(HTML_ENTITIES,ENT_QUOTES);
                                unset($trans["\""], $trans["<"], $trans[">"], $trans["<h2"]);
                                $desc = strtr(html_entity_decode($row['description']),$trans);
                                $desc=str_replace(array("<li>","</li>"), array("",","), $desc);
                            ?>
                        <div class="col mb-5">
                            <div class="card h-100" data-id="<?php echo $row['id'] ?>">
                                  <?php if(!empty($row['banner'])): ?>
                                    <img src="admin/assets/uploads/<?php echo($row['banner']) ?>" class="card-img-top" alt="">
                                <?php endif; ?>
                              
                                    <div class="card-body">
                                        <h4 class="event-title"><?php echo ucwords($row['event']) ?></h4>
                                        <p class="event-date"><i class="icons bi bi-calendar2-event-fill text-theme px-2"></i><?php echo date("F d, Y h:i A",strtotime($row['schedule'])) ?></p>
                                        <p class="card-tlocation"><i class=" icons bi bi-geo-alt-fill text-theme px-2"></i><?php echo ucwords($row['venue']) ?></p>
                                        <small class="text-muted event-desc"><?php echo strip_tags($desc) ?></small>
                                    </div>
                                        
                                            <a href="#" class="btn btn-themec">Get Tickets</a>
                                            
                                        
                            </div>
                        </div>
                          <?php endwhile; ?>
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