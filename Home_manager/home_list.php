<?php
include '../view/header.php';
?>

<main>
    <h1>Home List</h1>

    <aside>
        <!-- display a list of categories -->
        <h2>Home Types</h2>
        <nav>
            <ul>
                <?php foreach ($home_types as $hometype) : ?>
                    <li>
                        <a href="?type_id=<?php echo htmlspecialchars($hometype['TYPE_ID']); ?>">
                            <?php echo htmlspecialchars($hometype['TYPE_NAME']); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <section>
        <!-- display a table of products -->
        <!-- KEW - wrong variable name referenced here -->

        <h2><?php echo $type_name; ?></h2>
        <table>
            <tr>
            <!-- // KEW: you never changed this    
            //    <th>Code</th>
            //    <th>Name</th>
            //    <th class="right">Price</th>
            //    <th>&nbsp;</th> -->

                <th>ID</th>
                <th>Street</th>
                <th class="right">City</th>
                <th>&nbsp;</th>
            
            </tr>
            <?php foreach ($homes as $home) : ?>
                <tr>

            <!-- KEW: Column names are case sensitive. You had lower case but itis defined as upper case in table  -->    
                    <td><?php echo $home['LIST_ID']; ?></td>
                    <td><?php echo $home['LIST_STREET']; ?></td>
                    <td class="right"><?php echo $home['LIST_CITY']; ?></td>
                    <td>
                    <!-- // KEW: you never changed this     -->
                    <form action="." method="post">
                           <input type="hidden" name="action"
                                   value="delete_product">
                          <!-- //  <input type="hidden" name="product_id"
                            //       value="<?php echo $home['productID']; ?>">
                            //<input type="hidden" name="category_id"
                             //      value="<?php echo $home['categoryID']; ?>"> -->
                            <input type="submit" value="Delete">
                        </form></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <p class="last_paragraph">
            <a href="?action=show_add_form">Add Home</a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>
