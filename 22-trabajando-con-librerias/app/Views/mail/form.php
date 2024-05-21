<?php echo $this->extend("layouts/web"); ?>
<?php echo $this->section("content"); ?>
    <div class="container">
        <div class="row">
            <div class="col-3"></div>
            <div class="col-6">
                <h1><?php echo $title; ?></h1>
                <form action="<?php echo route_to("send_email"); ?>" method="POST">
                    <div class="mb-3">
                        <label for="email-content" class="form-label">Dejanos tu mensaje</label>
                        <textarea name="email-content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <input class="btn btn-primary" type="submit" value="Send Email">
                </form>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
    
<?php echo $this->endSection(); ?>