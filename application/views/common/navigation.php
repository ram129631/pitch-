<!-- START SIDEBAR MENU -->
      <div class="sidebar-menu">
        <!-- BEGIN SIDEBAR MENU ITEMS-->
        <ul class="menu-items">
          <li class="m-t-30 ">
            <a href="<?php echo site_url('/'); ?>" class="detailed">
              <span class="title">Dashboard</span>
            </a>
              <span class="<?php echo isselected(site_url('/')); ?> icon-thumbnail"><i class="pg-home"></i></span>
          </li>
          <li class="">
            <a href="<?php echo site_url('invoices'); ?>" class="detailed">
              <span class="title">List of invoices</span>
              <span class="details"></span>
            </a>
            <span class="<?php echo isselected(site_url('invoices')); ?> icon-thumbnail"><i class="pg-credit_card"></i></span>
          </li>
          <li class="">
            <a href="<?php echo site_url('add-new-invoice'); ?>" class="detailed">
              <span class="title">New Invoice</span>
              
            </a>
            <span class="<?php echo isselected(site_url('add-new-invoice')); ?> icon-thumbnail"><i class="fa fa-history"></i></span>
          </li>
          
          
        </ul>
        <div class="clearfix"></div>
      </div>
      <!-- END SIDEBAR MENU -->