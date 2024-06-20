<header>
    <nav>
        <section>
            <a href="index.php">ERA.</a>
        </section>
        <ul>
            <li>
                <a href="index.php" class="<?php if($paginaNaam == "home") {echo "active";}?>">Dashboard</a>
            </li>
            <li>
                <a href="new-product.php" class="<?php if($paginaNaam == "new-product") {echo "active";}?>">Nieuw product</a>
            </li>
        </ul>
        <section>
            <?php
                // Pak de datum van vandaag en formateer deze naar jaar/maand/dag
                $dateFormatted = date("d-m-Y", strtotime(date("Y-m-d")));
                echo "<p class='white-text'>" . $dateFormatted ."</p>";
            ?>
        </section>
    </nav>
</header>