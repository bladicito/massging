<div class="full-width-white">
    <div class="container">
        <div class="row content">
            <div class="col-md-12">
                <div class="mod mod-textcontent">
                    <div class="container">
                        <?php
                        $commentPage = strpos($_SERVER['PHP_SELF'], "comment.php");
                            if ($commentPage == true) {
                                page_content();
                            } else {
                                page_content(2);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
