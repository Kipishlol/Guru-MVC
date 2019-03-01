<?php 


namespace App\View;

class Main extends Base
{
    public function content($data = [])
    {
        ?>
            <div id="page-container" class="sidebar-l sidebar-o side-scroll header-navbar-fixed">
                <!-- Sidebar -->
                <nav id="sidebar">
                    <!-- Sidebar Scroll Container -->
                    <div id="sidebar-scroll">
                        <!-- Sidebar Content -->
                        <!-- Adding .sidebar-mini-hide to an element will hide it when the sidebar is in mini mode -->
                        <div class="sidebar-content">
                            <!-- Side Header -->
                            <div class="side-header side-content bg-white-op">
                                <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                                <button class="btn btn-link text-gray pull-right hidden-md hidden-lg" type="button" data-toggle="layout" data-action="sidebar_close">
                                    <i class="fa fa-times"></i>
                                </button>
                                <a class="h5 text-white" href="index.html">
                                    <i class="fa fa-circle-o-notch text-primary"></i> <span class="h4 font-w600 sidebar-mini-hide">ne</span>
                                </a>
                            </div>
                            <!-- END Side Header -->

                            <!-- Side Content -->
                            <div class="side-content side-content-full">
                                <ul class="nav-main">
                                    <li>
                                        <a href="/users"><i class="si si-users"></i><span class="sidebar-mini-hide">Пользователи</span></a>
                                    </li>
                                    <li>
                                        <a href="/incomes"><i class="si si-wallet"></i><span class="sidebar-mini-hide">Доходы</span></a>
                                    </li>
                  
                                </ul>
                            </div>
                            <!-- END Side Content -->
                        </div>
                        <!-- Sidebar Content -->
                    </div>
                    <!-- END Sidebar Scroll Container -->
                </nav>
                <!-- END Sidebar -->

                <!-- Header -->
                <header id="header-navbar" class="content-mini content-mini-full">
                    <!-- Header Navigation Right -->
                    <ul class="nav-header pull-right">
                        <li>
                            <div class="btn-group">
                                <button class="btn btn-default btn-image dropdown-toggle" data-toggle="dropdown" type="button">
                                    <img src="assets/img/avatars/avatar10.jpg" alt="Avatar">
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-header">Profile</li>
                                    <li>
                                        <a tabindex="-1" href="base_pages_inbox.html">
                                            <i class="si si-envelope-open pull-right"></i>
                                            <span class="badge badge-primary pull-right">3</span>Inbox
                                        </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="base_pages_profile.html">
                                            <i class="si si-user pull-right"></i>
                                            <span class="badge badge-success pull-right">1</span>Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="javascript:void(0)">
                                            <i class="si si-settings pull-right"></i>Settings
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li class="dropdown-header">Actions</li>
                                    <li>
                                        <a tabindex="-1" href="base_pages_lock.html">
                                            <i class="si si-lock pull-right"></i>Lock Account
                                        </a>
                                    </li>
                                    <li>
                                        <a tabindex="-1" href="base_pages_login.html">
                                            <i class="si si-logout pull-right"></i>Log out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-default" data-toggle="layout" data-action="side_overlay_toggle" type="button">
                                <i class="fa fa-tasks"></i>
                            </button>
                        </li>
                    </ul>
                    <!-- END Header Navigation Right -->

                    <!-- Header Navigation Left -->
                    <ul class="nav-header pull-left">
                        <li class="hidden-md hidden-lg">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_toggle" type="button">
                                <i class="fa fa-navicon"></i>
                            </button>
                        </li>
                        <li class="hidden-xs hidden-sm">
                            <!-- Layout API, functionality initialized in App() -> uiLayoutApi() -->
                            <button class="btn btn-default" data-toggle="layout" data-action="sidebar_mini_toggle" type="button">
                                <i class="fa fa-ellipsis-v"></i>
                            </button>
                        </li>
                        <li>
                            <!-- Opens the Apps modal found at the bottom of the page, before including JS code -->
                            <button class="btn btn-default pull-right" data-toggle="modal" data-target="#apps-modal" type="button">
                                <i class="si si-grid"></i>
                            </button>
                        </li>
                        <li class="visible-xs">
                            <!-- Toggle class helper (for .js-header-search below), functionality initialized in App() -> uiToggleClass() -->
                            <button class="btn btn-default" data-toggle="class-toggle" data-target=".js-header-search" data-class="header-search-xs-visible" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </li>
                        <li class="js-header-search header-search">
                            <form class="form-horizontal" action="base_pages_search.html" method="post">
                                <div class="form-material form-material-primary input-group remove-margin-t remove-margin-b">
                                    <input class="form-control" type="text" id="base-material-text" name="base-material-text" placeholder="Search..">
                                    <span class="input-group-addon"><i class="si si-magnifier"></i></span>
                                </div>
                            </form>
                        </li>
                    </ul>
                    <!-- END Header Navigation Left -->
                </header>
                <!-- END Header -->

                <!-- Main Container -->
                <main id="main-container">
                    <!-- Page Header -->
                    <div class="content bg-gray-lighter">
                        <div class="row items-push">
                            <div class="col-sm-7">
                                <h1 class="page-heading">
                                    <?php echo isset($data['page']) ? $data['page']['title'] : 'Guru Finanace'; ?> 
                                    <small><?php echo isset($data['page']) ? $data['page']['description'] : 'ваш личный финансист' ; ?> </small>
                                </h1>
                            </div>
                            <div class="col-sm-5 text-right hidden-xs">
                                <ol class="breadcrumb push-10-t">
                                    <li>Generic</li>
                                    <li><a class="link-effect" href="">Blank</a></li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- END Page Header -->

                    <!-- Page Content -->
                    <div class="content">
                       <?php $this->pageContent($data); ?>
                    </div>
                    <!-- END Page Content -->
                </main>
                <!-- END Main Container -->

                <!-- Footer -->
                <footer id="page-footer" class="content-mini content-mini-full font-s12 bg-gray-lighter clearfix">
                    <div class="pull-right">
                        Crafted with <i class="fa fa-heart text-city"></i> by <a class="font-w600" href="http://goo.gl/vNS3I" target="_blank">pixelcave</a>
                    </div>
                    <div class="pull-left">
                        <a class="font-w600" href="http://goo.gl/6LF10W" target="_blank">OneUI 3.4</a> &copy; <span class="js-year-copy">2015</span>
                    </div>
                </footer>
                <!-- END Footer -->
            </div>
            <!-- END Page Container -->

            <!-- Apps Modal -->
            <!-- Opens from the button in the header -->
            <div class="modal fade" id="apps-modal" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-sm modal-dialog modal-dialog-top">
                    <div class="modal-content">
                        <!-- Apps Block -->
                        <div class="block block-themed block-transparent">
                            <div class="block-header bg-primary-dark">
                                <ul class="block-options">
                                    <li>
                                        <button data-dismiss="modal" type="button"><i class="si si-close"></i></button>
                                    </li>
                                </ul>
                                <h3 class="block-title">Apps</h3>
                            </div>
                            <div class="block-content">
                                <div class="row text-center">
                                    <div class="col-xs-6">
                                        <a class="block block-rounded" href="base_pages_dashboard.html">
                                            <div class="block-content text-white bg-default">
                                                <i class="si si-speedometer fa-2x"></i>
                                                <div class="font-w600 push-15-t push-15">Backend</div>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="col-xs-6">
                                        <a class="block block-rounded" href="bd_dashboard.html">
                                            <div class="block-content text-white bg-modern">
                                                <i class="si si-rocket fa-2x"></i>
                                                <div class="font-w600 push-15-t push-15">Boxed</div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- END Apps Block -->
                    </div>
                </div>
            </div>
            <!-- END Apps Modal -->

        <?php
    }
    
    public function pageContent($data = [])
    {
        echo 'Hello Kristina';
    }

    public function table($data, $options, $buttons = [])
    {
        ?>

            <div class="block">
                <div class="block-content">
                    <?php 
                       foreach ($buttons as $button) {
                           echo '<a class="btn btn-minw btn-rounded btn-primary" href="'. $button['link'] . '">'. $button['label'] . '</a>';
                       }
                    ?>
                    <div class="table-responsive">
                        <table class="table table-striped table-vcenter table-hover">
                            <thead>
                                <tr>
                                    <?php     
                                    foreach ($options as $column =>$columnOptions) {
                                        echo '<th class="' . $columnOptions['class'] . '">' . $columnOptions['label'] . '</th>';

                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                  foreach ($data as $row) {
                                      echo '<tr>';
                                        foreach ( $options as $column => $columnOptions){
                                            if ($column =='table-actions'){
                                                echo '<td class="text-center">';
                                                ?>
                                                <div class="btn-group">
                                                    <?php 
                                                    foreach($columnOptions['actions'] as $action) {
                                                        ?>

                                                        <a href="<?= $action['link'] . '?id=' . $row['id'] ?>" class="btn btn-sm btn-default" type="" data-toggle="tooltip" title="" data-original-title="Edit Client"><i class="fa <?= $action['icon'] ?>"></i></a>
                                                        
                                                        <?php
                                                    }  

                                                    ?>
                                                        
                                                    </div>

                                                <?php

                                                echo '</td>';
                                            } else {
                                                echo '<td>' . $row[$column] . '</td>';

                                            }
                                        }
                                      echo '</tr>';
                                  }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        <?php
    }
}