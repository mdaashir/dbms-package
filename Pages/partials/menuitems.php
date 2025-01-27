<?php
function generateMenuItems($menu, $type):void {
    foreach ($menu as $item) {
        if ($item[$type]) {
                    echo   '<div class="col-lg-6">
                                <div class="d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid rounded" src=".'.$item['picture'].'" alt="" style="width: 80px;">
                                    <div class="w-100 d-flex flex-column text-start ps-4">
                                        <h5 class="d-flex justify-content-between border-bottom pb-2">
                                        <span>'.$item['food_items'].'</span>
                                            <span class="text-primary">$'.$item['price'].'</span>
                                        </h5>
                                        <small class="fst-italic">'.$item['description'].'</small>
                                        <form action="add_to_cart.php" method="POST" class="d-flex mt-3">
                                            <input type="hidden" name="food_item_id" value="'.$item['id'].'">
                                            <label>
                                                <input type="number" name="quantity" value="0" min="0" class="form-control me-2" style="width: 50px;">
                                            </label>
                                            <button type="submit" class="btn btn-primary">add to cart</button>
                                        </form>
                                    </div>
                                </div>
                            </div>';
        }
    }
}
?>

<div class="tab-content">
    <!-- TAB 1 -->
    <div id="tab-1" class="tab-pane fade show p-0 active">
        <div class="row g-4">
            <!-- ITEM BEGIN  -->
            <?php generateMenuItems($menu, 'is_breakfast'); ?>
            <!-- ITEM END -->
        </div>
    </div>
    <!-- TAB 1 END -->
    <!-- TAB 2 -->
    <div id="tab-2" class="tab-pane fade show p-0">
        <div class="row g-4">
            <!-- ITEM START -->
            <?php generateMenuItems($menu, 'is_lunch'); ?>
            <!-- ITEMS END  -->
        </div>
    </div>
    <!-- TAB 2 END -->
    <!-- TAB 3 -->
    <div id="tab-3" class="tab-pane fade show p-0">
        <div class="row g-4">
            <!-- ITEM START -->
            <?php generateMenuItems($menu, 'is_dinner'); ?>
            <!-- ITEMS END -->
        </div>
    </div>
    <!-- TAB 3 END -->
</div>

