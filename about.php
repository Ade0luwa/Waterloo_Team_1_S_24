<style type="text/css">
    header.masthead,header.masthead:before {
        min-height: 30vh !important;
        height: 30vh !important
    }
</style> <!-- Masthead-->
        <header class="masthead">
            <h2 class="titlebarh text-center text-white">About Us</h2>
        </header>

    <section class="p-5 mt-1">
        <div class="container">
             <?php echo html_entity_decode($_SESSION['system']['about_content']) ?>        
        </div>
                 <!-- our team section -->
       
    </section>