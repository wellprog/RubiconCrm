<div class="quest-map">
    <div class="quest-map__container wow fadeIn" style="visibility: visible;">
        <!-- <div class="quest-map__mobile">
            <?php //include "question-map-milestone.php" ?>
        </div> -->

        <div class="quest-map__desktop">
            <?php for ($i = 0; $i < 10; $i++): ?>
                <?php include "question-map-milestone.php" ?>
            <?php endfor; ?>
        </div>
        
    </div>
</div>