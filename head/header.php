<header class="p-3"style="background-color: #0a0a2a;">
    <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
            <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                <li><a href="../index.php" class="nav-link px-3 text-secondary" style="font-size: 24px;">Головна</a></li
                <li><a href="../Menu.php" class="nav-link px-2 text-white" style="font-size: 24px;">Меню</a></li>
                <li><a href="../category.php" class="nav-link px-2 text-white" style="font-size: 24px;">Категорії</a></li>
                <li><a href="../contact.php" class="nav-link px-2 text-white" style="font-size: 24px;">Контакти</a></li>
            </ul>

            <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search" method="GET" action="search.php">
                <div class="input-group">
                    <input type="search" class="form-control form-control-dark text-bg-dark" style="padding: 10px; max-width: 200px" placeholder="Пошук..." aria-label="Search" name="keyword">
                    <button type="submit" class="btn btn-primary" style="margin-left: 5px;">Знайти</button>
                </div>
            </form>

            <div class="text-end">
                <a href="admin/Login.php" class="btn btn-warning" style=" margin-left:150px ;width: 100px; height: 40px; font-size: 17px;font-family: bold;">Увійти</a>
                <a href="admin/logout.php" class="btn btn-warning" style="width: 170px; height: 40px; font-size: 17px; font-family: bold;">Зареєструватись</a>
            </div>
        </div>
    </div>
</header>