<style>
.wrapper {
    display: flex;
    width: 100%;
    align-items: stretch;
}
#sidebar {
    min-width: 250px;
    max-width: 250px;
    min-height: 100vh;
}
#sidebar.active {
    margin-left: -250px;
}
a[data-toggle="collapse"] {
    position: relative;
}

.dropdown-toggle::after {
    display: block;
    position: absolute;
    top: 50%;
    right: 20px;
    transform: translateY(-50%);
}
body {
    font-family: 'Poppins', sans-serif;
    background-image: url("prof.jpg");
}

p {
    font-family: 'Poppins', sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
    color: #999;
}

a, a:hover, a:focus {
    color: inherit;
    text-decoration: none;
    transition: all 0.3s;
}

#sidebar {
  
    /* don't forget to add all the previously mentioned styles here too */
    background: #ffc299;
    color: #fff;
    transition: all 0.3s;
}

#sidebar .sidebar-header {
    padding: 20px;
    background:#df691a;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid 	#df691a;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #ffff;
    background: #df691a;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #df691a;
}
ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #df691a;
}
</style>
<div class="wrapper">
    <!-- Sidebar -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>Welcome Admin</h3>
        </div>

        <ul class="list-unstyled components">
            <p>TASK MANAGEMENT</p>
            <li>
                <a href="<?php echo base_url('admin/home_article');?>" >Home</a>
                
            </li>
            <li>
                <a href="<?php echo base_url('admin/des_dash');?>" >Designation</a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/add_article');?>">Add User</a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/user_dash');?>" >User</a>
                
            </li>
            <li>
                <a href="<?php echo base_url('admin/task_dash');?>" >Task</a>
            </li>
            <li>
                <a href="<?php echo base_url('admin/notification_dash');?>" >Add Notification</a>
            </li>
            
  
        </ul>
    </nav>

</div>
