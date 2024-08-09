<?php 
include 'admin/db_connect.php'; 
?>
<style>
    #portfolio .img-fluid {
        width: calc(100%);
        height: 30vh;
        z-index: -1;
        position: relative;
        padding: 1em;
    }
    .event-list {
        cursor: pointer;
        border: unset;
        flex-direction: inherit;
    }
    .event-list .carousel,
    .event-list .card-body {
        width: calc(50%);
    }
    .event-list .carousel img.d-block.w-100 {
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        min-height: 50vh;
    }
    span.hightlight {
        background: yellow;
    }
    .carousel,
    .carousel-inner,
    .carousel-item {
        min-height: calc(100%);
    }
    header.masthead,
    header.masthead:before {
        min-height: 30vh !important;
        height: 30vh !important;
    }
    .row-items {
        position: relative;
    }
    .card-left {
        left: 0;
    }
    .card-right {
        right: 0;
    }
    .rtl {
        direction: rtl;
    }
    .event-text {
        justify-content: center;
        align-items: center;
    }
</style>

<header class="masthead">
    <h2 class="titlebarh text-center text-white">Our Events</h2>
</header>

<div class="container-fluid mt-3 pt-2 eventlistpage">
    <!-- Search Bar -->
    <div class="row">
        <div class="col-sm-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="search-input" placeholder="Search for events..." aria-label="Search for events">
                
            </div>
        </div>
    </div>

    <!-- No Results Message -->
    <div id="no-results-message" class="alert alert-warning" style="display: none;">
        No events found. Please try a different search query.
    </div>

    <div class="row-items">
        <div class="col-lg-12">
            <div class="row" id="event-list">
                <?php
                $rtl = 'rtl';
                $ci = 0;
                $event = $conn->query("SELECT * FROM events ORDER BY date_created DESC");
                while ($row = $event->fetch_assoc()):
                    $ci++;
                    if ($ci < 3) {
                        $rtl = '';
                    } else {
                        $rtl = 'rtl';
                    }
                    if ($ci == 4) {
                        $ci = 0;
                    }
                ?>
                <div class="col-md-6">
                    <div class="card event-list <?php echo $rtl ?>" data-id="<?php echo $row['id'] ?>">
                        <div id="imagesCarousel_<?php echo $row['id'] ?> card-img-top " class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                <?php 
                                    $images = array();
                                    $fpath = 'admin/assets/uploads/event_' . $row['id'];
                                    $images = scandir($fpath);
                                    $i = 1;
                                    foreach ($images as $k => $v):
                                        if (!in_array($v, array('.', '..'))):
                                            $active = $i == 1 ? 'active' : '';
                                ?>
                                <div class="carousel-item <?php echo $active ?>">
                                    <img class="d-block w-100" src="<?php echo $fpath . '/' . $v ?>" alt="">
                                </div>
                                <?php
                                            $i++;
                                        else:
                                            unset($images[$v]);
                                        endif;
                                    endforeach;
                                ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row align-items-center justify-content-center text-center h-100">
                                <div class="">
                                    <div>
                                        <h3><b class="filter-txt"><?php echo ucwords($row['event']) ?></b></h3>
                                        <small><i><?php echo $row['description'] ?></i></small>
                                    </div>
                                    <div>
                                        <span class="truncate" style="font-size: inherit;">
                                            <small><?php echo ucwords($row['type']) ?></small>
                                        </span>
                                        <br>
                                        <span class="badge badge-secondary">
                                            <i class="fa fa-tag"></i> Amount: <?php echo number_format($row['amount'], 2) ?>
                                        </span>
                                        <br><br>
                                        <button class="btn btn-themec book-event align-self-end" type="button" data-id='<?php echo $row['id'] ?>'>Book Now</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#search-input').on('keyup', function() {
        var searchText = $(this).val().toLowerCase();

        var visibleEvents = $('.card.event-list').filter(function() {
            var text = $(this).text().toLowerCase();
            var isVisible = text.includes(searchText);
            $(this).toggle(isVisible);
            return isVisible;  // Return true if the event is visible
        }).length; // Count the number of visible events

        // Show or hide the no results message
        if (visibleEvents === 0) {
            $('#no-results-message').show();
        } else {
            $('#no-results-message').hide();
        }
    });

    $('.book-event').click(function() {
        uni_modal("Submit Booking Request", "booking.php?event_id=" + $(this).attr('data-id'));
    });

    $('.event-list .carousel img').click(function() {
        viewer_modal($(this).attr('src'));
    });
});
</script>
