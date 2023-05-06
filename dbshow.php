<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <title>Задание 6</title>
    <link rel="stylesheet" href="db.css">
</head>
<body>
<?php
    echo '<div class="msgbox">'; 
        if (!empty($messages)) {
            foreach ($messages as $message) {
                print($message);
            }
        }
    echo '</div>';
    // $stmt = $db->prepare("SELECT count(application_id) from abilities where superpower_id = 1;");
    // $stmt->execute();
    // $god = $stmt->fetchColumn();
    // $stmt = $db->prepare("SELECT count(application_id) from abilities where superpower_id = 2;");
    // $stmt->execute();
    // $steni = $stmt->fetchColumn();
    // $stmt = $db->prepare("SELECT count(application_id) from abilities where superpower_id = 3;");
    // $stmt->execute();
    // $levit = $stmt->fetchColumn();
    // echo "бессмертие: "; echo (empty($god) ? '0' : $god) . "</br>";
    // echo "прохождение сквозь стены: "; echo (empty($steni) ? '0' : $steni) . "</br>";
    // echo "левитация: "; echo (empty($levit) ? '0' : $levit) . "</br>";
?>
    <form action="" method="POST">
        <table>
            <caption>Данные формы</caption>
            <tr> 
                <th>id</th>
                <th>Имя</th>
                <th>email</th>
                <th>Год</th>
                <th>Пол</th>
                <th>Кол-во конечностей</th>
                <th>Суперсила</th>
                <th>Биография</th>
            </tr>
            <?php
                foreach ($values as $value) {
                    echo    '<tr>
                            <td style="font-weight: 700;">'; print($value['p_id']); echo '</td>
                            <td>
                                <input class="input" name="name'.$value['p_id'].'" value="'; print($value['name']); echo '">
                            </td>
                            <td>
                                <input class="input" name="email'.$value['p_id'].'" value="'; print($value['email']); echo '">
                            </td>
                            <td>
                                <select name="year'.$value['p_id'].'">';
                                    for ($i = 2023; $i >= 1922; $i--) {
                                        if ($i == $value['year']) {
                                            printf('<option selected value="%d">%d год</option>', $i, $i);
                                        } else {
                                            printf('<option value="%d">%d год</option>', $i, $i);
                                        }
                                    }
                    echo        '</select>
                            </td>
                            <td> 
                                <div class="column-item">
                                    <input type="radio" id="radioMale'.$value['p_id'].'" name="gender'.$value['p_id'].'" value="m" '; if ($value['gender'] == 'm') echo 'checked'; echo '>
                                    <label for="radioMale'.$value['p_id'].'">Мужчина</label>
                                </div>
                                <div class="column-item">
                                    <input type="radio" id="radioFemale'.$value['p_id'].'" name="gender'.$value['p_id'].'" value="w" '; if ($value['gender'] == 'w') echo 'checked'; echo '>
                                    <label for="radioFemale'.$value['p_id'].'">Женщина</label>
                                </div>
                            </td>
                            <td>
                                <div class="column-item">
                                    <input type="radio" id="radio2'.$value['p_id'].'" name="limbs'.$value['p_id'].'" value="2" '; if ($value['limbs'] == 2) echo 'checked'; echo '>
                                    <label for="radio2'.$value['p_id'].'">2</label>
                                </div>
                                <div class="column-item">
                                    <input type="radio" id="radio3'.$value['p_id'].'" name="limbs'.$value['p_id'].'" value="3" '; if ($value['limbs'] == 3) echo 'checked'; echo '>
                                    <label for="radio3'.$value['p_id'].'">3</label>
                                </div>
                                <div class="column-item">
                                    <input type="radio" id="radio4'.$value['p_id'].'" name="limbs'.$value['p_id'].'" value="4" '; if ($value['limbs'] == 4) echo 'checked'; echo '>
                                    <label for="radio4'.$value['p_id'].'">4</label>
                                </div>
                            </td>';
                    $stmt = $db->prepare("SELECT sup_id FROM person_superpower WHERE p_id = ?");
                    $stmt->execute([$value['p_id']]);
                    $abilities = $stmt->fetchAll(PDO::FETCH_COLUMN);
                    echo    '<td class="abilities">
                                <div class="column-item">
                                    <input type="checkbox" id="god'.$value['p_id'].'" name="abilities'.$value['p_id'].'[]" value="1"' . (in_array(1, $abilities) ? ' checked' : '') . '>
                                    <label for="god'.$value['p_id'].'">бессмертие</label>
                                </div>
                                <div class="column-item">
                                    <input type="checkbox" id="noclip'.$value['p_id'].'" name="abilities'.$value['p_id'].'[]" value="2"' . (in_array(2, $abilities) ? ' checked' : '') . '>
                                    <label for="noclip'.$value['p_id'].'">прохождение сквозь стены</label>
                                </div>
                                <div class="column-item">
                                    <input type="checkbox" id="levitation'.$value['p_id'].'" name="abilities'.$value['p_id'].'[]" value="3"' . (in_array(3, $abilities) ? ' checked' : '') . '>
                                    <label for="levitation'.$value['p_id'].'">левитация</label>
                                </div>
                            </td>
                            <td>
                                <textarea name="bio'.$value['p_id'].'" id="" cols="30" rows="4" maxlength="128">'; print $value['bio']; echo '</textarea>
                            </td>
                            <td>
                                <div class="column-item">
                                    <input name="save'.$value['p_id'].'" type="submit" value="save'.$value['p_id'].'"/>
                                </div>
                                <div class="column-item">
                                    <input name="clear'.$value['p_id'].'" type="submit" value="clear'.$value['p_id'].'"/>
                                </div>
                            </td>
                        </tr>'; 
                }
            ?>
        </table>
    </form>
</body>
</html>
