<?php
include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="/styles/style.css">
    <title>Morpions</title>
</head>

<body>
    <main>
        <article>
            <h1>Morpions</h1>
            <section>
                <?php
                $end = -1;
                $double = "A vous de jouer !!";
                $grilles = [];
                for ($row = 0; $row <= 4; $row++) { //on remplit le tableau de la valeur -1 -> vide
                    for ($col = 0; $col <= 4; $col++) {
                        $grilles[$row][$col] = -1;
                    }
                }
                if (isset($_POST['grilles'])) {
                    $grilles = $_POST['grilles'];
                }
                $play = 1;
                if (isset($_POST['validate']) && isset($_POST['btn'])) {
                    if (isset($_POST['grilles'])) {
                        $grilles = $_POST['grilles'];
                        $play = $_POST['validate'];
                        $row = substr($_POST['btn'], 0, -1);
                        $col = substr($_POST['btn'], -1);
                        if ($grilles[$row][$col] == 1 || $grilles[$row][$col] == 2) {
                            $double = "Cette case est déja jouée";
                        } elseif ($play == 1) { //on remplit la case jouée  de la valeur 1 -> X(affichage)
                            $grilles[$row][$col] = 1;
                            $play = 2;
                        } elseif ($play == 2) {
                            $grilles[$row][$col] = 2; //on remplit la case jouée de la valeur 2 -> O(affichage)
                            $play = 1;
                        }
                        $cpt = 0;
                        $i =  0;
                        $j = 0;
                        while (($i <= 4) && ($end == -1)) { //on verifie si il n'y a aucun gagnant
                            $j = 0;
                            while (($j <= 4) && ($end == -1)) {
                                if ($grilles[$i][$j] == -1) {
                                    $cpt++;
                                } else {
                                    $end = testGame($i, $j, $grilles);
                                }
                                $j++;
                            }
                            $i++;
                        }
                        if ($end != -1) {
                            $play = $end;
                            $double = "Vous avez gagnez, Bravo!!";
                        }
                        if (($cpt === 0) && ($end === -1)) {
                            $end = 0;
                            $play = "s";
                            $double = "Match nul !! <br> Voulez-vous rejouer?";
                        }
                    }
                }
                if (isset($_POST['new-game'])) {
                    for ($row = 0; $row <= 4; $row++) {
                        for ($col = 0; $col <= 4; $col++) {
                            unset($grilles[$row][$col]);
                            $grilles[$row][$col] = -1;
                        }
                    }
                }
                ?>
                <form action="index.php" method="POST">
                    <div class="flex">
                        <div>
                            <table>
                                <?php for ($row = 0; $row <= 4; $row++) : ?>
                                    <tr>
                                        <?php for ($col = 0; $col <= 4; $col++) : ?>
                                            <input type="hidden" name="grilles[<?php echo $row; ?>][]" value="<?= $grilles[$row][$col]; ?>">
                                            <td><input type="radio" name="btn" value="<?php echo $row . $col; ?>">
                                                <?php if ($grilles[$row][$col] == -1) {
                                                    echo "";
                                                } elseif ($grilles[$row][$col] == 1) {
                                                    echo "X";
                                                } elseif ($grilles[$row][$col] == 2) {
                                                    echo "O";
                                                };
                                                ?></td>
                                        <?php endfor ?>
                                    </tr>
                                <?php endfor ?>
                            </table>
                        </div>
                        <div class="col-droite">
                        <div>
                                <button type="submit" id="new-game" name="new-game">New Game</button>
                            </div>
                            <h3><?php echo "Joueur" . $play . " <br> " . $double; ?></h3>
                            <div >
                                <?php if (($end == -1)) : ?>
                                    <button type="submit" id="validate" name="validate" value="<?php echo $play ?>">Valider</button>
                                <?php endif ?>
                                
                            </div>
                        </div>
                    </div>
                </form>
            </section>
        </article>
    </main>
</body>

</html>