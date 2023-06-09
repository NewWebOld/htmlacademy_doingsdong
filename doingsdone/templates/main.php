<?php
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
?>
<section class="content__side">
                <h2 class="content__side-heading">Проекты</h2>

                <nav class="main-navigation">
                    <ul class="main-navigation__list">
                    <?php foreach($categories as $category): ?>
                            <li class="main-navigation__list-item <?php if ($category['id'] == $project): ?> main-navigation__list-item--active <?php endif ?>?>">
                                <a class="main-navigation__list-item-link" href="../index.php?id=<?= $category['id']?>">
                                    <?= htmlspecialchars($category['name_category'])?>
                                </a>
                            <span class="main-navigation__list-item-count"><?= task_count($task,$category); ?></span>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>

                <a class="button button--transparent button--plus content__side-button"
                   href="pages/form-project.html" target="project_add">Добавить проект</a>
            </section>

            <main class="content__main">
                <h2 class="content__main-heading">Список задач</h2>

                <form class="search-form" action="index.php" method="post" autocomplete="off">
                    <input class="search-form__input" type="text" name="" value="" placeholder="Поиск по задачам">

                    <input class="search-form__submit" type="submit" name="" value="Искать">
                </form>

                <div class="tasks-controls">
                    <nav class="tasks-switch">
                        <a href="/" class="tasks-switch__item tasks-switch__item--active">Все задачи</a>
                        <a href="/" class="tasks-switch__item">Повестка дня</a>
                        <a href="/" class="tasks-switch__item">Завтра</a>
                        <a href="/" class="tasks-switch__item">Просроченные</a>
                    </nav>

                    <label class="checkbox">
                        <!--добавить сюда атрибут "checked", если переменная $show_complete_tasks равна единице-->
                        <input class="checkbox__input visually-hidden show_completed" type="checkbox" <?php if($show_complete_tasks):?>checked<?php endif; ?>>
                        <span class="checkbox__text">Показывать выполненные</span>
                    </label>
                </div>

                <table class="tasks">
                    <?php foreach($task as $key => $item): ?>
                    <tr class="tasks__item task <?php if($item['status'] == true and $show_complete_tasks == 0):continue;?>task--completed<?php endif;?>
                    <?php if (get_hours_left($item['date_completion']) <= 24):?>task--important<?php endif?>">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden task__checkbox" type="checkbox" value="1">
                                <span class="checkbox__text"><?= $item['name_task'] ?></span>
                            </label>
                        </td>

                        <td class="task__file">
                            <a class="download-link" href="#">Home.psd</a>
                        </td>
                        
                        <td class="task__date"><?=$item['date_completion'];?></td>
                                     
                    </tr>
                    <?php endforeach; ?>

                    <?php if($show_complete_tasks):?>
                    <tr class="tasks__item task task--completed">
                        <td class="task__select">
                            <label class="checkbox task__checkbox">
                                <input class="checkbox__input visually-hidden" type="checkbox" checked>
                                <span class="checkbox__text">Записаться на интенсив "Базовый PHP"</span>
                            </label>
                        </td>
                        <td class="task__date">10.10.2019</td>

                        <td class="task__controls">
                        </td>
                    </tr>
                    <?php endif; ?>
                    
                    
                </table>
            </main>
        </div>
    </div>