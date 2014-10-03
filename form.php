<div>
    <form id="xkcdconfig" action="index.php#feedback" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="wordcount" class="col-sm-3">
                Enter the number of words (<?php echo 'Default: ' . WORDS_DEFAULT . ' , max: ' . WORDS_MAX ?>)
            </label>
            <input type="text" id="wordcount" name="wordcount" placeholder="<?php echo WORDS_DEFAULT ?>"
                <?php echo ((!empty($_POST) && !isset($errors['wordcount'])) ? "value=$passgen->wordcount" : '') ?> >
        </div>

        <div class="form-group">
            <label for="symbolcount" class="col-sm-3">
                Enter the number of symbols (<?php echo 'Default: ' . SYMBOLS_DEFAULT . ' , max: ' . SYMBOLS_MAX ?>)
            </label>
            <input type="text" id="symbolcount" name="symbolcount" placeholder="<?php echo SYMBOLS_DEFAULT ?>"
                <?php echo ((!empty($_POST)&& !isset($errors['symbolcount'])) ? "value=$passgen->symbolcount" : '') ?> >
        </div>

        <div class="form-group">
            <label for="numbercount" class="col-sm-3">
                Enter the number of numbers (<?php echo 'Default: ' . NUMBERS_DEFAULT . ' , max: ' . NUMBERS_MAX?>)
            </label>
            <input type="text" id="numbercount" name="numbercount" placeholder="<?php echo NUMBERS_DEFAULT ?>"
                <?php echo ((!empty($_POST) && !isset($errors['numbercount'])) ? "value=$passgen->numbercount" : '') ?> >
        </div>

        <div class="form-group">
            <label class="col-sm-3">
                Select formating of words (Default: all lower case)
            </label>
            <input type="radio" name="formatting" value="1"
                <?php echo ((isset($_POST) && $passgen->formatting == 1) ? 'checked="checked"' : '') ?>> all lower case
            <input type="radio" name="formatting" value="2"
                <?php echo ((isset($_POST) && $passgen->formatting == 2) ? 'checked="checked"' : '') ?>> ALL UPPER CASE
            <input type="radio" name="formatting" value="3"
                <?php echo ((isset($_POST) && $passgen->formatting == 3) ? 'checked="checked"' : '') ?>> Camel Case
        </div>

        <button type="submit" class="btn btn-default col-sm-offset-2">Generate password</button>
    </form>
</div>