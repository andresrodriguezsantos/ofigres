<?php
/**
 * Created by PhpStorm.
 * User: jhon j
 * Date: 17/03/2015
 * Time: 8:31 PM
 */
/**
 * @var $model \app\models\ContactForm
 */
?>
<table style="width: 100%">
    <tr>
        <th>Asunto</th>
        <td><?= $model->subject ?></td>
    </tr>
    <tr>
        <th>De:</th>
        <td><?= $model->name ?></td>
    </tr>
    <tr>
        <th>email:</th>
        <td><?= $model->email ?></td>
    </tr>
    <tr>
        <th>Mensaje</th>
        <td><?= $model->body ?></td>
    </tr>
</table>
