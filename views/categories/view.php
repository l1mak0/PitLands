<?php
/**
 * @var $category
 */
?>


<table>
    <thead>
        <tr>
            <th>Название</th>
            <th>Описание</th>
            <th>Изображение</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $category->title ?></td>
            <td><?= $category->description ?></td>
            <td><img src="/img/category/<?= $category->id ?>.jpg" alt="" style="max-width: 150px;"></td>
        </tr>
    </tbody>
</table>
<a href="/categories/edit?id=<?= $category->id ?>" class="btn" style="margin-top: .3rem">Редактировать</a>
<a href="/categories/delete?id=<?= $category->id ?>" class="btn" style="margin-top: .3rem">Удалить</a>
<style>
    table {
        width: 100%;
        & th,
        & td {
            border: 1px solid;
            text-align: center;
            font-size: 1.2rem;
        }
    }
</style
