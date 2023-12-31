<?php $SessionId = $_SESSION['login_UId'];  ?>

<aside class="main-sidebar sidebar-dark-primary elevation-8">
    <div class="dropdown">
        <a href="javascript:void(0)" class="brand-link dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                <span class="brand-image img-circle elevation-3 d-flex justify-content-center align-items-center bg-primary text-white font-weight-500" style="width: 45px;height:60px"><?php echo $_SESSION['login_UId'] ?></span>
             
            <span class="brand-text font-weight-light"><?php
                                                        $wat =  $_SESSION['login_UId'];

                                                        $tenant = $conn->query("SELECT lastname FROM tenants where house_id = '$wat' ");
                                                        while ($row = $tenant->fetch_assoc()) :
                                                            echo $row['lastname'];
                                                        endwhile;
                                                        ?></span>

        </a>
        <div class="dropdown-menu">
            <a class="dropdown-item manage_account" href="javascript:void(0)" data-id="<?php echo $_SESSION['login_UId'] ?>">Set Profile Pics</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="ajax.php?action=logout">Logout</a>
        </div>
    </div>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item dropdown">
                    <a href="./" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="./index.php?page=utility_bills" class="nav-link nav-classes">
                        <i class="nav-icon fas fa-th-list"></i>
                        <p>
                            Utility Bill
                        </p>
                    </a>
                </li>
                <!--<li class="nav-item dropdown">
                    <a href="./index.php?page=payments" class="nav-link nav-subjects">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            My Payments
                        </p>
                    </a>
                </li>-->
                <li class="nav-item dropdown">
                    <a href="./index.php?page=List_of_Service_Agents" class="nav-link nav-subjects">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Service Agents
                        </p>
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a href="./index.php?page=mydetails" class="nav-link nav-subjects">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            My Details
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
<script>
    $(document).ready(function() {
        var page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
        if ($('.nav-link.nav-' + page).length > 0) {
            $('.nav-link.nav-' + page).addClass('active')
            console.log($('.nav-link.nav-' + page).hasClass('tree-item'))
            if ($('.nav-link.nav-' + page).hasClass('tree-item') == true) {
                $('.nav-link.nav-' + page).closest('.nav-treeview').siblings('a').addClass('active')
                $('.nav-link.nav-' + page).closest('.nav-treeview').parent().addClass('menu-open')
            }
            if ($('.nav-link.nav-' + page).hasClass('nav-is-tree') == true) {
                $('.nav-link.nav-' + page).parent().addClass('menu-open')
            }

        }
        $('.manage_account').click(function() {
            uni_modal('Set Your Profile Pictures Here', 'manage_user.php?id=' + $(this).attr('data-id'))
        })
    })
</script>