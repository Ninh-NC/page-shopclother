<?php include "./views/header.php" ?>

<!-- Carousel Start -->
<?php include "./views/carousel.php"  ?>
<!-- Carousel End -->

<!-- Featured Start -->
<?php include "./views/featured.php" ?>
<!-- Featured End -->

<!-- Categories Start -->
<?php include "./views/categories.php" ?>
<!-- Categories End -->

<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">Featured Products</span>
    </h2>
    <?php include "./views/product.php"  ?>
</div>
<!-- Products End -->

<!-- Offer Start -->
<?php include "./views/offer.php"  ?>
<!-- Offer End -->

<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4">
        <span class="bg-secondary pr-3">RECENT PRODUCTS</span>
    </h2>
    <?php include "./views/product.php"  ?>
</div>
<!-- Products End -->

<!-- Vendor Start -->
<?php include "./views/vendor.php" ?>
<!-- Vendor End -->

<!-- Footer Start -->
<?php include "./views/footer.php"  ?>
<!-- Footer End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>

<?php include "./views/scprit.php" ?>
</body>

</html>