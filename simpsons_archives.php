<!DOCTYPE html>
<html lang="en">
<!-- 
    DGL123
    Final Project
    Amelia Manky
    12/08/21
-->
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
    <title>Simpsons Archives | Final Project</title>
</head>
<body>
    <header id="masthead" class="site-header layout-container">
        <a href="simpsons_archives.php">
            <img src="images/logo.svg" alt="Logo" class="site-header__logo">
        </a>
    </header>

    <!-- Form -->
    <div id="content"class="site-content">
        <div id="primary" class="content-area">
            <div id="main" class="site-main">
                <div class="form__container layout-container">
                    <div class="form__row layout-row">
                        <div class="form__itemsContainer">
                            <div class="form_imageContainer">
                                <img src="images/simpsons.jpg" alt="Simpsons" class="form__image">
                            </div>
                            <div class="form__card">
                                <h3 class="form__heading">
                                    Want to learn more about the Simpsons?
                                </h3>
                                <p>Select the characters you'd like to read more about.</p>
                                <form action="" method="POST">
                                    <ul class="form__items">
                                        <?php generate_form() ?>
                                    </ul>
                                    <input class="form__button" type="submit" value="Show Characters">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="characters__container layout-container">
                    <div class="characters__row layout-row">
                        <ul class="characters__items">
                            <?php
                                $conn = mysqli_connect('localhost', 'root', '', 'simpsons_archives');

                                if(isset($_POST['characters'])) {
                                    $selected = $_POST['characters'];
                                    get_names($selected);
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>  

    <?php

    function generate_form() {
        $conn = mysqli_connect('localhost', 'root', '', 'simpsons_archives');
        $sql = 'SELECT * FROM characters';
        $results = $conn->query($sql);
        
        if ($results->num_rows > 1) {
            foreach ($results as $character) {
                while($row = $results->fetch_assoc()){
                    $firstname = $row['first_name'];
                    $fullname = $firstname . " " . $row['last_name'];

                    echo '<li class="form__item">
                        <label for = "' . $firstname . '">' . $fullname . '</label>
                        <input id="' . $firstname . '" type="checkbox" name="characters[]" value="' . $firstname . '"';
                        if (isset($_POST['characters'])) {
                            $characters = $_POST['characters'];
                            if(in_array($firstname, $characters)) {
                                echo ' checked="checked"';
                            }
                        }
                    '>';

                    echo '<br>';
                }
            }
        }
    }

    function get_data($name) {
        global $conn;
        if(! $conn) {
            echo 'could not connect';
        }

        $sql = "SELECT * FROM characters WHERE first_name = '$name'";
        $results = $conn->query($sql); ?>

        <?php if ($results->num_rows > 0) : ?>
            <?php while($row = $results->fetch_assoc()) : ?>
                <li class="characters__itemContainer">
                    <div class="characters__item">
                        <img src=" <?= $row["image_url"] ?> " alt="marge" class="characters__image">
                        <div class="characters__info">
                            <h3 class="characters__name">
                                <?= $row["first_name"]. " " . $row["last_name"] ?>
                            </h3>
                            <div class="characters__age characters__attribute">
                                <?= display_age($row) ?>
                            </div>
                            <div class="characters__occupation characters__attribute">
                                <?= display_occupation($row) ?>
                            </div>
                            <div class="characters__voicedBy characters__attribute">
                                <?= display_voice($row) ?>
                            </div>
                        </div>
                    </div>
                </li>
            <?php endwhile ?>
        <?php else : ?>
            <p>0 results<p>
        <?php endif ;
    }  

    function get_names($selected) {
        foreach ($selected as $character) {
            $name = $character;
            get_data($name);
        }
    }

    // Check to see if rows contain data //
    function display_age($row) {
        if (!empty($row["age"])) {
            echo '<b>Age: </b>' . $row["age"];
        }
    }

    function display_occupation($row) {
        if (!empty($row["occupation"])) {
            echo '<b>Occupation: </b>' . $row["occupation"];
        }
    }

    function display_voice($row) {
        if (!empty($row["voiced_by"])) {
            echo '<b>Voiced by: </b>' . $row["voiced_by"];
        }
    }

    ?>

</body>
</html>