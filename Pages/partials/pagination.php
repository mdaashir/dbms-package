<!-- Pagination Controls -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <nav>
            <ul class="pagination justify-content-center">
                <!-- Previous Page Link -->
                <?php if ($menu->onFirstPage()): ?>
                    <li class="page-item disabled">
                        <span class="page-link">&laquo; Previous</span>
                    </li>
                <?php else: ?>
                    <li class="page-item">
                        <a class="page-link" href="/Pages/menu.php?page=<?php echo $menu->currentPage() - 1; ?>">&laquo; Previous</a>
                    </li>
                <?php endif; ?>

                <!-- Page Numbers -->
                <?php for ($page = 1; $page <= $menu->lastPage(); $page++): ?>
                    <li class="page-item <?php echo ($menu->currentPage() == $page) ? 'active' : ''; ?>">
                        <a class="page-link" href="/Pages/menu.php?page=<?php echo $page; ?>"><?php echo $page; ?></a>
                    </li>
                <?php endfor; ?>

                <!-- Next Page Link -->
                <?php if ($menu->hasMorePages()): ?>
                    <li class="page-item">
                        <a class="page-link" href="/Pages/menu.php?page=<?php echo $menu->currentPage() + 1; ?>">Next &raquo;</a>
                    </li>
                <?php else: ?>
                    <li class="page-item disabled">
                        <span class="page-link">Next</span>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </div>
</div>
