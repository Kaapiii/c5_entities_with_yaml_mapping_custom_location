<div class="ccm-search-results-pagination">
    <?php if(!empty($paging)){ ?>
    <nav>
        <ul class="pagination">
            <!--<li>
                <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>-->
            <?php
            if(!empty($paging)):
                foreach($paging as $key => $page):?>

                <li class="<?=$page['class'];?>">

                    <?php if(empty($page['url'])): ?>
                        <span>&nbsp;...&nbsp;</span>
                    <?php else:?>
                        <a href="<?=URL::to($page['url'], '', '')?>"><?php echo $key;?></a>
                    <?php endif; ?>
                </li>
            <?php
                endforeach;
            endif;
            ?>
            <!--<li>
                <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>-->
        </ul>
    </nav>
    <?php } ?>
</div>