<?php include '../view/header.php'; ?>
<main>
    <aside>
        <h1>Categories</h1>
        <nav>
        <ul>
            <!-- display links for all categories -->
            <?php foreach($home_type as $hometype) : ?>
            <li>
                <a href="?category_id=<?php echo $hometype['TYPE_ID']; ?>">
                    <?php echo $hometype['TYPE_NAME']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </aside>
    <section>
        <h1><?php echo $type_name; ?></h1>
        <nav>
        <ul>
            <!-- display links for products in selected category -->
            <?php foreach ($home_list as $homelist) : ?>
            <li>
                <a href="?action=view_product&amp;product_id=<?php 
                          echo $homelist['productID']; ?>">
                    <?php echo $homelist['productName']; ?>
                </a>
            </li>
            <?php endforeach; ?>
        </ul>
        </nav>
    </section>
</main>
<?php include '../view/footer.php'; ?>