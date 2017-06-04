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
                <?php foreach ($home_type as $hometype) : ?>
                    <li>
                        <a href="?type_id=<?php echo $hometype['TYPE_ID']; ?>">
                            <?php echo $hometype['TYPE_NAME']; ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <section>
        <!-- display a table of products -->
        <h2><?php echo $hometype; ?></h2>
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th class="right">Price</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($homes as $home) : ?>
                <tr>
                    <td><?php echo $home['list_id']; ?></td>
                    <td><?php echo $home['list_street']; ?></td>
                    <td class="right"><?php echo $home['list_city']; ?></td>
                    <td><form action="." method="post">
                            <input type="hidden" name="action"
                                   value="delete_product">
                            <input type="hidden" name="product_id"
                                   value="<?php echo $home['productID']; ?>">
                            <input type="hidden" name="category_id"
                                   value="<?php echo $home['categoryID']; ?>">
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
