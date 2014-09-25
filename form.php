<div>
    <form id="xkcdconfig" action="index.php" method="post" class="form-horizontal">
        <div class="form-group">
            <label for="wordcount" class="col-sm-3"> Enter the number of words (<?php echo 'Default: ' . WORDS_DEFAULT . ' , max: ' . WORDS_MAX ?>)
            </label>
            <input type="text" name="wordcount" placeholder="<?php echo WORDS_DEFAULT ?>">
        </div>

        <div class="form-group">
            <label for="symbolcount" class="col-sm-3">Enter the number of symbols (<?php echo 'Default: ' . SYMBOLS_DEFAULT . ' , max: ' . SYMBOLS_MAX ?>) </label>
            <input type="text" name="symbolcount" placeholder=""<?php echo SYMBOLS_DEFAULT ?>"" >
        </div>

        <div class="form-group">
            <label for="numbercount" class="col-sm-3">Enter the number of numbers (<?php echo 'Default: ' . NUMBERS_DEFAULT . ' , max: ' . NUMBERS_MAX?>) </label>
            <input type="text" name="numbercount" placeholder="<?php echo NUMBERS_DEFAULT ?> >
        </div>

        <div class="form-group">
            <label for="formatting" class="col-sm-3">Select formating of words (Default: all lower case) </label>
            <input type="radio" name="formatting" value="0"> all lower case
            <input type="radio" name="formatting" value="1"> ALL UPER CASE
            <input type="radio" name="formatting" value="2"> Came Case
        </div>

        <button type="submit" class="btn btn-default col-sm-offset-2">Generate password</button>
    </form>
