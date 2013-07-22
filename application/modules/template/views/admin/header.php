                <h1 class="title">Admin Header</h1>
                <nav>
                    <ul>
                        <?php foreach($admin_menu as $anchor => $link) { ?>
                            <li><a href="<?php echo base_url("admin/$link"); ?>"><?php echo $anchor; ?></a></li>
                        <?php } ?>
                    </ul>
                </nav>