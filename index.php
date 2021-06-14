<?php
//   bir dosyanın bağımlı olduğu diğer php dosyalarını yorumlamaya dahil etmek için require kullanıyoruz, bu dosya bulunmazsa sayfa fatal error vererek çalışmayı durduracaktır
require "data.php";



//  PHP tanımları bitti, görsel kısma başlayalım
?>
<?php
include "header.php";
?>
<div class="container">
    <div class="row">
        <div class="col-12 my-2">
            <div class="list-group">
                <?php foreach ($articles as $key => $item) : ?>
                    <a href="detail.php?id=<?php echo $key ?>" class="list-group-item list-group-item-action">
                        <?php echo $item['title'] ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <form>

        </div>
    </div>
</div>
<?php
include "footer.php";
?>