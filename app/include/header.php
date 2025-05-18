<header class="header">
            <div class="header__container _container">
               <img src="/red-atom-games/assets/image/RedAtomGamesLogo.png" alt="Oh, this problem" class="header__logo">
               <nav class="header__menu menu">
                    <ul class="menu__list">
                        <li class="menu__item">
                            <a href="<?php echo BASE_URL?>" class="menu__link">Главная</a>
                        </li>
                        <li class="menu__item">
                            <a href="<?php echo BASE_URL . 'abbout-us.php'?>" class="menu__link">О нас</a>
                        </li>
                        <li class="menu__item">
                            <a href="<?php echo BASE_URL . 'news-list.php'?>" class="menu__link">Новости</a>
                        </li>
                        <li class="menu__item">
                            <a href="<?php echo BASE_URL . 'contacts.php'?>" class="menu__link">Контакты</a>
                        </li>


                        <?php
                             //Если сессия
                            if(isset($_SESSION['id'])):
                        ?>

                        <li class="menu__item">
                            <a href="<?php echo BASE_URL . 'auth.php'?>" class="menu__link"><?php echo $_SESSION['login'];?></a>
                            
                            <ul>
                                <?php 
                                if($_SESSION['admin']):
                                ?>
                                <li class="menu__item__subitem">
                                    <a href="<?= BASE_URL . 'admin/posts/index.php'?>" class="item__link">Панель</a>
                                </li>
                                <?php
                                    endif; 
                                ?>
                                 <li class="menu__item__subitem">
                                  <a href="<?php echo BASE_URL . "account.php"; ?>" class="item__link">Аккаунт</a>
                                </li>
                                <li class="menu__item__subitem">
                                  <a href="<?php echo BASE_URL . "logout.php"; ?>" class="item__link">Выход</a>
                                </li>
                            </ul>

                        </li>
                        <?php
                        //Если нет сессии
                            else:; 
                        ?>   
                        <li class="menu__item">
                            <a href="<?php echo BASE_URL . 'auth.php'?>" class="menu__link">Аккаунт</a>
                        </li>         
                        <?php
                            endif; 
                        ?>




                    </ul>
               </nav>
            </div> 
</header>