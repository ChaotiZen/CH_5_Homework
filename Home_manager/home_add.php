<?php include '../view/header.php'; ?>
    <main>
        <h1>Add Home</h1>
        <form action="index.php" method="post" id="add_home_form">
            <input type="hidden" name="action" value="add_home">

            <label>Home Type:</label>
            <select name="type_id">
                <?php foreach ( $home_type as $hometype) : ?>
                    <option value="<?php echo $hometype['TYPE_ID']; ?>">
                        <?php echo $hometype['TYPE_NAME']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br>

            <label>Home Id:</label>
            <input type="text" name="list_id" />
            <br>

            <label>Street Address:</label>
            <input type="text" name="list_street" />
            <br>

            <label>City:</label>
            <input type="text" name="list_city" />
            <br>

            <label>State:</label>
            <input type="text" name="list_state" />
            <br>

            <label>Zip:</label>
            <input type="text" name="list_zip" />
            <br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Home" />
            <br>
        </form>
        <p class="last_paragraph">
            <a href="index.php?action=list_homes">View Home List</a>
        </p>

    </main>
<?php include '../view/footer.php'; ?>