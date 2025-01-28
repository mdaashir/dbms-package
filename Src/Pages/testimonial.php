<?php require __DIR__ . '/partials/header.php'; ?>
<?php require __DIR__ . '/partials/navbar.php'; ?>
<?php
    require __DIR__ . '/../Config/Database.php';
    require __DIR__ . '/../Services/FeedbackService.php';

    use Services\FeedbackService;

    $feedback_query = FeedbackService::getAllFeedbacks();
?>
        <!-- Testimonial Start -->
        <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="container">
                <div class="text-center">
                    <h5 class="section-title ff-secondary text-center text-primary fw-normal">Testimonials</h5>
                    <h1 class="mb-5">What Our Clients Say!!!</h1>
                </div>
                <div class="owl-carousel testimonial-carousel">
                <?php foreach ($feedback_query as $row) { ?>
                    <div class="testimonial-item bg-transparent border rounded p-4">
                        <i class="fa fa-quote-left fa-2x text-primary mb-3"></i>
                        <p><?php echo $row['messages']; ?></p>
                        <div class="d-flex align-items-center">
                            <img class="img-fluid flex-shrink-0 rounded-circle" src=".<?php echo $row['picture']; ?>" alt="" style="width: 50px; height: 50px;">
                            <div class="ps-3">
                                <h5 class="mb-1"><?php echo $row['user_name']; ?></h5>
                                <small><?php echo $row['profession']; ?></small>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
        <!-- Testimonial End -->
<?php require __DIR__ . '/partials/footer.php'; ?>
