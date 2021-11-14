<?php
/**
 * @var \app\dto\ListItemsDTO $items_dto
 */
?>
<div class="container">
    <h2 class="page-title">
        Categories list
    </h2>
    <div>
        <a href="/categories/add" class="btn btn-success">
            Create new category
        </a>
    </div>
    <div class="items">
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Level</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items_dto->getModels() as $model) { ?>
                    <tr>
                        <td><?=$model->id ?></td>
                        <td><?=$model->name ?></td>
                        <td><?=$model->level ?></td>
                        <td>
                            <a class="btn btn-warning"
                                href="/categories/edit/<?=$model->id ?>">
                                Edit
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-danger"
                               href="/categories/delete/<?=$model->id ?>">
                                Delete
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div class="pagination">

    </div>
</div>