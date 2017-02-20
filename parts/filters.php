<?php
global $category;

$filters = isset($filters) ? [
    [
        'name' => 'Top Sellers',
        'icon' => 'fa bwg-i-top-sellers'
    ], [
        'name' => 'Plus Top Sellers',
        'icon' => 'fa bwg-i-top-sellers-plus'
    ], [
        'name' => 'Group Top',
        'icon' => 'fa bwg-i-group-top'
    ], [
        'name' => 'My Top Sellers',
        'icon' => 'fa bwg-i-my-top-sellers'
    ], [
        'name' => 'My products',
        'icon' => 'fa bwg-i-my-products',
    ], [
        'name' => 'Category Man.',
        'icon' => 'fa bwg-i-category-man'
    ], [
        'name' => 'Trade show',
        'icon' => 'fa bwg-i-trade-show'
    ], [
        'name' => 'Back in stock',
        'icon' => 'fa bwg-i-back-in-stock'
    ], [
        'name' => 'Clearance',
        'icon' => 'fa bwg-i-clearance'
    ], [
        'name' => 'Own Brand',
        'icon' => 'fa bwg-i-own-brand'
    ], [
        'name' => 'Promotions',
        'icon' => 'fa fa-tag'
    ], [
        'name' => 'Handbill',
        'icon' => 'fa fa-file'
    ], [
        'name' => 'Top FoodM/Conv.',
        'icon' => 'fa bwg-i-top-food-m'
    ], [
        'name' => 'New Product',
        'icon' => "fa bwg-i-new-product"
    ], [
        'name' => 'New Listing',
        'icon' => 'fa bwg-i-new-listing'
    ], [
        'name' => 'Core',
        'icon' => 'fa fa-dot-circle-o'
    ], [
        'name' => 'Cycle',
        'icon' => 'fa bwg-i-cycle'
    ], [
        'name' => 'Multi-buy',
        'icon' => 'fa bwg-i-multi-buy'
    ], [
        'name' => 'Recommended',
        'icon' => 'fa fa-thumbs-up'
    ], [
        'name' => 'All Products',
        'icon' => 'fa bwg-i-all-products'
    ], [
        'name' => 'All Promotions',
        'icon' => 'fa fa-tags'
    ], [
        'name' => 'Small Case',
        'icon' => 'fa bwg-i-small-case'
    ], [
        'name' => 'Mixed Case',
        'icon' => 'fa bwg-i-mixed-case'
    ], [
        'name' => "Mix and Match",
        'icon' => 'fa bwg-i-mix-and-match'
    ], [
        'name' => 'Value Line',
        'icon' => 'fa fa-eur'
    ], [
        'name' => 'Monday Madness',
        'icon' => 'fa bwg-i-monday-madness'
    ]
] : false;
?>
<div class="submenu <?= $category; ?>">
    <div class="container">
        <nav class="navbar">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#navbar-secondary" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <span class="navbar-brand"><?= $category; ?></span>
                </div>
                <div id="navbar-secondary" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#" class="btn btn-default btn-sm">Promotions</a></li>
                        <li><a href="/favorites?category=<?= $category; ?>" class="btn btn-default btn-sm active">Favorites</a>
                        </li>
                        <li><a href="/planogram?category=<?= $category; ?>" class="btn btn-default btn-sm">Planogram</a>
                        </li>
                    </ul>
                    <?php if ($filters) { ?>
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <div class="dropdown filtersDd">
                                    <a href="#" id="dropdownFilters" data-toggle="dropdown" aria-haspopup="true"
                                       aria-expanded="false">
                                        <span class="sr-only">Filters</span><i class="fa fa-chevron-down fa-2x"></i>
                                    </a>
                                    <div class="megaMenu dropdown-menu" aria-labelledby="dropdownFilters">
                                        <div class="container">
                                            <div class="filter-controls">
                                                <div class="btn-group clear separate">
                                                    <a href="#filters-all"
                                                       class="btn btn-sm btn-secondary btn-outline btn-default">Select
                                                        all</a>
                                                    <a href="#filters-none"
                                                       class="btn btn-sm btn-secondary btn-outline btn-default">Select
                                                        none</a>
                                                    <a href="#filters-inverse"
                                                       class="btn btn-sm btn-secondary btn-outline btn-default">Invert
                                                        selection</a>
                                                </div>
                                                <a href="#" class="btn btn-sm btn-default">Apply filters</a>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-9">
                                                    <div class="filtersList">
                                                        <?php
    // i just divided the filters list based on index. implement proper app logic
                                                        $i = 0;
                                                        foreach ($filters as $f) {
                                                            if ($i < 5) {
                                                                $i++;
                                                                continue;
                                                            }
                                                            $slug = makeSlug($f['name']);
                                                            ?>
                                                            <span
                                                            ><input type="checkbox" id="filters[<?= $slug; ?>]"
                                                           name="filters[<?= $slug; ?>]"
                                                    /><span class="fake"></span
                                                        ><label for="filters[<?= $slug; ?>]"
                                                            ><i class="<?= $f['icon']; ?>"></i><?= $f['name']; ?>
                                                            </label></span><?php } ?>
                                                    </div>
                                                </div>
                                                <div class="col-sm-3">
                                                    <div class="filtersList">
                                                        <?php
                                                        $i = 0;
                                                        foreach ($filters as $f) {
                                                            if ($i >= 5) {
                                                                $i++;
                                                                continue;
                                                            }
                                                            $i++;
                                                            $slug = makeSlug($f['name']);
                                                            ?>
                                                            <span
                                                            ><input type="checkbox" id="filters[<?= $slug; ?>]"
                                                                    name="filters[<?= $slug; ?>]"
                                                            /><span class="fake"></span
                                                            ><label for="filters[<?= $slug; ?>]"
                                                            ><i class="<?= $f['icon']; ?>"></i><?= $f['name']; ?>
                                                            </label></span><?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="dropdown iconsDd">
                                    <button class="btn btn-default dropdown-toggle btn-sm" type="button"
                                            id="dropdownIcons" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="true">
                                        <i class="fa fa-info-circle"></i>
                                        Icons guide
                                        <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownIcons">
                                        <?php
                                        foreach ($filters as $f) { ?>
                                            <li><i class="<?= $f['icon']; ?>"></i><?= $f["name"]; ?></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </li>
                        </ul>
                    <?php } ?>
                </div><!--/.nav-collapse -->
            </div><!--/.container-fluid -->
        </nav>
    </div>
</div>