<div class="row topbar mx-12">
    topbar
</div>

<div> 
    <nav class="navbar navbar-expand-lg bg-body-tertiary"> <!-- navbar first -->
        <div class="container-fluid">
            <div class="d-flex w-100 align-items-center justify-content-between">
                <!--brand place (logo)-->
                <a class="navbar-brand" href="?page=home"><embed src="./images/brand-logo.svg" class="brand-logo"></a>

                <!-- search bar -->
                <form class="d-flex form-style" role="search" action="?page=search" method="post"> 
                    <input class="form-control serh me-1" type="search" name="search" placeholder="Search" aria-label="Search"/>
                    <button class="btn p-0 search-btn" type="submit"><embed src="./images/search-icon.svg" class="search-icon"></button>
                </form>

                <!-- buttons -->
                <table class="table mb-0 primary-button-zone" style="width: auto;">
                    <tbody>
                        <tr>
                            <th><a class="spec" href="?page=test"><embed src=" ./images/something-button.svg" class="primary-button"></a></th>
                            <th><a class="spec" href="#"><embed src=" ./images/question-button.svg" class="primary-button"></a></th>
                            <th><a class="spec" href="#"><embed src="./images/cart-button.svg" class="primary-button"></a></th>
                            <th><a class="spec" href="#"><embed src="./images/account-button.svg" class="primary-button"></a></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </nav>


    <nav class="navbar py-0">
        
        
        <div class="collapse navbar-collapse" id="categoriesCollapse"> <!-- fazer collapse navbar horizontal -->
                <ul class="navbar-nav flex-row w-100 justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">textext</a> <!-- nav-link active --- pagina atual-->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">textext</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">textext</a>
                    </li>
                    <!--...-->
                </ul>
        </div>

        <div class="container-fluid navdiv">
            <button class="navbar-toggler navbutton collapsed mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#categoriesCollapse">
                <span><embed src="./images/nav-arrow.svg" class="nav-arrow"/></span>
            </button>
        </div>
    </nav>
</div>
</div>