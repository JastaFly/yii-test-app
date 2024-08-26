<h1>Список пользователей:</h1>
    <main>
        <table>
            <tr>
                <th>Имя</th><th>Почта</th><th>Дата регистрации</th>
            </tr>
            <?php foreach ($employers as $employee) { ?>
            <tr>
                <td><?= $employee->name ?></td>
                <td><?= $employee->email ?></td>
                <td><?= Yii::$app->formatter->asDate($employee->attestation_date, ) ?></td>
            </tr>
            <?php } ?>
        </table>
    </main>