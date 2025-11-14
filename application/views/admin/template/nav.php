<div class="sidebar-wrapper">
    <div>
        <div class="logo-wrapper"><a href="<?= base_url() ?>admin/dashboard"><img class="img-fluid for-light" src="<?= base_url() ?>logo-hipolinema.png" alt=""><img class="img-fluid for-dark" src="<?= base_url() ?>logo-hipolinema.png" alt=""></a>
            <div class="back-btn"><i class="fa fa-angle-left"></i></div>
        </div>
        <div class="logo-icon-wrapper"><a href="<?= base_url() ?>admin/dashboard"><img class="img-fluid" src="<?= base_url() ?>logo-hipolinema.png" style="width: 30px !important;" alt=""></a></div>
        <nav class="sidebar-main">
            <div class="left-arrow" id="left-arrow"><i data-feather="arrow-left"></i></div>
            <div id="sidebar-menu">
                <ul class="sidebar-links" id="simple-bar">
                    <li class="back-btn"><a href="<?= base_url() ?>admin/dashboard"><img class="img-fluid" src="<?= base_url() ?>logo-hipolinema.png" style="width: 30px !important;" alt=""></a>
                        <div class="mobile-back text-end"><span>Back</span><i class="fa fa-angle-right ps-2" aria-hidden="true"></i></div>
                    </li>
                    <br>
					<br>
      
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url() ?>admin/dashboard"><i data-feather="home"> </i><span>Dashboard</span></a></li>
                    
                    
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url() ?>admin/banner"><i data-feather="image"> </i><span>Banner</span></a></li>
                    
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="user"></i><span>User</span></a>
                        <ul class="sidebar-submenu">
                        <li><a href="<?= base_url() ?>admin/users">List</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="star"></i><span>Tenant</span></a>
                        <ul class="sidebar-submenu">
                        <li><a href="<?= base_url() ?>admin/tenants">List</a></li>
                        <li><a href="<?= base_url() ?>admin/tenants/add">Add</a></li>
							<li><a href="<?= base_url() ?>admin/tenant_categories">Category</a></li>
                        </ul>
                    </li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="percent"></i><span>Voucher</span></a>
                        <ul class="sidebar-submenu">
                        <li><a href="<?= base_url() ?>admin/vouchers">List</a></li>
                        <li><a href="<?= base_url() ?>admin/vouchers/add">Add</a></li>
							<li><a href="<?= base_url() ?>admin/voucher_categories">Category</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="users"></i><span>Community</span></a>
                        <ul class="sidebar-submenu">
                        <li><a href="<?= base_url() ?>admin/communities">List</a></li>
                        <li><a href="<?= base_url() ?>admin/communities/add">Add</a></li>
							<li><a href="<?= base_url() ?>admin/community_categories">Category</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="message-square"></i><span>Discussion</span></a>
                        <ul class="sidebar-submenu">
                        <li><a href="<?= base_url() ?>admin/discussion">List</a></li>
                        <li><a href="<?= base_url() ?>admin/discussion_comment">Comment</a></li>
                        </ul>
                    </li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="message-square"></i><span>Posts</span></a>
                        <ul class="sidebar-submenu">
                        <li><a href="<?= base_url() ?>admin/posts">List</a></li>
                        <li><a href="<?= base_url() ?>admin/post_comments">Comment</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="edit"></i><span>Article</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?= base_url() ?>admin/articles">List</a></li>
                            <li><a href="<?= base_url() ?>admin/articles/add">Add</a></li>
                        </ul>
                    </li>
                    <li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="heart"></i><span>Event</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?= base_url() ?>admin/events">List</a></li>
                            <li><a href="<?= base_url() ?>admin/events/add">Add</a></li>
                        </ul>
                    </li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title" href="#"><i data-feather="award"></i><span>Program</span></a>
                        <ul class="sidebar-submenu">
                            <li><a href="<?= base_url() ?>admin/departments">Department</a></li>
                            <li><a href="<?= base_url() ?>admin/programs">Programs</a></li>
                        </ul>
                    </li>
					<li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="<?= base_url() ?>admin/system_master"><i data-feather="settings"> </i><span>System Master</span></a></li>
					
                    <!--li class="sidebar-list"><a class="sidebar-link sidebar-title link-nav" href="sample-page.html"><i data-feather="file-text"> </i><span>Documents</span></a></li-->
					<br/>
					<br/>
					<br/>
					<br/>
                    
                </ul>
            </div>
            <div class="right-arrow" id="right-arrow"><i data-feather="arrow-right"></i></div>
        </nav>
    </div>
</div>