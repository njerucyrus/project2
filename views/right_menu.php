<?php
/**
 * Created by PhpStorm.
 * User: New LAptop
 * Date: 27/04/2017
 * Time: 06:42
 */
?>

<div id="throbber" style="display:none; min-height:120px;  "> </div>
<div id="noty-holder"> </div>
<div id="wrapper"  >
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header"  >
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="http://cijulenlinea.ucr.ac.cr/dev-users/">
                <img src="http://placehold.it/200x50&text=LOGO" alt="LOGO"">
            </a>


        </div>

        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav" >
            <li><a href="#" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Stats"><i class="fa fa-bar-chart-o"></i>
                </a>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin User <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="#"><i class="fa fa-fw fa-user"></i> Edit Profile</a></li>
                    <li><a href="#"><i class="fa fa-fw fa-cog"></i> Change Password</a></li>
                    <li class="divider"></li>
                    <li><a href="#"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <div class="heading">Rep Kenya </div>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->


        <div class="collapse navbar-collapse navbar-ex1-collapse " >

            <ul class="nav navbar-nav side-nav ">
                <li>


                    <a href="#" data-toggle="collapse" data-target="#submenu-1"> <div class="menu-links"><i class="fa fa-fw fa-user-plus"></i> Registration <i class="fa fa-fw fa-angle-down pull-right"></i></div></a>
                    <ul id="submenu-1" class="collapse">
                        <li >
                            <a href="views/register_client.php"><div class="menu-links" > <i class="fa fa-fw fa-user-plus"></i> Register Client</div> </a>
                        </li>

                        <li>
                            <a href="views/register_employee.php"><div class="menu-links" ><i class="fa fa-fw  fa-user"></i>  Register Employee</div></a>
                        </li>
                        <li>
                            <a href="views/register_group.php"><div class="menu-links" ><i class="fa fa-fw  fa-group"></i> Register Group</div></a>
                        </li>
                    </ul>
                </li>

                <li>


                    <a href="#" data-toggle="collapse" data-target="#submenu-2"> <div class="menu-links"><i class="fa fa-fw  fa-search"></i> View <i class="fa fa-fw fa-angle-down pull-right"></i></div></a>
                    <ul id="submenu-2" class="collapse">
                        <li >
                            <a href="views/clients.php"><div class="menu-links" > <i class="fa fa-fw fa-user"></i> View Clients</div> </a>
                        </li>

                        <li>
                            <a href="views/employees.php"><div class="menu-links" ><i class="fa fa-fw  fa-user"></i> View Employees</div></a>
                        </li>
                        <li>
                            <a href="views/groups.php"><div class="menu-links" ><i class="fa fa-fw  fa-group"></i> View Groups</div></a>
                        </li>
                        <li>
                            <a href="views/group_member.php"><div class="menu-links" ><i class="fa fa-fw  fa-group"></i> View Group Members</div></a>
                        </li>
                    </ul>
                </li>
            </ul>



        </div>
        <!-- /.navbar-collapse -->
    </nav>
