<ul>
<?php
foreach($menuItems as $item):?>
    <li><a href="<?php echo $item['page']?>"><?php echo $item['title']?></a></li>

<?php endforeach;?>
</ul>