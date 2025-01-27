<?php

use Models\SampleMenu;
use Illuminate\Pagination\Paginator;

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

$itemsPerPage = 12;

// Start the query with filter for search term
$query = SampleMenu::where('food_items', 'LIKE', "%$searchTerm%");

// Paginate the results
$menu = $query->paginate($itemsPerPage, ['*'], 'page', $page);

?>

<form action="" method="get">
    <div class="row justify-content-center aria-label="Search"">
        <div class="col-md-6 ">
            <div class="input-group mb-3">
                    <input type="text" name="search" value="<?php echo htmlspecialchars($searchTerm); ?>" class="form-control" placeholder="Search for a dish..." >
                    <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </div>
    </div>
</form>
