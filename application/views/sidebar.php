<section>

    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <?php if ($this->session->userdata('sidebar') == "admin") {  ?>
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('assets/upload/images/' . $this->session->userdata("foto")) ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata("namalengkap"); ?></div>
                    <div class="email">Master Data Analiyst</div>
                </div>
            </div>
        <?php } ?>
        <?php if ($this->session->userdata('sidebar') == "user") {  ?>
            <div class="user-info">
                <div class="image">
                    <img src="<?= base_url('assets/upload/images/' . $this->session->userdata("foto")) ?>" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->session->userdata("first_name"); ?> <?php echo $this->session->userdata("last_name"); ?></div>
                    <div class="email"><?php echo $this->session->userdata("branch"); ?></div>
                </div>
            </div>
        <?php } ?>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">
                <li class="header">Menu</li>
                <?php if ($this->session->userdata('sidebar') == "admin") {  ?>
                    <?php if ($this->session->userdata('akses') == 'shf' || $this->session->userdata('akses') == 'shp') { ?>
                        <li class="<?php if ($this->uri->segment(2) == "beranda") {
                                        echo "active";
                                    } ?>">
                            <a href="<?= base_url('admin/beranda') ?>">
                                <i class="material-icons">home</i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "profil") {
                                        echo "active";
                                    } ?>">
                            <a href="<?= base_url('admin/profil') ?>">
                                <i class="material-icons">edit</i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "approval_supplier" || $this->uri->segment(2) == "approval_item") {
                                        echo "active";
                                    } ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Approval & Penyelesaian</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if ($this->uri->segment(2) == "approval_supplier") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/approval_supplier/') ?>">Supplier</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "approval_item") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/approval_item/') ?>">Item</a>
                                </li>

                            </ul>
                        </li>

                    <?php } else { ?>
                        <li class="<?php if ($this->uri->segment(2) == "beranda") {
                                        echo "active";
                                    } ?>">
                            <a href="<?= base_url('admin/beranda') ?>">
                                <i class="material-icons">home</i>
                                <span>Beranda</span>
                            </a>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "profil") {
                                        echo "active";
                                    } ?>">
                            <a href="<?= base_url('admin/profil') ?>">
                                <i class="material-icons">edit</i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "supplier" || $this->uri->segment(2) == "item") {
                                        echo "active";
                                    } ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Pengajuan</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if ($this->uri->segment(2) == "supplier") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/supplier') ?>">Supplier</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "item") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/item') ?>">Item</a>
                                </li>

                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "approval_supplier" || $this->uri->segment(2) == "approval_item") {
                                        echo "active";
                                    } ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Approval & Penyelesaian</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if ($this->uri->segment(2) == "approval_supplier") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/approval_supplier/') ?>">Supplier</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "approval_item") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/approval_item/') ?>">Item</a>
                                </li>

                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "company" || $this->uri->segment(2) == "produk" || $this->uri->segment(2) == "location" || $this->uri->segment(2) == "departement" || $this->uri->segment(2) == "account" || $this->uri->segment(2) == "project" || $this->uri->segment(2) == "intercompany" || $this->uri->segment(2) == "future") {
                                        echo "active";
                                    } ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">list</i>
                                <span>COA(Charge Of Account)</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if ($this->uri->segment(2) == "company") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/company') ?>">Company</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "produk") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/produk') ?>">Produk</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "location") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/location') ?>">Location</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "departement") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/departement') ?>">Departement</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "account") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/account') ?>">Account</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "project") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/project') ?>">Project</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "intercompany") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/intercompany') ?>">Intercompany</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "future") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('admin/future') ?>">Future</a>
                                </li>
                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "sbu") {
                                        echo "active";
                                    } ?>">
                            <a href="<?= base_url('admin/sbu') ?>">
                                <i class="material-icons">assignment</i>
                                <span>Data SBU</span>
                            </a>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "kategori") {
                                        echo "active";
                                    } ?>">
                            <a href="<?= base_url('admin/kategori') ?>">
                                <i class="material-icons">line_weight</i>
                                <span>Data Kategori Supplier</span>
                            </a>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "usaha") {
                                        echo "active";
                                    } ?>">
                            <a href="<?= base_url('admin/usaha') ?>">
                                <i class="material-icons">list</i>
                                <span>Data Jenis Usaha</span>
                            </a>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "user") {
                                        echo "active";
                                    } ?>">
                            <a href="<?= base_url('admin/user') ?>">
                                <i class="material-icons">people</i>
                                <span>Data User</span>
                            </a>
                        </li>
                <?php }
                } ?>
                <?php if ($this->session->userdata('sidebar') == "user") {  ?>

                    <li class="<?php if ($this->uri->segment(2) == "beranda") {
                                    echo "active";
                                } ?>">
                        <a href="<?= base_url('user/beranda') ?>">
                            <i class="material-icons">home</i>
                            <span>Beranda</span>
                        </a>
                    </li>
                    <li class="<?php if ($this->uri->segment(2) == "profil") {
                                    echo "active";
                                } ?>">
                        <a href="<?= base_url('user/profil') ?>">
                            <i class="material-icons">edit</i>
                            <span>Profil</span>
                        </a>
                    </li>
                    <?php if($this->session->userdata('level-user') == 1) : ?>
                        <li class="<?php if ($this->uri->segment(2) == "suplier" || $this->uri->segment(2) == "item") {
                                        echo "active";
                                    } ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">view_list</i>
                                <span>Pengajuan</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if ($this->uri->segment(2) == "suplier") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('user/suplier') ?>">Supplier</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "item") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('user/item') ?>">Item</a>
                                </li>

                            </ul>
                        </li>

                        <li class="<?php if ($this->uri->segment(2) == "approval" || $this->uri->segment(2) == "approval_item") {
                                        echo "active";
                                    } ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">list</i>
                                <span>Approval</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if ($this->uri->segment(2) == "approval") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('user/approval') ?>">Supplier</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(2) == "approval_item") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('user/approval_item') ?>">Item</a>
                                </li>

                            </ul>
                        </li>
                    <?php else : ?>
                        <li class="<?php if ($this->uri->segment(2) == "approval" || $this->uri->segment(2) == "approval_item") {
                                        echo "active";
                                    } ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">list</i>
                                <span>Approval Suplier</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if ($this->uri->segment(3) == "wait_for_approve") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('user/approval/wait_for_approve') ?>">Waiting For Approve</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(3) == "has_approved") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('user/approval/has_approved') ?>">Has Approve</a>
                                </li>

                            </ul>
                        </li>
                        <li class="<?php if ($this->uri->segment(2) == "suplier" || $this->uri->segment(2) == "approval_item") {
                                        echo "active";
                                    } ?>">
                            <a href="javascript:void(0);" class="menu-toggle">
                                <i class="material-icons">list</i>
                                <span>Approval Item</span>
                            </a>
                            <ul class="ml-menu">
                                <li class="<?php if ($this->uri->segment(3) == "wait_for_approve") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('user/suplier/wait_for_approve') ?>">Waiting For Approve</a>
                                </li>
                                <li class="<?php if ($this->uri->segment(3) == "has_approved") {
                                                echo "active";
                                            } ?>">
                                    <a href="<?= base_url('user/suplier/has_approved') ?>">Has Approve</a>
                                </li>

                            </ul>
                        </li>
                    <?php endif ?>
                <?php }
                ?>
                <li>
                    <a href="<?= base_url('login/logout') ?>">
                        <i class="material-icons">keyboard_backspace</i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; 2019 <a style="color: #d59e3a !Important" href="javascript:void(0);">Kalla Group</a>.
            </div>
            <div class="version">
                <b>Version: </b> 0.0.1
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
</section>
<!-- <script type="text/javascript">    
       
    jQuery(function ($) {
    $("ul a")
        .click(function(e) {
            var link = $(this);
            var item = link.parent("li"); 
            if (item.hasClass("active")) {
                item.removeClass("active").children("a").removeClass("active");
            } else {
                item.addClass("active").children("a").addClass("active");
            }

            if (item.children("ul").length > 0) {
                var href = link.attr("href");
                link.attr("href", "#");
                setTimeout(function () { 
                    link.attr("href", href);
                }, 300);
                e.preventDefault();
            }
        })
        .each(function() {
            var link = $(this);
            if (link.get(0).href === location.href) {
                link.addClass("active").parents("li").addClass("active");
                return false;
            }
        });
    });

</script> -->