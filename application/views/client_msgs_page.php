<section class = "main-content-container">
    <header class = "info">
        <header id="heading">
            <p class = "BA-green no-margin">
                <?php echo $biz_name . " >> Notifcations"; ?> 
            </p>	
        </header>
        <header id="search" >
            <input id = "client-msg-search" name = "search" type = "text" placeholder = "&#128269; Search...">		
        </header>
    </header>
    <section>
    <div class = "list-header">
        <div class = "list-column  low-p"><span class = "BA-dark-orange">Date</span></div>	
        <div class = "list-column"><span class = "BA-dark-orange">From</span></div>
        <div class = "list-column"><span class = "BA-dark-orange">Subject</span></div>
        <div class = "list-column low-p"><span class = "BA-dark-orange">Body</span></div>
        <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
    </div>
    <?php foreach($messages->result() as $row): ?>
    <div class = "list-row">
        <div class = "list-column low-p"><span class = "BA-green"><?=$row->msgcom_date?></span></div>
        <div class = "list-column"><span class = "BA-green"><?=$row->msgcom_sender?></span></div>
        <div class = "list-column"><span class = "BA-green"><?=$row->msgcom_subject?></div>
        <div class = "list-column low-p msg-cont"><span class = "BA-green"><?=$row->msgcom_content?></span></div>
        <div class = "list-column show-hidden"><span class = "BA-dark-orange">View more...</span></div>
    </div>
    <?php endforeach; ?>
    </section>
</section>
