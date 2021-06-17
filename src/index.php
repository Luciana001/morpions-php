<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Morpions</title>
</head>

<body>
    <main>
        <article>
            <h1>Morpions</h1>
            <section>
                <?php

                $double=" ";
                $grilles = [];
                for ($i = 0; $i <= 24; $i++) {
                    $grilles[] = $i;
                }
                if (isset($_GET['grilles'])) {
                    $grilles = $_GET['grilles'];
                }
                $play = 1;
                if (isset($_GET['validate']) && isset($_GET['btn'])) {
                    if (isset($_GET['grilles'])) {
                        $grilles = $_GET['grilles'];
                        $play = $_GET['validate'];
                        $id = $_GET['btn'];
                        if ($grilles[$id] == "X" || $grilles[$id] == "O") {
                            $double = "Cette case est déja jouée";
                        } elseif ($play == 1) {
                            $grilles[$id] = "X";
                            $play = 2;
                        } elseif ($play == 2) {
                            $grilles[$id] = "O";
                            $play = 1;
                        }
                        if ($id >= 2){
                            if($grilles[$id] == $grilles[$id-1] && $grilles[$id] == $grilles[$id-2] || $grilles[$id] == $grilles[$id-5] && $grilles[$id] == $grilles[$id-10]  ){
                                $winner= "Félicitations Joueur ".$play." vous avez gagné !!";
                                echo '<h2>';
                                echo $winner;
                                echo '</h2>';
                            }
                        }
                        if($id <= 22 ){
                            if($grilles[$id] == $grilles[$id+1] && $grilles[$id] == $grilles[$id+2]){
                                $winner= "Félicitations Joueur ".$play." vous avez gagné !!";
                                echo '<h2>';
                                echo $winner;
                                echo '</h2>';
                            }
                        }
                }
            }
            
                
                if(isset($_GET['new-game'])){
                    for ($i = 0; $i <= 24; $i++) {
                        unset ($grilles[$i]);
                        $grilles[$i] = $i;
                    }
                }
                
            
           //var_dump($grilles);

                ?>
                <form action="index.php" method="GET">
                    <button type="submit" name="new-game">New Game</button>
                    <h3><?php echo "Joueur ".$play." ".$double; ?></h3>
                    <table>
                        <tr>
                            <?php for ($i = 0; $i <= 4; $i++) : ?>
                                <input type="hidden" name="grilles[]" value="<?= $grilles[$i] ?>">
                                <td><input type="radio" name="btn" value="<?php echo $i ?>"> <?php echo $grilles[$i]; ?></td>
                            <?php endfor ?>
                        </tr>
                        <tr>
                            <?php for ($i = 5; $i <= 9; $i++) : ?>
                                <input type="hidden" name="grilles[]" value="<?= $grilles[$i] ?>">
                                <td><input type="radio" name="btn" value="<?php echo $i ?>"> <?php echo $grilles[$i]; ?></td>
                            <?php endfor ?>
                        </tr>
                        <tr>
                            <?php for ($i = 10; $i <= 14; $i++) : ?>
                                <input type="hidden" name="grilles[]" value="<?= $grilles[$i] ?>">
                                <td><input type="radio" name="btn" value="<?php echo $i ?>"> <?php echo $grilles[$i]; ?></td>
                            <?php endfor ?>
                        </tr>
                        <tr>
                            <?php for ($i = 15; $i <= 19; $i++) : ?>
                                <input type="hidden" name="grilles[]" value="<?= $grilles[$i] ?>">
                                <td><input type="radio" name="btn" value="<?php echo $i ?>"> <?php echo $grilles[$i]; ?></td>
                            <?php endfor ?>
                        </tr>
                        <tr>
                            <?php for ($i = 20; $i <= 24; $i++) : ?>
                                <input type="hidden" name="grilles[]" value="<?= $grilles[$i] ?>">
                                <td><input type="radio" name="btn" value="<?php echo $i ?>"> <?php echo $grilles[$i]; ?></td>
                            <?php endfor ?>
                        </tr>
                    </table>
                    <button type="submit" name="validate" value="<?php echo $play ?>">Valider</button>
                </form>

            </section>
        </article>
    </main>
</body>

</html>